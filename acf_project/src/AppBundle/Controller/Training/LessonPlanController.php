<?php

namespace AppBundle\Controller\Training;

use AppBundle\Entity\Lesson;
use AppBundle\Entity\LessonPlan;
use AppBundle\Form\Training\LessonPlanFormType;
use AppBundle\Pdf\LessonPlanPdf;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LessonPlanController extends Controller
{

    /**
     * @param Request $request
     * @Route("/lessonPlan", name="lesson_plan_home")
     *
     * @return Response
     */
    public function showAction(Request $request)
    {
        $lessonId = $request->query->get('lessonId');
        $em       = $this->getDoctrine()->getManager();
        // First get the lesson
        $lesson = $em->getRepository(Lesson::class)->findOneBy(['id' => $lessonId]);

        // Then get all the lesson plans
        $lessonPlans = $em->getRepository(LessonPlan::class)->findBy(['lesson' => $lesson]);
        $planDetails = $this->getPlanDetails($lessonPlans);

        return $this->render(
            'training/showPlans.html.twig',
            [
                'title'    => 'Plans For - ' . $lesson->__toString(),
                'plans'    => $planDetails,
                'lessonId' => $lessonId
            ]
        );
    }

    /**
     * @Route("/lessonPlan/new", name="new_lesson_plan")
     * @param Request $request
     *
     * @return Response
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(LessonPlanFormType::class);
        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $lessonId   = $request->query->get('lessonId');
            $em         = $this->getDoctrine()->getManager();
            $lesson     = $em->getRepository(Lesson::class)->findOneBy(['id' => $lessonId]);
            $lessonPlan = $form->getData();
            $lessonPlan->setLesson($lesson);
            $em->persist($lessonPlan);
            $em->flush();

            $this->addFlash('success', 'Lesson Plan Created');

            return $this->showAction($request);
        }
        else
        {
            $lessonId    = $request->query->get('lessonId');
            $em          = $this->getDoctrine()->getManager();
            $lesson      = $em->getRepository(Lesson::class)->findOneBy(['id' => $lessonId]);
            $lessonTitle = $lesson->__toString();

            return $this->render(
                'training/newPlan.html.twig',
                [
                    'title'    => $lessonTitle,
                    'form'     => $form->createView(),
                    'lesson' => $lessonId
                ]
            );
        }
    }

    /**
     * @Route("/lessonPlan/{id}/editLesson", name="edit_lesson_plan")
     * @param Request    $request
     * @param LessonPlan $lessonPlan
     *
     * @return Response
     */
    public function editAction(Request $request, LessonPlan $lessonPlan)
    {
        $form = $this->createForm(LessonPlanFormType::class, $lessonPlan);
        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $lessonId   = $request->query->get('lessonId');
            $em         = $this->getDoctrine()->getManager();
            $lesson     = $em->getRepository(Lesson::class)->findOneBy(['id' => $lessonId]);
            $lessonPlan = $form->getData();
            $lessonPlan->setLesson($lesson);
            $em->persist($lessonPlan);
            $em->flush();

            $this->addFlash('success', 'Lesson Plan Edited');

            return $this->showAction($request);
        }
        else
        {
            $lesson      = $lessonPlan->getLesson();
            $lessonTitle = $lesson->__toString();

            return $this->render(
                'training/newPlan.html.twig',
                [
                    'title'    => $lessonTitle,
                    'form'     => $form->createView(),
                    'lessonId' => $lesson->getId()
                ]
            );
        }
    }

    /**
     * @Route("/lessonPlan/{id}/viewLesson", name="view_lesson_plan")
     * @param Request    $request
     * @param LessonPlan $lessonPlan
     *
     * @return Response
     */
    public function viewAction(Request $request, LessonPlan $lessonPlan)
    {
        $pdf = new LessonPlanPdf($lessonPlan);
        $pdf->build();

        return new Response($pdf->Output(), 200, array(
            'Content-Type' => 'application/pdf'));
    }

    /**
     * @Route("/lessonPlan/{id}/deleteCadet", name="delete_lesson_plan")
     * @param Request    $request
     * @param LessonPlan $lessonPlan
     *
     * @return Response
     */
    public function deleteAction(Request $request, LessonPlan $lessonPlan)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($lessonPlan);
        $em->flush();

        $this->addFlash('success', 'Plan Deleted');

        return $this->redirect(
            $this->generateUrl(
                'lesson_plan_home',
                [
                    'lessonId' => $lessonPlan->getLesson()->getId()
                ]
            ));
    }

    /**
     * @param LessonPlan[] $lessonPlans
     *
     * @return array
     */
    public function getPlanDetails($lessonPlans)
    {
        $planDetails = [
            'headings' =>
                [
                    'Instructor',
                    'Date',
                    'No. Of Periods',
                    'Length (Minutes)',
                    'Admin'
                ],
            'plans'    => []
        ];

        foreach ($lessonPlans as $thisLessonPlan)
        {
            $planDetails['plans'][] = [
                'Instructor'     => $thisLessonPlan->getInstructor()->__toString(),
                'Date'           => date('d/m/Y', $thisLessonPlan->getTimestamp()),
                'No. Of Periods' => $thisLessonPlan->getPeriodCount(),
                'Length'         => $thisLessonPlan->getLength(),
                'id'             => $thisLessonPlan->getId(),
                'lessonId'       => $thisLessonPlan->getLesson()->getId()
            ];
        }

        return $planDetails;
    }
}