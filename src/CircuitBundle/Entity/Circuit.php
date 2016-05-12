<?php

namespace CircuitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Circuit
 */
class Circuit
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $randonnees;

    /**
     * @var string
     */
    private $velos;


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
     * Set randonnees
     *
     * @param string $randonnees
     * @return Circuit
     */
    public function setRandonnees($randonnees)
    {
        $this->randonnees = $randonnees;

        return $this;
    }

    /**
     * Get randonnees
     *
     * @return string 
     */
    public function getRandonnees()
    {
        return $this->randonnees;
    }

    /**
     * Set velos
     *
     * @param string $velos
     * @return Circuit
     */
    public function setVelos($velos)
    {
        $this->velos = $velos;

        return $this;
    }

    /**
     * Get velos
     *
     * @return string 
     */
    public function getVelos()
    {
        return $this->velos;
    }
}
