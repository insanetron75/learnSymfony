<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MkLesson
 *
 * @ORM\Table(name="mk_lesson", uniqueConstraints={@ORM\UniqueConstraint(name="mk-lessons_id_uindex", columns={"id"})}, indexes={@ORM\Index(name="mk-lessons_syllabus_id_fk", columns={"syllabus_id"})})
 * @ORM\Entity
 */
class MkLesson
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
     * @ORM\Column(name="title", type="string", length=125, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="chatper", type="string", length=25, nullable=true)
     */
    private $chatper;

    /**
     * @var string
     *
     * @ORM\Column(name="section", type="string", length=25, nullable=true)
     */
    private $section;

    /**
     * @var integer
     *
     * @ORM\Column(name="no_of_periods", type="integer", nullable=true)
     */
    private $noOfPeriods;

    /**
     * @var string
     *
     * @ORM\Column(name="sub_title", type="string", length=125, nullable=true)
     */
    private $subTitle;

    /**
     * @var \Syllabus
     *
     * @ORM\ManyToOne(targetEntity="Syllabus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="syllabus_id", referencedColumnName="id")
     * })
     */
    private $syllabus;



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
     * Set title
     *
     * @param string $title
     *
     * @return MkLesson
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set chatper
     *
     * @param string $chatper
     *
     * @return MkLesson
     */
    public function setChatper($chatper)
    {
        $this->chatper = $chatper;

        return $this;
    }

    /**
     * Get chatper
     *
     * @return string
     */
    public function getChatper()
    {
        return $this->chatper;
    }

    /**
     * Set section
     *
     * @param string $section
     *
     * @return MkLesson
     */
    public function setSection($section)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Get section
     *
     * @return string
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * Set noOfPeriods
     *
     * @param integer $noOfPeriods
     *
     * @return MkLesson
     */
    public function setNoOfPeriods($noOfPeriods)
    {
        $this->noOfPeriods = $noOfPeriods;

        return $this;
    }

    /**
     * Get noOfPeriods
     *
     * @return integer
     */
    public function getNoOfPeriods()
    {
        return $this->noOfPeriods;
    }

    /**
     * Set subTitle
     *
     * @param string $subTitle
     *
     * @return MkLesson
     */
    public function setSubTitle($subTitle)
    {
        $this->subTitle = $subTitle;

        return $this;
    }

    /**
     * Get subTitle
     *
     * @return string
     */
    public function getSubTitle()
    {
        return $this->subTitle;
    }

    /**
     * Set syllabus
     *
     * @param \AppBundle\Entity\Syllabus $syllabus
     *
     * @return MkLesson
     */
    public function setSyllabus(\AppBundle\Entity\Syllabus $syllabus = null)
    {
        $this->syllabus = $syllabus;

        return $this;
    }

    /**
     * Get syllabus
     *
     * @return \AppBundle\Entity\Syllabus
     */
    public function getSyllabus()
    {
        return $this->syllabus;
    }
}
