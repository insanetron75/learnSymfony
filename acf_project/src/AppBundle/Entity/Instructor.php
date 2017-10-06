<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Instructor
 *
 * @ORM\Table(name="instructor")
 * @ORM\Entity
 */
class Instructor
{
    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=45, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=45, nullable=false)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="rank", type="string", length=45, nullable=false)
     */
    private $rank;

    /**
     * @var integer
     *
     * @ORM\Column(name="qualification_id", type="integer", nullable=true)
     */
    private $qualificationId;

    /**
     * @var string
     *
     * @ORM\Column(name="battalion", type="string", length=45, nullable=true)
     */
    private $battalion;

    /**
     * @var string
     *
     * @ORM\Column(name="detachment", type="string", length=45, nullable=true)
     */
    private $detachment;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=45, nullable=true)
     */
    private $company;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

