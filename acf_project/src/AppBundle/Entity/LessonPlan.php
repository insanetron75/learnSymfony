<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LessonPlan
 *
 * @ORM\Table(name="lesson_plan", indexes={@ORM\Index(name="idx_lesson_plan", columns={"permission_type_id"}), @ORM\Index(name="idx_lesson_plan_0", columns={"lesson_id"}), @ORM\Index(name="idx_lesson_plan_1", columns={"instructor_id"})})
 * @ORM\Entity
 */
class LessonPlan
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
     * @ORM\Column(name="start", type="text", length=16777215, nullable=true)
     */
    private $start;

    /**
     * @var string
     *
     * @ORM\Column(name="middle", type="text", length=16777215, nullable=true)
     */
    private $middle;

    /**
     * @var string
     *
     * @ORM\Column(name="end", type="text", length=16777215, nullable=true)
     */
    private $end;

    /**
     * @var integer
     *
     * @ORM\Column(name="timestamp", type="integer", nullable=true)
     */
    private $timestamp;

    /**
     * @var integer
     *
     * @ORM\Column(name="period_count", type="integer", nullable=true)
     */
    private $periodCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="length", type="integer", nullable=true)
     */
    private $length;

    /**
     * @var \Instructor
     *
     * @ORM\ManyToOne(targetEntity="Instructor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="instructor_id", referencedColumnName="id")
     * })
     */
    private $instructor;

    /**
     * @var \PermissionType
     *
     * @ORM\ManyToOne(targetEntity="PermissionType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="permission_type_id", referencedColumnName="id")
     * })
     */
    private $permissionType;

    /**
     * @var \Lesson
     *
     * @ORM\ManyToOne(targetEntity="Lesson")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lesson_id", referencedColumnName="id")
     * })
     */
    private $lesson;



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
     * Set start
     *
     * @param string $start
     *
     * @return LessonPlan
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return string
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set middle
     *
     * @param string $middle
     *
     * @return LessonPlan
     */
    public function setMiddle($middle)
    {
        $this->middle = $middle;

        return $this;
    }

    /**
     * Get middle
     *
     * @return string
     */
    public function getMiddle()
    {
        return $this->middle;
    }

    /**
     * Set end
     *
     * @param string $end
     *
     * @return LessonPlan
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return string
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set timestamp
     *
     * @param integer $timestamp
     *
     * @return LessonPlan
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return integer
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set periodCount
     *
     * @param integer $periodCount
     *
     * @return LessonPlan
     */
    public function setPeriodCount($periodCount)
    {
        $this->periodCount = $periodCount;

        return $this;
    }

    /**
     * Get periodCount
     *
     * @return integer
     */
    public function getPeriodCount()
    {
        return $this->periodCount;
    }

    /**
     * Set length
     *
     * @param integer $length
     *
     * @return LessonPlan
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return integer
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set instructor
     *
     * @param \AppBundle\Entity\Instructor $instructor
     *
     * @return LessonPlan
     */
    public function setInstructor(\AppBundle\Entity\Instructor $instructor = null)
    {
        $this->instructor = $instructor;

        return $this;
    }

    /**
     * Get instructor
     *
     * @return \AppBundle\Entity\Instructor
     */
    public function getInstructor()
    {
        return $this->instructor;
    }

    /**
     * Set permissionType
     *
     * @param \AppBundle\Entity\PermissionType $permissionType
     *
     * @return LessonPlan
     */
    public function setPermissionType(\AppBundle\Entity\PermissionType $permissionType = null)
    {
        $this->permissionType = $permissionType;

        return $this;
    }

    /**
     * Get permissionType
     *
     * @return \AppBundle\Entity\PermissionType
     */
    public function getPermissionType()
    {
        return $this->permissionType;
    }

    /**
     * Set lesson
     *
     * @param \AppBundle\Entity\Lesson $lesson
     *
     * @return LessonPlan
     */
    public function setLesson(\AppBundle\Entity\Lesson $lesson = null)
    {
        $this->lesson = $lesson;

        return $this;
    }

    /**
     * Get lesson
     *
     * @return \AppBundle\Entity\Lesson
     */
    public function getLesson()
    {
        return $this->lesson;
    }
}
