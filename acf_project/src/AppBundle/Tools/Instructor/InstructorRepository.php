<?php
/**
 * Created by PhpStorm.
 * User: Timmy
 * Date: 06/10/2017
 * Time: 09:06
 */

namespace AppBundle\Tools\Instructor;


use AppBundle\Entity\Detachment;
use AppBundle\Entity\Instructor;
use Doctrine\ORM\EntityRepository;

class InstructorRepository extends EntityRepository
{

    public function retrieveByPk($id)
    {
        $instructors = $this->getEntityManager()->getRepository(Instructor::class);
        return $instructors->findOneBy(['id' => $id]);
    }
    public function getDetachmentForInstructor(Instructor $instructor)
    {
        $detachments = $this->getEntityManager()->getRepository(Detachment::class);
        return $detachments->findOneBy(['id' => $instructor->getId()]);
    }
}