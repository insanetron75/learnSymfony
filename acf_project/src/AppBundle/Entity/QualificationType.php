<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QualificationType
 *
 * @ORM\Table(name="qualification_type")
 * @ORM\Entity
 */
class QualificationType
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var \Qualifications
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Qualifications")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="qualificaiton_type_id")
     * })
     */
    private $id;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return QualificationType
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
     * Set id
     *
     * @param \AppBundle\Entity\Qualifications $id
     *
     * @return QualificationType
     */
    public function setId(\AppBundle\Entity\Qualifications $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \AppBundle\Entity\Qualifications
     */
    public function getId()
    {
        return $this->id;
    }
}
