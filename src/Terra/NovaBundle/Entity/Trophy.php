<?php

namespace Terra\NovaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trophy
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Trophy
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;

    /**
     * @ORM\ManyToOne(targetEntity="Terra\NovaBundle\Entity\SousTheme", inversedBy="trophy")
     */
    protected $sousTheme;
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
     * @return Trophy
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
     * @return Trophy
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
     * Set path
     *
     * @param string $path
     * @return Trophy
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set sousTheme
     *
     * @param \Terra\NovaBundle\Entity\SousTheme $sousTheme
     * @return Trophy
     */
    public function setSousTheme(\Terra\NovaBundle\Entity\SousTheme $sousTheme = null)
    {
        $this->sousTheme = $sousTheme;

        return $this;
    }

    /**
     * Get sousTheme
     *
     * @return \Terra\NovaBundle\Entity\SousTheme 
     */
    public function getSousTheme()
    {
        return $this->sousTheme;
    }
}
