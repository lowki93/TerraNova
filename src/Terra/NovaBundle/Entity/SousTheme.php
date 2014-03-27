<?php

namespace Terra\NovaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SousTheme
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class SousTheme
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Terra\NovaBundle\Entity\Theme", inversedBy="sousTheme")
     */
    protected $theme;

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
     * Set ame
     *
     * @param string $ame
     * @return SousTheme
     */
    public function setAme($ame)
    {
        $this->ame = $ame;

        return $this;
    }

    /**
     * Get ame
     *
     * @return string
     */
    public function getAme()
    {
        return $this->ame;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->seance = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return SousTheme
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
     * Set theme
     *
     * @param \Terra\NovaBundle\Entity\Theme $theme
     * @return SousTheme
     */
    public function setTheme(\Terra\NovaBundle\Entity\Theme $theme = null)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return \Terra\NovaBundle\Entity\Theme 
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Add seance
     *
     * @param \Terra\NovaBundle\Entity\Seance $seance
     * @return SousTheme
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
