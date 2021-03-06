<?php

namespace Terra\NovaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 *
 * @ORM\Table(name="Student")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Terra\NovaBundle\Entity\StudentRepository")
 */
class Student
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
     * @ORM\Column(name="login", type="string", length=255)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var integer
     *
     * @ORM\Column(name="avatar", type="integer")
     */
    private $avatar;

    /**
     * @var string
     *
     * @ORM\Column(name="remarks", type="string", length=4096, nullable=true)
     */
    private $remarks;

    /**
     * @var array $badges
     *
     * @ORM\Column(name="badges", type="array", nullable=true)
     */
    private $badges;

    /**
     * @ORM\ManyToOne(targetEntity="Terra\NovaBundle\Entity\Classe", inversedBy="student")
     */
    protected $classe;

    /**
    * @ORM\OneToMany(targetEntity="Terra\NovaBundle\Entity\ResultSubTheme", mappedBy="student")
    */
    protected $resultSubTheme;

    /**
    * @ORM\OneToMany(targetEntity="Terra\NovaBundle\Entity\ResultStudent", mappedBy="student")
    */
    protected $resultStudent;

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
     * @return Student
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
     * Set firstName
     *
     * @param string $firstName
     * @return Student
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return Student
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set avatar
     *
     * @param integer $avatar
     * @return Student
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return integer
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set classe
     *
     * @param \Terra\NovaBundle\Entity\Classe $classe
     * @return Student
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
     * Set login
     *
     * @param string $login
     * @return Student
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->resultSubTheme = new \Doctrine\Common\Collections\ArrayCollection();
        $this->badges = array();
    }

    /**
     * Add resultSubTheme
     *
     * @param \Terra\NovaBundle\Entity\ResultSubTheme $resultSubTheme
     * @return Student
     */
    public function addResultSubTheme(\Terra\NovaBundle\Entity\ResultSubTheme $resultSubTheme)
    {
        $this->resultSubTheme[] = $resultSubTheme;

        return $this;
    }

    /**
     * Remove resultSubTheme
     *
     * @param \Terra\NovaBundle\Entity\ResultSubTheme $resultSubTheme
     */
    public function removeResultSubTheme(\Terra\NovaBundle\Entity\ResultSubTheme $resultSubTheme)
    {
        $this->resultSubTheme->removeElement($resultSubTheme);
    }

    /**
     * Get resultSubTheme
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResultSubTheme()
    {
        return $this->resultSubTheme;
    }

    /**
     * Add resultStudent
     *
     * @param \Terra\NovaBundle\Entity\ResultStudent $resultStudent
     * @return Student
     */
    public function addResultStudent(\Terra\NovaBundle\Entity\ResultStudent $resultStudent)
    {
        $this->resultStudent[] = $resultStudent;

        return $this;
    }

    /**
     * Remove resultStudent
     *
     * @param \Terra\NovaBundle\Entity\ResultStudent $resultStudent
     */
    public function removeResultStudent(\Terra\NovaBundle\Entity\ResultStudent $resultStudent)
    {
        $this->resultStudent->removeElement($resultStudent);
    }

    /**
     * Get resultStudent
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResultStudent()
    {
        return $this->resultStudent;
    }

    /**
     * Set remarks
     *
     * @param string $remarks
     * @return Student
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * Get remarks
     *
     * @return string 
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * Set badges
     *
     * @param array $badges
     * @return Student
     */
    public function setBadges($badges)
    {
        $this->badges = $badges;
        return $this;
    }

    /**
     * Get badges
     *
     * @return array 
     */
    public function getBadges()
    {
        return $this->badges;
    }
}
