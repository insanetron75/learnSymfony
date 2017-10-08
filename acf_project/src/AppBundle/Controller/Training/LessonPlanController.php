<?php
/**
 * Created by PhpStorm.
 * User: Timmy
 * Date: 08/10/2017
 * Time: 19:14
 */

namespace AppBundle\Controller\Training;


use AppBundle\Form\Training\LessonPlanFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LessonPlanController extends Controller
{

    /**
     * @Route("/lessonPlan", name="lesson_plan_home")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function showAction()
    {
        return $this->redirect('/home');
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
            $lessonPlan = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($lessonPlan);
            $em->flush();

            $this->addFlash('success', 'Lesson Plan Created');

            return $this->redirectToRoute('syllabus_home');
        }

        return $this->render(
            'training/new_training_program.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/lessonPlan/edit", name="edit_lesson_plan")
     */
    public function editAction()
    {
        return $this->redirect('/home');
    }
}