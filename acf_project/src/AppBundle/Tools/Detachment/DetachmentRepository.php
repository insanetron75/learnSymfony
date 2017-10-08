<?php
namespace AppBundle\Tools\Detachment;

use Doctrine\ORM\EntityRepository;

class DetachmentRepository extends EntityRepository
{
    public function createAlphabeticalQueryBuilder()
    {
        return $this->createQueryBuilder('detachment')
            ->orderBy('detachment.name', 'ASC');
    }
}
