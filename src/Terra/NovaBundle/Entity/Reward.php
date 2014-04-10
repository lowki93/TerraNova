<?php

namespace Terra\NovaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reward
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Reward
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
     * @ORM\OneToMany(targetEntity="Terra\NovaBundle\Entity\Badge", mappedBy="reward")
     */
    protected $bagde;

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
     * @return Reward
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
        $this->bagde = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add bagde
     *
     * @param \Terra\NovaBundle\Entity\Badge $bagde
     * @return Reward
     */
    public function addBagde(\Terra\NovaBundle\Entity\Badge $bagde)
    {
        $this->bagde[] = $bagde;

        return $this;
    }

    /**
     * Remove bagde
     *
     * @param \Terra\NovaBundle\Entity\Badge $bagde
     */
    public function removeBagde(\Terra\NovaBundle\Entity\Badge $bagde)
    {
        $this->bagde->removeElement($bagde);
    }

    /**
     * Get bagde
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBagde()
    {
        return $this->bagde;
    }
}
