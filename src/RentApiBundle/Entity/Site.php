<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 27.03.2017
 * Time: 16:14
 */

namespace RentApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Site
 * @ORM\Table(name="sites")
 * @ORM\Entity
 */
class Site
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Parking", mappedBy="site")
     */
    protected $parkings;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $streetNumber;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $streetName;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $postalCode;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $country;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $formattedAddress;

    /**
     * Site constructor.
     */
    public function __construct() {
        $this->parkings = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return ArrayCollection
     */
    public function getParkings()
    {
        return $this->parkings;
    }

    /**
     * @param Parking $parking
     * @return $this
     */
    public function addParking(Parking $parking)
    {
        if (!$this->parkings->contains($parking)) {
            $this->parkings->add($parking);
            $parking->setSite($this);
        }
        return $this;
    }

    /**
     * @param Parking $parking
     * @return $this
     */
    public function removeParking(Parking $parking)
    {
        if ($this->parkings->contains($parking)) {
            $this->parkings->removeElement($parking);
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @param $streetNumber
     * @return $this
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * @param $streetName
     * @return $this
     */
    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param $postalCode
     * @return $this
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param $country
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getFormattedAddress()
    {
        return $this->formattedAddress;
    }

    /**
     * @param $formattedAddress
     * @return $this
     */
    public function setFormattedAddress($formattedAddress)
    {
        $this->formattedAddress = $formattedAddress;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
