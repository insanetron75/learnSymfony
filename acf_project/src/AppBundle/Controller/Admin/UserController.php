<?php
/**
 * Created by PhpStorm.
 * User: Timmy
 * Date: 10/10/2017
 * Time: 17:51
 */

namespace AppBundle\Controller\Admin;


use AppBundle\Entity\User;
use AppBundle\Form\Admin\AccountFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

    /**
     * @param Request $request
     * @Route("/account", name="account_home")
     *
     * @return Response
     */
    public function showAction(Request $request)
    {
        $sfUsr = $this->get('security.token_storage')->getToken()->getUser();
        $em    = $this->getDoctrine()->getManager();
        $users = $em->getRepository(User::class);

        /** @var User $thisUser */
        $thisUser = $users->findOneBy(['userName' => $sfUsr->getUserName()]);

        // Clear password so it doesn't show
        $thisUser->setPassword(null);
        $form = $this->createForm(AccountFormType::class, $thisUser);

        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            /** @var User $user */
            $user = $form->getData();

            $user->setPassword(password_hash($user->getPassword(), PASSWORD_DEFAULT));
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'User Updated');

            return $this->redirectToRoute('home_page');
        }

        return $this->render(
            'admin/showAccount.html.twig',
            [
                'form' => $form->createView()
            ]
        );

    }

    /**
     * @Route("/account/new", name="new_user")
     * @param Request $request
     * @return Response
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(AccountFormType::class);

        // only handles data on POST

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $user = $form->getData();
            $user->setPassword(password_hash($user->getPassword(), PASSWORD_DEFAULT));

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'User Created');

            return $this->redirectToRoute('security_login');
        }


        return $this->render(
            'admin/newAccount.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }
}