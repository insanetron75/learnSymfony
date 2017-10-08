<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InstructorQualifications
 *
 * @ORM\Table(name="instructor_qualifications", indexes={@ORM\Index(name="idx_instructor_qualifications", columns={"qualification_id"}), @ORM\Index(name="idx_instructor_qualifications_0", columns={"instructor_id"})})
 * @ORM\Entity
 */
class InstructorQualifications
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
     * @var integer
     *
     * @ORM\Column(name="awarded", type="integer", nullable=false)
     */
    private $awarded;

    /**
     * @var integer
     *
     * @ORM\Column(name="expires", type="integer", nullable=true)
     */
    private $expires;

    /**
     * @var string
     *
     * @ORM\Column(name="grade", type="string", length=25, nullable=true)
     */
    private $grade;

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
     * @var \Qualifications
     *
     * @ORM\ManyToOne(targetEntity="Qualifications")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="qualification_id", referencedColumnName="id")
     * })
     */
    private $qualification;



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
     * Set awarded
     *
     * @param integer $awarded
     *
     * @return InstructorQualifications
     */
    public function setAwarded($awarded)
    {
        $this->awarded = $awarded;

        return $this;
    }

    /**
     * Get awarded
     *
     * @return integer
     */
    public function getAwarded()
    {
        return $this->awarded;
    }

    /**
     * Set expires
     *
     * @param integer $expires
     *
     * @return InstructorQualifications
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * Get expires
     *
     * @return integer
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * Set grade
     *
     * @param string $grade
     *
     * @return InstructorQualifications
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade
     *
     * @return string
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set instructor
     *
     * @param \AppBundle\Entity\Instructor $instructor
     *
     * @return InstructorQualifications
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
     * Set qualification
     *
     * @param \AppBundle\Entity\Qualifications $qualification
     *
     * @return InstructorQualifications
     */
    public function setQualification(\AppBundle\Entity\Qualifications $qualification = null)
    {
        $this->qualification = $qualification;

        return $this;
    }

    /**
     * Get qualification
     *
     * @return \AppBundle\Entity\Qualifications
     */
    public function getQualification()
    {
        return $this->qualification;
    }
}
