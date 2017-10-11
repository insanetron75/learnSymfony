<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Cadet;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CadetController extends Controller
{
    /**
     * @Route("/cadets", name="cadets_home")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        $cadets = $this->buildCadetDetails();

        return $this->render(
            'personnel/cadet/show.html.twig',
            [
                'title' => 'Cadets',
                'cadets' => $cadets
            ]
        );
    }

    /**
     * @return array
     */
    public function buildCadetDetails()
    {
        $cadetsArray = [
            'headings' => [
                'Rank',
                'First Name',
                'Last Name',
                'Star Level',
                'Detachment',
                'Company',
                'Admin'
            ]
        ];

        $em = $this->getDoctrine()->getManager();
        $cadets = $em->getRepository(Cadet::class)->findAll();

        $cadetsArray['cadets'] = [];
        foreach ($cadets as $thisCadet) {
            if ($syllabus = $thisCadet->getSyllabus()) {
                $starLevel = $syllabus->getName();
            } else {
                $starLevel = 'N/A';
            }

            if ($detachment = $thisCadet->getDetachment()) {
                $detachmentName = $detachment->getName();
                $companyName = $detachment->getCompany()->getName();
            } else {
                $detachmentName = 'Could Not Retrieve Detachment';
                $companyName = '';
            }
            
            $cadetsArray['cadets'][] = [
                'Rank' => $thisCadet->getRank(),
                'First Name' => $thisCadet->getFirstName(),
                'Last Name' => $thisCadet->getLastName(),
                'Star Level' => $starLevel,
                'Detachment' => $detachmentName,
                'Company' => $companyName,
                'id'    => $thisCadet->getId()
            ];
        }

        return $cadetsArray;
    }
}
