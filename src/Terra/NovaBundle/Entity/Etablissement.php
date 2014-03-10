<?php

namespace Terra\NovaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etablissement
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Etablissement
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
     * @var integer
     *
     * @ORM\Column(name="numero_national", type="integer")
     */
    private $numeroNational;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var integer
     *
     * @ORM\Column(name="code_postal", type="integer")
     */
    private $codePostal;

    /**
     * @var integer
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
    * @ORM\OneToMany(targetEntity="Terra\NovaBundle\Entity\User", mappedBy="idEtablissement")
    */
    protected $ensaignant;


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
     * Set numeroNational
     *
     * @param integer $numeroNational
     * @return Etablissement
     */
    public function setNumeroNational($numeroNational)
    {
        $this->numeroNational = $numeroNational;

        return $this;
    }

    /**
     * Get numeroNational
     *
     * @return integer 
     */
    public function getNumeroNational()
    {
        return $this->numeroNational;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Etablissement
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
     * Set type
     *
     * @param string $type
     * @return Etablissement
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Etablissement
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codePostal
     *
     * @param integer $codePostal
     * @return Etablissement
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return integer 
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Etablissement
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set ville
     *
     * @param integer $ville
     * @return Etablissement
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return integer 
     */
    public function getVille()
    {
        return $this->ville;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ensaignant = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ensaignant
     *
     * @param \Terra\NovaBundle\Entity\User $ensaignant
     * @return Etablissement
     */
    public function addEnsaignant(\Terra\NovaBundle\Entity\User $ensaignant)
    {
        $this->ensaignant[] = $ensaignant;

        return $this;
    }

    /**
     * Remove ensaignant
     *
     * @param \Terra\NovaBundle\Entity\User $ensaignant
     */
    public function removeEnsaignant(\Terra\NovaBundle\Entity\User $ensaignant)
    {
        $this->ensaignant->removeElement($ensaignant);
    }

    /**
     * Get ensaignant
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEnsaignant()
    {
        return $this->ensaignant;
    }
}
