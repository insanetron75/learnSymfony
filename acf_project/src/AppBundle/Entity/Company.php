<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 *
 * @ORM\Table(name="company", indexes={@ORM\Index(name="idx_company", columns={"contact_information_id"}), @ORM\Index(name="idx_company_0", columns={"battalion_id"})})
 * @ORM\Entity
 */
class Company
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
     * @var \Battalion
     *
     * @ORM\ManyToOne(targetEntity="Battalion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="battalion_id", referencedColumnName="id")
     * })
     */
    private $battalion;

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
     * @return Company
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
     * Set battalion
     *
     * @param \AppBundle\Entity\Battalion $battalion
     *
     * @return Company
     */
    public function setBattalion(\AppBundle\Entity\Battalion $battalion = null)
    {
        $this->battalion = $battalion;

        return $this;
    }

    /**
     * Get battalion
     *
     * @return \AppBundle\Entity\Battalion
     */
    public function getBattalion()
    {
        return $this->battalion;
    }

    /**
     * Set contactInformation
     *
     * @param \AppBundle\Entity\ContactInformation $contactInformation
     *
     * @return Company
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
