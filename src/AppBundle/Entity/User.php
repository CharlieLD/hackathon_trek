<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }


  
    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $progressions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $users;


    /**
     * Set name
     *
     * @param string $name
     * @return User
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
     * Add progressions
     *
     * @param \ProgressionBundle\Entity\progression $progressions
     * @return User
     */
    public function addProgression(\ProgressionBundle\Entity\progression $progressions)
    {
        $this->progressions[] = $progressions;

        return $this;
    }

    /**
     * Remove progressions
     *
     * @param \ProgressionBundle\Entity\progression $progressions
     */
    public function removeProgression(\ProgressionBundle\Entity\progression $progressions)
    {
        $this->progressions->removeElement($progressions);
    }

    /**
     * Get progressions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProgressions()
    {
        return $this->progressions;
    }

    /**
     * Add users
     *
     * @param \AppBundle\Entity\User $users
     * @return User
     */
    public function addUser(\AppBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \AppBundle\Entity\User $users
     */
    public function removeUser(\AppBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
