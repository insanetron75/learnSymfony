<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DrillLesson
 *
 * @ORM\Table(name="drill_lesson", uniqueConstraints={@ORM\UniqueConstraint(name="drill_lessons_id_uindex", columns={"id"})}, indexes={@ORM\Index(name="drill_lessons_syllabus_id_fk", columns={"syllabus_id"})})
 * @ORM\Entity
 */
class DrillLesson
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=125, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="chapter", type="string", length=25, nullable=true)
     */
    private $chapter;

    /**
     * @var string
     *
     * @ORM\Column(name="section", type="string", length=25, nullable=true)
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
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Syllabus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Syllabus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="syllabus_id", referencedColumnName="id")
     * })
     */
    private $syllabus;


}

