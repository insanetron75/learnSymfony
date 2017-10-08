<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lesson
 *
 * @ORM\Table(name="lesson", uniqueConstraints={@ORM\UniqueConstraint(name="fieldcraft_lessons_id_uindex", columns={"id"})}, indexes={@ORM\Index(name="fieldcraft_lessons_syllabus_id_fk", columns={"syllabus_id"}), @ORM\Index(name="idx_lesson", columns={"type_id"})})
 * @ORM\Entity
 */
class Lesson
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
     * @ORM\Column(name="chapter", type="string", length=10, nullable=true)
     */
    private $chapter;

    /**
     * @var string
     *
     * @ORM\Column(name="section", type="string", length=10, nullable=true)
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
     * @var integer
     *
     * @ORM\Column(name="ser", type="integer", nullable=true)
     */
    private $ser;

    /**
     * @var \LessonType
     *
     * @ORM\ManyToOne(targetEntity="LessonType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     * })
     */
    private $type;

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
     * @return Lesson
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
     * Set chapter
     *
     * @param string $chapter
     *
     * @return Lesson
     */
    public function setChapter($chapter)
    {
        $this->chapter = $chapter;

        return $this;
    }

    /**
     * Get chapter
     *
     * @return string
     */
    public function getChapter()
    {
        return $this->chapter;
    }

    /**
     * Set section
     *
     * @param string $section
     *
     * @return Lesson
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
     * @return Lesson
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
     * @return Lesson
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
     * Set ser
     *
     * @param integer $ser
     *
     * @return Lesson
     */
    public function setSer($ser)
    {
        $this->ser = $ser;

        return $this;
    }

    /**
     * Get ser
     *
     * @return integer
     */
    public function getSer()
    {
        return $this->ser;
    }

    /**
     * Set type
     *
     * @param \AppBundle\Entity\LessonType $type
     *
     * @return Lesson
     */
    public function setType(\AppBundle\Entity\LessonType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AppBundle\Entity\LessonType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set syllabus
     *
     * @param \AppBundle\Entity\Syllabus $syllabus
     *
     * @return Lesson
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
