<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lesson
 *
 * @ORM\Table(name="lesson", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class Lesson
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="periods", type="integer", nullable=true)
     */
    private $periods;

    /**
     * @var integer
     *
     * @ORM\Column(name="qualifications_id", type="integer", nullable=true)
     */
    private $qualificationsId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_taught", type="date", nullable=true)
     */
    private $lastTaught;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="next_taught", type="date", nullable=true)
     */
    private $nextTaught;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

