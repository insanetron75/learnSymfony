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
use AppBundle\Tools\Instructor\Tools as InstructorTools;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;

class IndexController extends Controller
{

    /**
     * @Route("/home", name="home_page")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        // the above is a shortcut for this
        $sfUsr = $this->get('security.token_storage')->getToken()->getUser();
        $em    = $this->getDoctrine()->getManager();
        $users = $em->getRepository(User::class);

        /** @var User $thisUser */
        //$thisUser = $users->findOneBy(['userName' => $sfUsr->getUserName()]);
        $thisUser = $users->findOneBy(['userName' => $sfUsr->getUserName()]);

        $thisInstructor = $thisUser->getInstructor();

        // get user details
        if ($thisInstructor instanceof Instructor) {
            $userDetails = InstructorTools::getUserDetails($thisInstructor, $em);
        } else {
            $error = "Couldn't Retrieve Instructor";
            $userDetails = [
                'number'     => $error,
                'rank'       => $error,
                'first_name' => $error,
                'last_name'  => $error,
                'detachment' => $error,
                'company'    => $error,
                'battalion'  => $error,
            ];
        }

        // Get Detachment Details
        $detachmentDetails = InstructorTools::getDetachmentDetails($thisInstructor, $em);

        return $this->render(
            'index/show.html.twig',
            [
                'userDetails' => $userDetails,
                'detachmentDetails' => $detachmentDetails
            ]
        );
    }

    public function getDetachmentDetails(ContainerInterface $container = null)
    {
    }

}