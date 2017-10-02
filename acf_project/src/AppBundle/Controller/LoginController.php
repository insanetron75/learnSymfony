<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{

    /**
     * @Route("/login")
     * @return Response
     */
    public function showAction()
    {
        return $this->render(
            'login/show.html.twig',
            [

            ]);
    }
}