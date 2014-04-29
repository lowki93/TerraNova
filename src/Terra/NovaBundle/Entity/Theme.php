<?php

namespace Terra\NovaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * Theme
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ExclusionPolicy("all")
 */
class Theme
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Expose
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Terra\NovaBundle\Entity\SousTheme", mappedBy="theme")
     * @Expose
     */
    protected $sousTheme;

    /**
     * @ORM\OneToMany(targetEntity="Terra\NovaBundle\Entity\Seance", mappedBy="theme")
     */
    protected $seance;

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
     * Set name
     *
     * @param string $name
     * @return Theme
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
     * Constructor
     */
    public function __construct()
    {
        $this->sousTheme = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add sousTheme
     *
     * @param \Terra\NovaBundle\Entity\SousTheme $sousTheme
     * @return Theme
     */
    public function addSousTheme(\Terra\NovaBundle\Entity\SousTheme $sousTheme)
    {
        $this->sousTheme[] = $sousTheme;

        return $this;
    }

    /**
     * Remove sousTheme
     *
     * @param \Terra\NovaBundle\Entity\SousTheme $sousTheme
     */
    public function removeSousTheme(\Terra\NovaBundle\Entity\SousTheme $sousTheme)
    {
        $this->sousTheme->removeElement($sousTheme);
    }

    /**
     * Get sousTheme
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSousTheme()
    {
        return $this->sousTheme;
    }

    /**
     * Add seance
     *
     * @param \Terra\NovaBundle\Entity\Seance $seance
     * @return Theme
     */
    public function addSeance(\Terra\NovaBundle\Entity\Seance $seance)
    {
        $this->seance[] = $seance;

        return $this;
    }

    /**
     * Remove seance
     *
     * @param \Terra\NovaBundle\Entity\Seance $seance
     */
    public function removeSeance(\Terra\NovaBundle\Entity\Seance $seance)
    {
        $this->seance->removeElement($seance);
    }

    /**
     * Get seance
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSeance()
    {
        return $this->seance;
    }
}
