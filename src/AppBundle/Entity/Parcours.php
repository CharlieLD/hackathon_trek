<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Parcours
 */
class Parcours
{
    /**
     * @var int
     */
    private $id;


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
     * @var \AppBundle\Entity\User
     */
    private $utilisateur;

    /**
     * @var \CircuitBundle\Entity\Circuit
     */
    private $circuit;


    /**
     * Set utilisateur
     *
     * @param \AppBundle\Entity\User $utilisateur
     * @return Parcours
     */
    public function setUtilisateur(\AppBundle\Entity\User $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set circuit
     *
     * @param \CircuitBundle\Entity\Circuit $circuit
     * @return Parcours
     */
    public function setCircuit(\CircuitBundle\Entity\Circuit $circuit = null)
    {
        $this->circuit = $circuit;

        return $this;
    }

    /**
     * Get circuit
     *
     * @return \CircuitBundle\Entity\Circuit 
     */
    public function getCircuit()
    {
        return $this->circuit;
    }
}
