<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Cadet;
use AppBundle\Entity\Instructor;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InstructorController extends Controller
{
    /**
     * @Route("/instructors", name="instructors_home")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        $instructors = $this->buildInstructorDetails();

        return $this->render(
            'personnel/instructor/show.html.twig',
            [
                'title' => 'Instructors',
                'instructors' => $instructors
            ]
        );
    }

    /**
     * @return array
     */
    public function buildInstructorDetails()
    {
        $instructorArray = [
            'headings' => [
                'Number',
                'Rank',
                'First Name',
                'Last Name',
                'Detachment',
                'Company',
                'Admin'
            ]
        ];

        $em = $this->getDoctrine()->getManager();
        $instructors = $em->getRepository(Instructor::class)->findAll();

        $instructorArray['instructors'] = [];
        foreach ($instructors as $thisInstructor) {
            if ($detachment = $thisInstructor->getDetachment()) {
                $detachmentName = $detachment->getName();
                $companyName = $detachment->getCompany()->getName();
            } else {
                $detachmentName = 'Could Not Retrieve Detachment';
                $companyName = '';
            }

            $instructorArray['instructors'][] = [
                'Number' => $thisInstructor->getNumber(),
                'Rank' => $thisInstructor->getRank(),
                'First Name' => $thisInstructor->getFirstName(),
                'Last Name' => $thisInstructor->getLastName(),
                'Detachment' => $detachmentName,
                'Company' => $companyName,
                'id'    => $thisInstructor->getId()
            ];
        }

        return $instructorArray;
    }
}
