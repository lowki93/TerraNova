<?php

namespace Terra\NovaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ResultSubTheme
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ResultSubTheme
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
     * @ORM\Column(name="cozeText", type="string", length=255)
     */
    private $cozeText;

    /**
     * @var string
     *
     * @ORM\Column(name="dragCozeText", type="string", length=255)
     */
    private $dragCozeText;

    /**
     * @var string
     *
     * @ORM\Column(name="trueFalse", type="string", length=255)
     */
    private $trueFalse;

    /**
     * @var string
     *
     * @ORM\Column(name="freeSentence", type="string", length=255)
     */
    private $freeSentence;

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
     * @var string
     *
     * @ORM\Column(name="levelSuccess", type="string", length=255)
     */
    private $levelSuccess;


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
     * Set cozeText
     *
     * @param string $cozeText
     * @return ResultSubTheme
     */
    public function setCozeText($cozeText)
    {
        $this->cozeText = $cozeText;

        return $this;
    }

    /**
     * Get cozeText
     *
     * @return string 
     */
    public function getCozeText()
    {
        return $this->cozeText;
    }

    /**
     * Set dragCozeText
     *
     * @param string $dragCozeText
     * @return ResultSubTheme
     */
    public function setDragCozeText($dragCozeText)
    {
        $this->dragCozeText = $dragCozeText;

        return $this;
    }

    /**
     * Get dragCozeText
     *
     * @return string 
     */
    public function getDragCozeText()
    {
        return $this->dragCozeText;
    }

    /**
     * Set trueFalse
     *
     * @param string $trueFalse
     * @return ResultSubTheme
     */
    public function setTrueFalse($trueFalse)
    {
        $this->trueFalse = $trueFalse;

        return $this;
    }

    /**
     * Get trueFalse
     *
     * @return string 
     */
    public function getTrueFalse()
    {
        return $this->trueFalse;
    }

    /**
     * Set freeSentence
     *
     * @param string $freeSentence
     * @return ResultSubTheme
     */
    public function setFreeSentence($freeSentence)
    {
        $this->freeSentence = $freeSentence;

        return $this;
    }

    /**
     * Get freeSentence
     *
     * @return string 
     */
    public function getFreeSentence()
    {
        return $this->freeSentence;
    }

    /**
     * Set success
     *
     * @param integer $success
     * @return ResultSubTheme
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
     * @return ResultSubTheme
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
     * Set levelSuccess
     *
     * @param string $levelSuccess
     * @return ResultSubTheme
     */
    public function setLevelSuccess($levelSuccess)
    {
        $this->levelSuccess = $levelSuccess;

        return $this;
    }

    /**
     * Get levelSuccess
     *
     * @return string 
     */
    public function getLevelSuccess()
    {
        return $this->levelSuccess;
    }
}
