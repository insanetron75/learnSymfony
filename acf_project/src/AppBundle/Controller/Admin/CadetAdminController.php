<?php
/**
 * Created by PhpStorm.
 * User: Timothy Hasler
 * Date: 06/10/2017
 * Time: 20:28
 */

namespace AppBundle\Controller\Admin;


use AppBundle\Controller\CadetController;
use AppBundle\Entity\Cadet;
use AppBundle\Form\CadetFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Valid;

class CadetAdminController extends Controller
{

    /**
     * @Route("/admin/newCadet", name="admin_cadet_new")
     * @param Request $request
     *
     * @return Response
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(CadetFormType::class);

        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $cadet = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($cadet);
            $em->flush();

            $this->addFlash('success', 'Cadet Created');

            return $this->redirectToRoute('cadets_home');
        }

        return $this->render(
            'admin/new_cadet.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/admin/{id}/editCadet", name="admin_cadet_edit")
     * @param Request $request
     * @param Cadet   $cadet
     *
     * @return Response
     */
    public function editAction(Request $request, Cadet $cadet)
    {
        $form = $this->createForm(CadetFormType::class, $cadet);

        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $cadet = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($cadet);
            $em->flush();

            $this->addFlash('success', 'Cadet Updated');

            return $this->redirectToRoute('cadets_home');
        }

        return $this->render(
            'admin/edit_cadet.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/admin/{id}/deleteCadet", name="admin_cadet_delete")
     * @param Request $request
     * @param Cadet   $cadet
     *
     * @return Response
     */
    public function deleteAction(Request $request, Cadet $cadet)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($cadet);
        $em->flush();
        
        $this->addFlash('success', 'Cadet Deleted');

        return $this->redirectToRoute('cadets_home');
    }
}