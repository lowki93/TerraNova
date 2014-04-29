<?php

namespace Terra\NovaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \DateTime;

/**
 * ResultStudent
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Terra\NovaBundle\Entity\ResultStudentRepository")
 */
class ResultStudent
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
     * @ORM\Column(name="success", type="integer")
     */
    private $success;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timePassing", type="time")
     */
    private $timePassing;

    /**
     * @var integer
     *
     * @ORM\Column(name="NbThemePlay", type="integer")
     */
    private $nbThemePlay;

    /**
    * @ORM\ManyToOne(targetEntity="Terra\NovaBundle\Entity\Student", inversedBy="resultStudent")
    */
    protected $student;

    public function __construct($id)
    {

        $this->success = 0;
        $this->timePassing = new DateTime('0000-00-00 00:00');
        $this->nbThemePlay = 0;
        $this->student = $id;

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
     * Set success
     *
     * @param integer $success
     * @return ResultStudent
     */
    public function setSuccess($success)
    {
        $this->success = $success;

        return $this;
    }

    /**
     * Get success
     *
     * @return integer 
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * Set timePassing
     *
     * @param \DateTime $timePassing
     * @return ResultStudent
     */
    public function setTimePassing($timePassing)
    {
        $this->timePassing = $timePassing;

        return $this;
    }

    /**
     * Get timePassing
     *
     * @return \DateTime 
     */
    public function getTimePassing()
    {
        return $this->timePassing;
    }

    /**
     * Set nbThemePlay
     *
     * @param integer $nbThemePlay
     * @return ResultStudent
     */
    public function setNbThemePlay($nbThemePlay)
    {
        $this->nbThemePlay = $nbThemePlay;

        return $this;
    }

    /**
     * Get nbThemePlay
     *
     * @return integer 
     */
    public function getNbThemePlay()
    {
        return $this->nbThemePlay;
    }

    /**
     * Set student
     *
     * @param \Terra\NovaBundle\Entity\Student $student
     * @return ResultStudent
     */
    public function setStudent(\Terra\NovaBundle\Entity\Student $student = null)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \Terra\NovaBundle\Entity\Student 
     */
    public function getStudent()
    {
        return $this->student;
    }
}
