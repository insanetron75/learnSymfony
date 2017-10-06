<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Instructor;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="user_name_UNIQUE", columns={"user_name"})}, indexes={@ORM\Index(name="users_instructors_id_fk", columns={"instructor_id"})})
 * @ORM\Entity
 */
class User implements UserInterface
{
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
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Instructor
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Instructor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="instructor_id", referencedColumnName="id")
     * })
     */
    private $instructor;

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return Instructor
     */
    public function getInstructor()
    {
        return $this->instructor;
    }

    /**
     * @param Instructor $instructor
     */
    public function setInstructor($instructor)
    {
        $this->instructor = $instructor;
    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function getSalt()
    {

    }

    public function eraseCredentials()
    {

    }

}

