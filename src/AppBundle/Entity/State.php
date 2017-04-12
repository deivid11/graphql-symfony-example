<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * State
 *
 * @ORM\Table(name="state")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StateRepository")
 */
class State
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;


	/**
	 * @var string
	 * @ORM\Column(name="code", type="string", length=10, nullable=true)
	 */
	private $code;

	/**
	 * @var boolean
	 * @ORM\Column(name="isActive", type="boolean")
	 */
	private $isActive;

	/**
	 * @var Country
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Country", inversedBy="states")
	 */
	private $country;

	/**
	 * @var ArrayCollection
	 * @ORM\OneToMany(targetEntity="AppBundle\Entity\Municipality", mappedBy="state")
	 */
	private $municipalities;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->municipalities = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return State
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
     * Set code
     *
     * @param string $code
     *
     * @return State
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return State
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
     * Set country
     *
     * @param \AppBundle\Entity\Country $country
     *
     * @return State
     */
    public function setCountry(\AppBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \AppBundle\Entity\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Add municipality
     *
     * @param \AppBundle\Entity\Municipality $municipality
     *
     * @return State
     */
    public function addMunicipality(\AppBundle\Entity\Municipality $municipality)
    {
        $this->municipalities[] = $municipality;

        return $this;
    }

    /**
     * Remove municipality
     *
     * @param \AppBundle\Entity\Municipality $municipality
     */
    public function removeMunicipality(\AppBundle\Entity\Municipality $municipality)
    {
        $this->municipalities->removeElement($municipality);
    }

    /**
     * Get municipalities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMunicipalities()
    {
        return $this->municipalities;
    }
}
