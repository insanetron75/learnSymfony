<?php
/**
 * Created by PhpStorm.
 * User: Timmy
 * Date: 06/10/2017
 * Time: 01:56
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Instructor;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{

    /**
     * @Route("/home", name="home_page")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction()
    {
        $sfUsr= $this->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository(User::class);
        /** @var User $thisUser */
        $thisUser = $users->findOneBy(['id' => $sfUsr->getUserName]);
        /** @var Instructor $thisInstructor */
        $thisInstructor = $thisUser->getInstructor();

        return $this->render(
            'index/show.html.twig',
            []
        );
    }
}