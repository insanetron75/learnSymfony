<?php
namespace AppBundle\Tools\Training;

use Doctrine\ORM\EntityRepository;

class LessonTypeRepository extends EntityRepository
{
    public function createAlphabeticalQueryBuilder()
    {
        return $this->createQueryBuilder('lessonType')
                    ->orderBy('lessonType.name', 'ASC');
    }
}