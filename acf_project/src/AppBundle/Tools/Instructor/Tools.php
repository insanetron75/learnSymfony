<?php
/**
 * Created by PhpStorm.
 * User: Timmy
 * Date: 06/10/2017
 * Time: 07:57
 */

namespace AppBundle\Tools\Instructor;


use AppBundle\Entity\Company;
use AppBundle\Entity\Detachment;
use AppBundle\Entity\Instructor;
use Doctrine\Common\Persistence\ObjectManager;
use \AppBundle\Tools\Detachment\Tools as DetachmentTools;

class Tools
{
    /**
     * @param Instructor    $instructor
     * @param ObjectManager $om
     *
     * @return array
     */
    public static function getUserDetails(Instructor $instructor, ObjectManager $om)
    {
        $number      = $instructor->getNumber();
        $rank        = $instructor->getRank();
        $firstName   = $instructor->getFirstName();
        $lastName    = $instructor->getLastName();
        $detachment  = $instructor->getDetachment();
        if ($detachment instanceof Detachment) {
            $detachmentName = $detachment->getName();
            $company        = $detachment->getCompany();
            if ($company instanceof Company) {
                $companyName = $company->getName();
                $battalion   = $company->getBattalion();
                if ($battalion instanceof $battalion) {
                    $battalionName = $battalion->getName();
                } else {
                    $battalionName = "Couldn't Retrieve Battalion";
                }
            } else {
                $companyName   = "Couldn't Retrieve Company";
                $battalionName = '';
            }
        } else {
            $detachmentName = "Couldn't Retrieve Detachment";
            $companyName    = '';
            $battalionName  = '';
        }

        return [
            'number'     => $number,
            'rank'       => $rank,
            'first_name' => $firstName,
            'last_name'  => $lastName,
            'detachment' => $detachmentName,
            'company'    => $companyName,
            'battalion'  => $battalionName,
        ];
    }

    /**
     * @param Instructor    $instructor
     * @param ObjectManager $om
     *
     * @return array
     */
    public static function getDetachmentDetails(Instructor $instructor, ObjectManager $om)
    {

        $detachment = $instructor->getDetachment();
        if ($detachment instanceof Detachment) {
            $affiliation = $detachment->getAffiliation();
            $dc          = $detachment->getDetachmentCommander();
            $_2ic        = $detachment->getSecondInCommand();

            if ($dc instanceof Instructor) {
                $dcName = Tools::getInstructorRankAndName($dc);
            } else {
                $dcName = 'No Assigned DC';
            }

            if ($_2ic instanceof Instructor) {
                $_2icName = Tools::getInstructorRankAndName($_2ic);
            } else {
                $_2icName = 'No Assigned 2IC';
            }

            $instructorCount = DetachmentTools::getInstructorCount($detachment, $om);
            $cadetCount      = DetachmentTools::getCadetCount($detachment, $om);

            return [
                'affiliation' => $affiliation,
                'dc'          => $dcName,
                '2ic'         => $_2icName,
                'instructors' => $instructorCount,
                'cadets'      => $cadetCount
            ];
        } else {
            $error = "Couldn't retrieve detachment";

            return [
                'affiliation' => $error,
                'dc'          => $error,
                '2ic'         => $error,
                'instructors' => $error,
                'cadets'      => $error
            ];
        }

    }

    /**
     * @param Instructor $instructor
     *
     * @return string
     */
    public static function getInstructorRankAndName(Instructor $instructor)
    {
        return self::convertRankToShortHand($instructor) . ' ' . $instructor->getFirstName() . ' ' . $instructor->getLastName();
    }

    public static function convertRankToShortHand(Instructor $instructor)
    {
        $rank = $instructor->getRank();
        if ($rank == '2nd Lieutenant') {
            return '2Lt';
        } elseif ($rank == 'Staff Sargent Instructor') {
            return 'SSI';
        } elseif ($rank == 'Sargent Instructor') {
            return 'SI';
        } elseif ($rank == 'Lieutenant') {
            return 'Lt';
        } else {
            return $rank;
        }
    }
}