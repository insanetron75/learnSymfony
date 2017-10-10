<?php

namespace AppBundle\Entity;

use AppBundle\Tools\Instructor\Tools;
use Doctrine\ORM\Mapping as ORM;

/**
 * Instructor
 *
 * @ORM\Table(name="instructor", indexes={@ORM\Index(name="idx_instructor", columns={"instructor_qualifications_id"}), @ORM\Index(name="idx_instructor_0", columns={"detachment_id"}), @ORM\Index(name="idx_instructor_1", columns={"contact_infomration_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Tools\Instructor\InstructorRepository")
 */
class Instructor
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
     * @ORM\Column(name="number", type="integer", nullable=false)
     */
    private $number;

    /**
     * @var \ContactInformation
     *
     * @ORM\ManyToOne(targetEntity="ContactInformation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contact_infomration_id", referencedColumnName="id")
     * })
     */
    private $contactInfomration;

    /**
     * @var \ContactInformation
     *
     * @ORM\ManyToOne(targetEntity="ContactInformation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="instructor_qualifications_id", referencedColumnName="id")
     * })
     */
    private $instructorQualifications;

    /**
     * @var \Detachment
     *
     * @ORM\ManyToOne(targetEntity="Detachment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="detachment_id", referencedColumnName="id")
     * })
     */
    private $detachment;



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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Instructor
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Instructor
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set rank
     *
     * @param string $rank
     *
     * @return Instructor
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return string
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Instructor
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set contactInfomration
     *
     * @param \AppBundle\Entity\ContactInformation $contactInfomration
     *
     * @return Instructor
     */
    public function setContactInfomration(\AppBundle\Entity\ContactInformation $contactInfomration = null)
    {
        $this->contactInfomration = $contactInfomration;

        return $this;
    }

    /**
     * Get contactInfomration
     *
     * @return \AppBundle\Entity\ContactInformation
     */
    public function getContactInfomration()
    {
        return $this->contactInfomration;
    }

    /**
     * Set instructorQualifications
     *
     * @param \AppBundle\Entity\ContactInformation $instructorQualifications
     *
     * @return Instructor
     */
    public function setInstructorQualifications(\AppBundle\Entity\ContactInformation $instructorQualifications = null)
    {
        $this->instructorQualifications = $instructorQualifications;

        return $this;
    }

    /**
     * Get instructorQualifications
     *
     * @return \AppBundle\Entity\ContactInformation
     */
    public function getInstructorQualifications()
    {
        return $this->instructorQualifications;
    }

    /**
     * Set detachment
     *
     * @param \AppBundle\Entity\Detachment $detachment
     *
     * @return Instructor
     */
    public function setDetachment(\AppBundle\Entity\Detachment $detachment = null)
    {
        $this->detachment = $detachment;

        return $this;
    }

    /**
     * Get detachment
     *
     * @return \AppBundle\Entity\Detachment
     */
    public function getDetachment()
    {
        return $this->detachment;
    }

    public function __toString()
    {
        return Tools::convertRankToShortHand($this) . ' ' .
            $this->getFirstName() . ' ' .
            $this->getLastName();
    }
}
