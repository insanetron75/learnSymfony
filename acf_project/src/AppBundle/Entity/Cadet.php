<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cadet
 *
 * @ORM\Table(name="cadet", uniqueConstraints={@ORM\UniqueConstraint(name="cadets_id_uindex", columns={"id"}), @ORM\UniqueConstraint(name="cadets_cdt_fc_matrix_id_uindex", columns={"cdt_fc_matrix_id"})})
 * @ORM\Entity
 */
class Cadet
{
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
     * @var string
     *
     * @ORM\Column(name="syllabus_id", type="string", length=3, nullable=true)
     */
    private $syllabusId;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

