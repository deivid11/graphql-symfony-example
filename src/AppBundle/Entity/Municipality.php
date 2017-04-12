<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Municipality
 *
 * @ORM\Table(name="municipality")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MunicipalityRepository")
 */
class Municipality
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

	/**
	 * @var string
	 * @ORM\Column(name="name", type="string", length=99, unique=false)
	 */
	private $name;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="id_sepomex", type="integer", nullable=true)
	 */
	private $idSepomex;

	/**
	 * @var boolean
	 * @ORM\Column(name="isActive", type="boolean")
	 */
	private $isActive;

	/**
	 * @var State
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\State", inversedBy="municipalities")
	 */
	private $state;


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
     *
     * @return Municipality
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
     * Set idSepomex
     *
     * @param integer $idSepomex
     *
     * @return Municipality
     */
    public function setIdSepomex($idSepomex)
    {
        $this->idSepomex = $idSepomex;

        return $this;
    }

    /**
     * Get idSepomex
     *
     * @return integer
     */
    public function getIdSepomex()
    {
        return $this->idSepomex;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Municipality
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set state
     *
     * @param \AppBundle\Entity\State $state
     *
     * @return Municipality
     */
    public function setState(\AppBundle\Entity\State $state = null)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return \AppBundle\Entity\State
     */
    public function getState()
    {
        return $this->state;
    }

}
