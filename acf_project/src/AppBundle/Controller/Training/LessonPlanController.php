<?php
/**
 * Created by PhpStorm.
 * User: Timmy
 * Date: 08/10/2017
 * Time: 19:14
 */

namespace AppBundle\Controller\Training;


use AppBundle\Entity\Lesson;
use AppBundle\Entity\LessonPlan;
use AppBundle\Form\Training\LessonPlanFormType;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LessonPlanController extends Controller
{

    /**
     * @param $lessonId
     * @Route("/lessonPlan/{lessonId}", name="lesson_plan_home")
     *
     * @return Response
     */
    public function showAction($lessonId)
    {
        $em = $this->getDoctrine()->getManager();

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

            return $this->redirectToRoute($this->generateUrl('lesson_plan_home', ['lessonId' => $lessonPlan->getLesson()->getId()]));
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
                    'lessonId' => $lessonId
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
            $cadet = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($cadet);
            $em->flush();

            $this->addFlash('success', 'Plan Updated');
        }

        return $this->redirect(
            $this->generateUrl(
                'lesson_plan_home',
                [
                    'lessonId' => $lessonPlan->getLesson()->getId()
                ]
            ));
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
        $view = $this->renderView('pdfs\viewLessonPlan.html.twig');;
        return $this->render('pdfs\viewLessonPlan.html.twig');
        /*return new PdfResponse(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($view),
            'file.pdf'
        );*/
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
                'id'             => $thisLessonPlan->getId()
            ];
        }

        return $planDetails;
    }
}