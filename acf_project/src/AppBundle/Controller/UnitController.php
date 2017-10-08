<?php
/**
 * Created by PhpStorm.
 * User: Timmy
 * Date: 06/10/2017
 * Time: 09:59
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UnitController extends Controller
{

    /**
     * @Route("/unit", name="unit_management")
     */
    public function showAction()
    {
        return $this->render(
            'unit/show.html.twig',
            [

            ]
        );
    }
}