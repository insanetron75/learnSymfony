<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Qualifications
 *
 * @ORM\Table(name="qualifications", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="pk_qualifications_0", columns={"qualificaiton_type_id"})})
 * @ORM\Entity
 */
class Qualifications
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
     * @var integer
     *
     * @ORM\Column(name="qualificaiton_type_id", type="integer", nullable=false)
     */
    private $qualificaitonTypeId;



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
     * @return Qualifications
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
     * Set qualificaitonTypeId
     *
     * @param integer $qualificaitonTypeId
     *
     * @return Qualifications
     */
    public function setQualificaitonTypeId($qualificaitonTypeId)
    {
        $this->qualificaitonTypeId = $qualificaitonTypeId;

        return $this;
    }

    /**
     * Get qualificaitonTypeId
     *
     * @return integer
     */
    public function getQualificaitonTypeId()
    {
        return $this->qualificaitonTypeId;
    }
}
