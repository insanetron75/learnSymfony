<?php
namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TablesController extends Controller
{

    /**
     * @Route("/table/{tableName}")
     * @return Response
     */
    public function showAction($tableName)
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository(User::class);
        $usersArray = $users->findOneBy(array('userName'=>'22troop'));
        $usersArrayId = $usersArray->getPassword();
        return $this->render(
        'tables/show.html.twig',
        [
            'users' => $usersArray,
            'usersId' => $usersArrayId
        ]);
    }
}