<?php
namespace AppBundle\Tools\Syllabus;

use Doctrine\ORM\EntityRepository;

class SyllabusRepository extends EntityRepository
{
    public function createAlphabeticalQueryBuilder()
    {
        return $this->createQueryBuilder('syllabus')
            ->orderBy('syllabus.name', 'ASC');
    }

    public function createIdlQueryBuilder()
    {
        return $this->createQueryBuilder('syllabus')
                    ->orderBy('syllabus.id', 'ASC');
    }
}