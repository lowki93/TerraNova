<?php

namespace Terra\NovaBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="User")
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
    protected $idEtablissement;

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
}
