<?php
/**
 * Created by PhpStorm.
 * User: Timothy Hasler
 * Date: 06/10/2017
 * Time: 20:28
 */

namespace AppBundle\Controller\Admin;


use AppBundle\Controller\InstructorController;
use AppBundle\Entity\Instructor;
use AppBundle\Form\InstructorFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Valid;

class InstructorAdminController extends Controller
{

    /**
     * @Route("/admin/newInstructor", name="admin_instructor_new")
     * @param Request $request
     *
     * @return Response
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(InstructorFormType::class);

        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $instructor = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($instructor);
            $em->flush();

            $this->addFlash('success', 'Instructor Created');

            return $this->redirectToRoute('instructors_home');
        }

        return $this->render(
            'admin/new_instructor.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/admin/{id}/editInstructor", name="admin_instructor_edit")
     * @param Request    $request
     * @param Instructor $instructor
     *
     * @return Response
     */
    public function editAction(Request $request, Instructor $instructor)
    {
        $form = $this->createForm(InstructorFormType::class, $instructor);

        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $instructor = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($instructor);
            $em->flush();

            $this->addFlash('success', 'Instructor Updated');

            return $this->redirectToRoute('instructors_home');
        }

        return $this->render(
            'admin/edit_instructor.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/admin/{id}/deleteInstructor", name="admin_instructor_delete")
     * @param Request    $request
     * @param Instructor $instructor
     *
     * @return Response
     */
    public function deleteAction(Request $request, Instructor $instructor)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($instructor);
        $em->flush();

        $this->addFlash('success', 'Instructor Deleted');

        return $this->redirectToRoute('instructors_home');
    }
}