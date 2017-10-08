<?php
/**
 * Created by PhpStorm.
 * User: Timmy
 * Date: 06/10/2017
 * Time: 08:38
 */

namespace AppBundle\Tools\User;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class Tools
{
    private static $em;

    /**
     * Tools constructor.
     *
     * @param $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param User $user
     *
     * @return array
     */
    public static function getRolesForUser(User $user)
    {
        $roles = [];

        // Check if the user is a dc
        if ($user->getDetCommander()) {
            $roles[] = 'ROLE_DETACHMENT_COMMANDER';
            $roles[] = 'ROLE_DETACHMENT_2IC';
        }

        // Next check if the user is a 2ic
        if ($user->getDet2ic()) {
            $roles[] = 'ROLE_DETACHMENT_2IC';
        }
        return $roles;
    }

}