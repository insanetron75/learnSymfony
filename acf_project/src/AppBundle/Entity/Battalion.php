<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Battalion
 *
 * @ORM\Table(name="battalion", indexes={@ORM\Index(name="idx_battalion", columns={"contact_information_id"})})
 * @ORM\Entity
 */
class Battalion
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
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="affiliation", type="string", length=100, nullable=true)
     */
    private $affiliation;

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
     * @return Battalion
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
     * @return Battalion
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
     * Set contactInformation
     *
     * @param \AppBundle\Entity\ContactInformation $contactInformation
     *
     * @return Battalion
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
}
