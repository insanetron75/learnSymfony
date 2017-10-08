<?php
/**
 * Created by PhpStorm.
 * User: Timmy
 * Date: 06/10/2017
 * Time: 01:32
 */

namespace AppBundle\Home;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/test")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction()
    {
        return $this->render(
            'home/show.html.twig',
            []
        );
    }
}