<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Detachment
 *
 * @ORM\Table(name="detachment", uniqueConstraints={@ORM\UniqueConstraint(name="pk_detachment", columns={"id"})}, indexes={@ORM\Index(name="idx_detachment", columns={"company_id"}), @ORM\Index(name="idx_detachment_0", columns={"contact_information_id"}), @ORM\Index(name="idx_detachment_1", columns={"detachment_commander_id"}), @ORM\Index(name="idx_detachment_2", columns={"second_in_command_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Tools\Detachment\DetachmentRepository")
 */
class Detachment
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
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="affiliation", type="string", length=100, nullable=true)
     */
    private $affiliation;

    /**
     * @var \Company
     *
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     * })
     */
    private $company;

    /**
     * @var \ContactInformation
     *
     * @ORM\ManyToOne(targetEntity="ContactInformation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contact_information_id", referencedColumnName="id")
     * })
     */
    private $contactInformation;

    /**
     * @var \Instructor
     *
     * @ORM\ManyToOne(targetEntity="Instructor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="second_in_command_id", referencedColumnName="id")
     * })
     */
    private $secondInCommand;

    /**
     * @var \Instructor
     *
     * @ORM\ManyToOne(targetEntity="Instructor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="detachment_commander_id", referencedColumnName="id")
     * })
     */
    private $detachmentCommander;



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
     * @return Detachment
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
     * Set affiliation
     *
     * @param string $affiliation
     *
     * @return Detachment
     */
    public function setAffiliation($affiliation)
    {
        $this->affiliation = $affiliation;

        return $this;
    }

    /**
     * Get affiliation
     *
     * @return string
     */
    public function getAffiliation()
    {
        return $this->affiliation;
    }

    /**
     * Set company
     *
     * @param \AppBundle\Entity\Company $company
     *
     * @return Detachment
     */
    public function setCompany(\AppBundle\Entity\Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \AppBundle\Entity\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set contactInformation
     *
     * @param \AppBundle\Entity\ContactInformation $contactInformation
     *
     * @return Detachment
     */
    public function setContactInformation(\AppBundle\Entity\ContactInformation $contactInformation = null)
    {
        $this->contactInformation = $contactInformation;

        return $this;
    }

    /**
     * Get contactInformation
     *
     * @return \AppBundle\Entity\ContactInformation
     */
    public function getContactInformation()
    {
        return $this->contactInformation;
    }

    /**
     * Set secondInCommand
     *
     * @param \AppBundle\Entity\Instructor $secondInCommand
     *
     * @return Detachment
     */
    public function setSecondInCommand(\AppBundle\Entity\Instructor $secondInCommand = null)
    {
        $this->secondInCommand = $secondInCommand;

        return $this;
    }

    /**
     * Get secondInCommand
     *
     * @return \AppBundle\Entity\Instructor
     */
    public function getSecondInCommand()
    {
        return $this->secondInCommand;
    }

    /**
     * Set detachmentCommander
     *
     * @param \AppBundle\Entity\Instructor $detachmentCommander
     *
     * @return Detachment
     */
    public function setDetachmentCommander(\AppBundle\Entity\Instructor $detachmentCommander = null)
    {
        $this->detachmentCommander = $detachmentCommander;

        return $this;
    }

    /**
     * Get detachmentCommander
     *
     * @return \AppBundle\Entity\Instructor
     */
    public function getDetachmentCommander()
    {
        return $this->detachmentCommander;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
