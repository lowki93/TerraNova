<?php

namespace Terra\NovaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classe
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Classe
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
     * @var string
     *
     * @ORM\Column(name="niveau", type="string", length=255)
     */
    private $niveau;

    /**
    * @ORM\ManyToOne(targetEntity="Terra\NovaBundle\Entity\Etablissement", inversedBy="classe")
    */
    protected $etablissement;

    /**
    * @ORM\ManyToOne(targetEntity="Terra\NovaBundle\Entity\User", inversedBy="classe")
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
     * Set name
     *
     * @param string $name
     * @return Classe
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
     * Set niveau
     *
     * @param string $niveau
     * @return Classe
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return string 
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set idEtablissement
     *
     * @param \Terra\NovaBundle\Entity\Etablissement $idEtablissement
     * @return Classe
     */
    public function setIdEtablissement(\Terra\NovaBundle\Entity\Etablissement $idEtablissement = null)
    {
        $this->idEtablissement = $idEtablissement;

        return $this;
    }

    /**
     * Get idEtablissement
     *
     * @return \Terra\NovaBundle\Entity\Etablissement 
     */
    public function getIdEtablissement()
    {
        return $this->idEtablissement;
    }

    /**
     * Set idEnseignant
     *
     * @param \Terra\NovaBundle\Entity\User $idEnseignant
     * @return Classe
     */
    public function setIdEnseignant(\Terra\NovaBundle\Entity\User $idEnseignant = null)
    {
        $this->idEnseignant = $idEnseignant;

        return $this;
    }

    /**
     * Get idEnseignant
     *
     * @return \Terra\NovaBundle\Entity\User 
     */
    public function getIdEnseignant()
    {
        return $this->idEnseignant;
    }

    /**
     * Set etablissement
     *
     * @param \Terra\NovaBundle\Entity\Etablissement $etablissement
     * @return Classe
     */
    public function setEtablissement(\Terra\NovaBundle\Entity\Etablissement $etablissement = null)
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    /**
     * Get etablissement
     *
     * @return \Terra\NovaBundle\Entity\Etablissement 
     */
    public function getEtablissement()
    {
        return $this->etablissement;
    }

    /**
     * Set enseignant
     *
     * @param \Terra\NovaBundle\Entity\User $enseignant
     * @return Classe
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
