<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Qualifications
 *
 * @ORM\Table(name="qualifications", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class Qualifications
{
    /**
     * @var integer
     *
     * @ORM\Column(name="saa", type="integer", nullable=false)
     */
    private $saa = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="faw", type="integer", nullable=false)
     */
    private $faw = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="nas", type="integer", nullable=false)
     */
    private $nas = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

