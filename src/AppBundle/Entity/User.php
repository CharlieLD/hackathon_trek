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
     * @var \ProgressionBundle\Entity\progression
     */
    private $progression;


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
     * Set progression
     *
     * @param \ProgressionBundle\Entity\progression $progression
     * @return User
     */
    public function setProgression(\ProgressionBundle\Entity\progression $progression = null)
    {
        $this->progression = $progression;

        return $this;
    }

    /**
     * Get progression
     *
     * @return \ProgressionBundle\Entity\progression 
     */
    public function getProgression()
    {
        return $this->progression;
    }
}
