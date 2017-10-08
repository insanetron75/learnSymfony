<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Syllabus
 *
 * @ORM\Table(name="syllabus", uniqueConstraints={@ORM\UniqueConstraint(name="syllabus_id_uindex", columns={"id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Tools\Syllabus\SyllabusRepository")
 */
class Syllabus
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Syllabus
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set drillPeriods
     *
     * @param integer $drillPeriods
     *
     * @return Syllabus
     */
    public function setDrillPeriods($drillPeriods)
    {
        $this->drillPeriods = $drillPeriods;

        return $this;
    }

    /**
     * Get drillPeriods
     *
     * @return integer
     */
    public function getDrillPeriods()
    {
        return $this->drillPeriods;
    }

    /**
     * Set mkPeriods
     *
     * @param integer $mkPeriods
     *
     * @return Syllabus
     */
    public function setMkPeriods($mkPeriods)
    {
        $this->mkPeriods = $mkPeriods;

        return $this;
    }

    /**
     * Get mkPeriods
     *
     * @return integer
     */
    public function getMkPeriods()
    {
        return $this->mkPeriods;
    }

    /**
     * Set saaPeriods
     *
     * @param integer $saaPeriods
     *
     * @return Syllabus
     */
    public function setSaaPeriods($saaPeriods)
    {
        $this->saaPeriods = $saaPeriods;

        return $this;
    }

    /**
     * Get saaPeriods
     *
     * @return integer
     */
    public function getSaaPeriods()
    {
        return $this->saaPeriods;
    }

    /**
     * Set navPeriods
     *
     * @param integer $navPeriods
     *
     * @return Syllabus
     */
    public function setNavPeriods($navPeriods)
    {
        $this->navPeriods = $navPeriods;

        return $this;
    }

    /**
     * Get navPeriods
     *
     * @return integer
     */
    public function getNavPeriods()
    {
        return $this->navPeriods;
    }

    /**
     * Set fieldcraft
     *
     * @param integer $fieldcraft
     *
     * @return Syllabus
     */
    public function setFieldcraft($fieldcraft)
    {
        $this->fieldcraft = $fieldcraft;

        return $this;
    }

    /**
     * Get fieldcraft
     *
     * @return integer
     */
    public function getFieldcraft()
    {
        return $this->fieldcraft;
    }

    /**
     * Set faPeriods
     *
     * @param integer $faPeriods
     *
     * @return Syllabus
     */
    public function setFaPeriods($faPeriods)
    {
        $this->faPeriods = $faPeriods;

        return $this;
    }

    /**
     * Get faPeriods
     *
     * @return integer
     */
    public function getFaPeriods()
    {
        return $this->faPeriods;
    }

    /**
     * Set expedPeriods
     *
     * @param integer $expedPeriods
     *
     * @return Syllabus
     */
    public function setExpedPeriods($expedPeriods)
    {
        $this->expedPeriods = $expedPeriods;

        return $this;
    }

    /**
     * Get expedPeriods
     *
     * @return integer
     */
    public function getExpedPeriods()
    {
        return $this->expedPeriods;
    }

    /**
     * Set ptPeriods
     *
     * @param integer $ptPeriods
     *
     * @return Syllabus
     */
    public function setPtPeriods($ptPeriods)
    {
        $this->ptPeriods = $ptPeriods;

        return $this;
    }

    /**
     * Get ptPeriods
     *
     * @return integer
     */
    public function getPtPeriods()
    {
        return $this->ptPeriods;
    }

    /**
     * Set adminPeriods
     *
     * @param integer $adminPeriods
     *
     * @return Syllabus
     */
    public function setAdminPeriods($adminPeriods)
    {
        $this->adminPeriods = $adminPeriods;

        return $this;
    }

    /**
     * Get adminPeriods
     *
     * @return integer
     */
    public function getAdminPeriods()
    {
        return $this->adminPeriods;
    }

    /**
     * Set totalPeriods
     *
     * @param integer $totalPeriods
     *
     * @return Syllabus
     */
    public function setTotalPeriods($totalPeriods)
    {
        $this->totalPeriods = $totalPeriods;

        return $this;
    }

    /**
     * Get totalPeriods
     *
     * @return integer
     */
    public function getTotalPeriods()
    {
        return $this->totalPeriods;
    }

    /**
     * Set shootingPeriods
     *
     * @param integer $shootingPeriods
     *
     * @return Syllabus
     */
    public function setShootingPeriods($shootingPeriods)
    {
        $this->shootingPeriods = $shootingPeriods;

        return $this;
    }

    /**
     * Get shootingPeriods
     *
     * @return integer
     */
    public function getShootingPeriods()
    {
        return $this->shootingPeriods;
    }

    /**
     * Set cadetComPeriods
     *
     * @param integer $cadetComPeriods
     *
     * @return Syllabus
     */
    public function setCadetComPeriods($cadetComPeriods)
    {
        $this->cadetComPeriods = $cadetComPeriods;

        return $this;
    }

    /**
     * Get cadetComPeriods
     *
     * @return integer
     */
    public function getCadetComPeriods()
    {
        return $this->cadetComPeriods;
    }

    /**
     * Set revisionPeriods
     *
     * @param integer $revisionPeriods
     *
     * @return Syllabus
     */
    public function setRevisionPeriods($revisionPeriods)
    {
        $this->revisionPeriods = $revisionPeriods;

        return $this;
    }

    /**
     * Get revisionPeriods
     *
     * @return integer
     */
    public function getRevisionPeriods()
    {
        return $this->revisionPeriods;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
