<?php

namespace Terra\NovaBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Enseignant")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
    * @ORM\Column(name="last_name", type="string", length=100)
    */
    protected $lastName;

    /**
    * @ORM\Column(name="name", type="string", length=100)
    */
    protected $name;

    /**
    * @ORM\ManyToOne(targetEntity="Terra\NovaBundle\Entity\Etablissement", inversedBy="ensaignant")
    */
    protected $etablissement;

    /**
    * @ORM\OneToMany(targetEntity="Terra\NovaBundle\Entity\Classe", mappedBy="enseignant")
    */
    protected $classe;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */ 
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idEtablissement
     *
     * @param \Terra\NovaBundle\Entity\Etablissement $idEtablissement
     * @return User
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
     * Add classe
     *
     * @param \Terra\NovaBundle\Entity\Classe $classe
     * @return User
     */
    public function addClasse(\Terra\NovaBundle\Entity\Classe $classe)
    {
        $this->classe[] = $classe;

        return $this;
    }

    /**
     * Remove classe
     *
     * @param \Terra\NovaBundle\Entity\Classe $classe
     */
    public function removeClasse(\Terra\NovaBundle\Entity\Classe $classe)
    {
        $this->classe->removeElement($classe);
    }

    /**
     * Get classe
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * Set etablissement
     *
     * @param \Terra\NovaBundle\Entity\Etablissement $etablissement
     * @return User
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
}
