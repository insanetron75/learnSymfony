<?php
namespace AppBundle\Tools\Training;

use Doctrine\ORM\EntityRepository;

class LessonRepository extends EntityRepository
{
    public function createIdQueryBuilder()
    {
        return $this->createQueryBuilder('permissionType')
                    ->orderBy('permissionType.id', 'ASC');
    }
}