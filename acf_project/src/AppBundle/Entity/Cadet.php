<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cadet
 *
 * @ORM\Table(name="cadet", uniqueConstraints={@ORM\UniqueConstraint(name="cadets_id_uindex", columns={"id"}), @ORM\UniqueConstraint(name="cadets_cdt_fc_matrix_id_uindex", columns={"cdt_fc_matrix_id"}), @ORM\UniqueConstraint(name="pk_cadet_0", columns={"contact_information_id"})}, indexes={@ORM\Index(name="idx_cadet_0", columns={"syllabus_id"}), @ORM\Index(name="idx_cadet", columns={"detachment_id"})})
 * @ORM\Entity
 */
class Cadet
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
     * @ORM\Column(name="first_name", type="string", length=25, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=25, nullable=true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="rank", type="string", length=25, nullable=true)
     */
    private $rank;

    /**
     * @var integer
     *
     * @ORM\Column(name="cdt_fc_matrix_id", type="integer", nullable=true)
     */
    private $cdtFcMatrixId;

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
     * @var \ContactInformation
     *
     * @ORM\ManyToOne(targetEntity="ContactInformation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contact_information_id", referencedColumnName="id")
     * })
     */
    private $contactInformation;

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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Cadet
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
     * @return Cadet
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
     * @return Cadet
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
     * Set cdtFcMatrixId
     *
     * @param integer $cdtFcMatrixId
     *
     * @return Cadet
     */
    public function setCdtFcMatrixId($cdtFcMatrixId)
    {
        $this->cdtFcMatrixId = $cdtFcMatrixId;

        return $this;
    }

    /**
     * Get cdtFcMatrixId
     *
     * @return integer
     */
    public function getCdtFcMatrixId()
    {
        return $this->cdtFcMatrixId;
    }

    /**
     * Set detachment
     *
     * @param \AppBundle\Entity\Detachment $detachment
     *
     * @return Cadet
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

    /**
     * Set contactInformation
     *
     * @param \AppBundle\Entity\ContactInformation $contactInformation
     *
     * @return Cadet
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
     * Set syllabus
     *
     * @param \AppBundle\Entity\Syllabus $syllabus
     *
     * @return Cadet
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
