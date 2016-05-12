<?php

namespace ProgressionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * progression
 */
class progression
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $statistiques;

    /**
     * @var string
     */
    private $recompenses;

    /**
     * @var string
     */
    private $badges;


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
     * Set statistiques
     *
     * @param string $statistiques
     * @return progression
     */
    public function setStatistiques($statistiques)
    {
        $this->statistiques = $statistiques;

        return $this;
    }

    /**
     * Get statistiques
     *
     * @return string 
     */
    public function getStatistiques()
    {
        return $this->statistiques;
    }

    /**
     * Set recompenses
     *
     * @param string $recompenses
     * @return progression
     */
    public function setRecompenses($recompenses)
    {
        $this->recompenses = $recompenses;

        return $this;
    }

    /**
     * Get recompenses
     *
     * @return string 
     */
    public function getRecompenses()
    {
        return $this->recompenses;
    }

    /**
     * Set badges
     *
     * @param string $badges
     * @return progression
     */
    public function setBadges($badges)
    {
        $this->badges = $badges;

        return $this;
    }

    /**
     * Get badges
     *
     * @return string 
     */
    public function getBadges()
    {
        return $this->badges;
    }
}
