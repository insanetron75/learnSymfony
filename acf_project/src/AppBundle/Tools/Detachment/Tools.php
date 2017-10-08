<?php
/**
 * Created by PhpStorm.
 * User: Timmy
 * Date: 06/10/2017
 * Time: 08:09
 */

namespace AppBundle\Tools\Detachment;


use AppBundle\Entity\Cadet;
use AppBundle\Entity\Detachment;
use AppBundle\Entity\Instructor;
use Doctrine\Common\Persistence\ObjectManager;

class Tools
{
    /**
     * @param Detachment    $detachment
     * @param ObjectManager $om
     *
     * @return int
     */
    public static function getInstructorCount(Detachment $detachment, ObjectManager $om)
    {
        $instructors = $om->getRepository(Instructor::class);
        return count($instructors->findBy(['detachment' => $detachment]));
    }

    /**
     * @param Detachment    $detachment
     * @param ObjectManager $om
     *
     * @return int
     */
    public static function getCadetCount(Detachment $detachment, ObjectManager $om)
    {
        $cadets = $om->getRepository(Cadet::class);
        return count($cadets->findBy(['detachment' => $detachment]));
    }
}