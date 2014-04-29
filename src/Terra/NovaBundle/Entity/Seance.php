<?php

namespace Terra\NovaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * Seance
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Terra\NovaBundle\Entity\SeanceRepository")
 * @ExclusionPolicy("all")
 */
class Seance
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure", type="time")
     */
    private $heure;

    /**
     * @var string
     *
     * @ORM\Column(name="intro", type="string", length=255)
     * @Expose
     */
    private $intro;

    /**
     * @var boolean
     *
     * @ORM\Column(name="test", type="boolean")
     * @Expose
     */
    private $test;

   /**
    * @ORM\ManyToOne(targetEntity="Terra\NovaBundle\Entity\Classe", inversedBy="seance")
    * @Expose
    */
   protected $classe;

    /**
    * @ORM\ManyToOne(targetEntity="Terra\NovaBundle\Entity\Theme", inversedBy="seance")
    * @Expose
    */
    protected $theme;

    /**
    * @ORM\ManyToOne(targetEntity="Terra\NovaBundle\Entity\User", inversedBy="seance")
    */
   protected $enseignant;

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
     * Set date
     *
     * @param \DateTime $date
     * @return Seance
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set heure
     *
     * @param \DateTime $heure
     * @return Seance
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * Get heure
     *
     * @return \DateTime
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * Set intro
     *
     * @param string $intro
     * @return Seance
     */
    public function setIntro($intro)
    {
        $this->intro = $intro;

        return $this;
    }

    /**
     * Get intro
     *
     * @return string
     */
    public function getIntro()
    {
        return $this->intro;
    }

    /**
     * Set test
     *
     * @param boolean $test
     * @return Seance
     */
    public function setTest($test)
    {
        $this->test = $test;

        return $this;
    }

    /**
     * Get test
     *
     * @return boolean
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * Set classe
     *
     * @param \Terra\NovaBundle\Entity\Classe $classe
     * @return Seance
     */
    public function setClasse(\Terra\NovaBundle\Entity\Classe $classe = null)
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * Get classe
     *
     * @return \Terra\NovaBundle\Entity\Classe 
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * Set theme
     *
     * @param \Terra\NovaBundle\Entity\Theme $theme
     * @return Seance
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
     * Set enseignant
     *
     * @param \Terra\NovaBundle\Entity\User $enseignant
     * @return Seance
     */
    public function setEnseignant(\Terra\NovaBundle\Entity\User $enseignant = null)
    {
        $this->enseignant = $enseignant;

        return $this;
    }

    /**
     * Get enseignant
     *
     * @return \Terra\NovaBundle\Entity\User 
     */
    public function getEnseignant()
    {
        return $this->enseignant;
    }
}
