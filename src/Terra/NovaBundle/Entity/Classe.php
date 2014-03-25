<?php

namespace Terra\NovaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classe
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Terra\NovaBundle\Entity\ClasseRepository")
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
     * @ORM\OneToMany(targetEntity="Terra\NovaBundle\Entity\Student", mappedBy="classe")
     */
    protected $student;

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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->student = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add student
     *
     * @param \Terra\NovaBundle\Entity\Student $student
     * @return Classe
     */
    public function addStudent(\Terra\NovaBundle\Entity\Student $student)
    {
        $this->student[] = $student;

        return $this;
    }

    /**
     * Remove student
     *
     * @param \Terra\NovaBundle\Entity\Student $student
     */
    public function removeStudent(\Terra\NovaBundle\Entity\Student $student)
    {
        $this->student->removeElement($student);
    }

    /**
     * Get student
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStudent()
    {
        return $this->student;
    }
}
