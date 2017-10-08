<?php

namespace AppBundle\Entity;

use AppBundle\Tools\User\Tools;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="user_name_UNIQUE", columns={"user_name"})}, indexes={@ORM\Index(name="fk_user", columns={"instructor_id"})})
 * @ORM\Entity
 */
class User implements UserInterface
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
     * @ORM\Column(name="user_name", type="string", length=45, nullable=false)
     */
    private $userName;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=125, nullable=true)
     */
    private $password;

    /**
     * @var integer
     *
     * @ORM\Column(name="det_commander", type="integer", nullable=true)
     */
    private $detCommander;

    /**
     * @var integer
     *
     * @ORM\Column(name="det_2ic", type="integer", nullable=true)
     */
    private $det2ic;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userName
     *
     * @param string $userName
     *
     * @return User
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set detCommander
     *
     * @param integer $detCommander
     *
     * @return User
     */
    public function setDetCommander($detCommander)
    {
        $this->detCommander = $detCommander;

        return $this;
    }

    /**
     * Get detCommander
     *
     * @return integer
     */
    public function getDetCommander()
    {
        return $this->detCommander;
    }

    /**
     * Set det2ic
     *
     * @param integer $det2ic
     *
     * @return User
     */
    public function setDet2ic($det2ic)
    {
        $this->det2ic = $det2ic;

        return $this;
    }

    /**
     * Get det2ic
     *
     * @return integer
     */
    public function getDet2ic()
    {
        return $this->det2ic;
    }

    /**
     * Set instructor
     *
     * @param \AppBundle\Entity\Instructor $instructor
     *
     * @return User
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

    public function getRoles()
    {
        $roles = Tools::getRolesForUser($this);
        // give everyone ROLE_USER!
        if (!in_array('ROLE_USER', $roles)) {
            $roles[] = 'ROLE_USER';
        }

        return $roles;
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
