<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Syllabus
 *
 * @ORM\Table(name="syllabus", uniqueConstraints={@ORM\UniqueConstraint(name="syllabus_id_uindex", columns={"id"})})
 * @ORM\Entity
 */
class Syllabus
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=25, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="drill_periods", type="integer", nullable=true)
     */
    private $drillPeriods;

    /**
     * @var integer
     *
     * @ORM\Column(name="mk_periods", type="integer", nullable=true)
     */
    private $mkPeriods;

    /**
     * @var integer
     *
     * @ORM\Column(name="saa_periods", type="integer", nullable=true)
     */
    private $saaPeriods;

    /**
     * @var integer
     *
     * @ORM\Column(name="nav_periods", type="integer", nullable=true)
     */
    private $navPeriods;

    /**
     * @var integer
     *
     * @ORM\Column(name="fieldcraft", type="integer", nullable=true)
     */
    private $fieldcraft;

    /**
     * @var integer
     *
     * @ORM\Column(name="fa_periods", type="integer", nullable=true)
     */
    private $faPeriods;

    /**
     * @var integer
     *
     * @ORM\Column(name="exped_periods", type="integer", nullable=true)
     */
    private $expedPeriods;

    /**
     * @var integer
     *
     * @ORM\Column(name="pt_periods", type="integer", nullable=true)
     */
    private $ptPeriods;

    /**
     * @var integer
     *
     * @ORM\Column(name="admin_periods", type="integer", nullable=true)
     */
    private $adminPeriods;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_periods", type="integer", nullable=true)
     */
    private $totalPeriods;

    /**
     * @var integer
     *
     * @ORM\Column(name="shooting_periods", type="integer", nullable=true)
     */
    private $shootingPeriods;

    /**
     * @var integer
     *
     * @ORM\Column(name="cadet_com_periods", type="integer", nullable=true)
     */
    private $cadetComPeriods;

    /**
     * @var integer
     *
     * @ORM\Column(name="revision_periods", type="integer", nullable=true)
     */
    private $revisionPeriods;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

