<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 06.03.2017
 * Time: 16:41
 */

namespace RentApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Car
 * @ORM\Table(name="cars")
 * @ORM\Entity(repositoryClass="RentApiBundle\Repository\CarsRepository")
 */
class Car
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\ManyToOne(targetEntity="Parking", inversedBy="cars")
     * @ORM\JoinColumn(name="parking_id", referencedColumnName="id")
     */
    protected $parking;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $brand;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $model;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $version;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $serviceType;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $registrationNumber;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $fuelType;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $transmissionType;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $pictureUrl;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $serviceLevel;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $seats;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $category;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $color;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $colorId;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $colorCode;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $type;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $statusType;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $doorsNumber;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $accessories;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $usageType;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $pricePerKm;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $freeKmPerDay;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsageType()
    {
        return $this->usageType;
    }

    /**
     * @param $usageType
     * @return $this
     */
    public function setUsageType($usageType)
    {
        $this->usageType = $usageType;

        return $this;
    }

    /**
     * @return string
     */
    public function getPricePerKm()
    {
        return $this->pricePerKm;
    }

    /**
     * @param $pricePerKm
     * @return $this
     */
    public function setPricePerKm($pricePerKm)
    {
        $this->pricePerKm = $pricePerKm;

        return $this;
    }

    /**
     * @return string
     */
    public function getFreeKmPerDay()
    {
        return $this->freeKmPerDay;
    }

    /**
     * @param $freeKmPerDay
     * @return $this
     */
    public function setFreeKmPerDay($freeKmPerDay)
    {
        $this->freeKmPerDay = $freeKmPerDay;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccessories()
    {
        return $this->accessories;
    }

    /**
     * @param $accessories
     * @return $this
     */
    public function setAccessories($accessories)
    {
        $this->accessories = $accessories;

        return $this;
    }

    /**
     * @return string
     */
    public function getServiceType()
    {
        return $this->serviceType;
    }

    /**
     * @param $serviceType
     * @return $this
     */
    public function setServiceType($serviceType)
    {
        $this->serviceType = $serviceType;

        return $this;
    }

    /**
     * @return string
     */
    public function getColorId()
    {
        return $this->colorId;
    }

    /**
     * @param $colorId
     * @return $this
     */
    public function setColorId($colorId)
    {
        $this->colorId = $colorId;

        return $this;
    }

    /**
     * @return string
     */
    public function getColorCode()
    {
        return $this->colorCode;
    }

    /**
     * @param $colorCode
     * @return $this
     */
    public function setColorCode($colorCode)
    {
        $this->colorCode = $colorCode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getParking()
    {
        return $this->parking;
    }

    /**
     * @param $parking
     * @return $this
     */
    public function setParking($parking)
    {
        $this->parking = $parking;

        return $this;
    }

    /**
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getRegistrationNumber()
    {
        return $this->registrationNumber;
    }

    /**
     * @param string $registrationNumber
     */
    public function setRegistrationNumber($registrationNumber)
    {
        $this->registrationNumber = $registrationNumber;
    }

    /**
     * @return string
     */
    public function getFuelType()
    {
        return $this->fuelType;
    }

    /**
     * @param string $fuelType
     */
    public function setFuelType($fuelType)
    {
        $this->fuelType = $fuelType;
    }

    /**
     * @return string
     */
    public function getTransmissionType()
    {
        return $this->transmissionType;
    }

    /**
     * @param string $transmissionType
     */
    public function setTransmissionType($transmissionType)
    {
        $this->transmissionType = $transmissionType;
    }

    /**
     * @return string
     */
    public function getPictureUrl()
    {
        return $this->pictureUrl;
    }

    /**
     * @param string $pictureUrl
     */
    public function setPictureUrl($pictureUrl)
    {
        $this->pictureUrl = $pictureUrl;
    }

    /**
     * @return string
     */
    public function getServiceLevel()
    {
        return $this->serviceLevel;
    }

    /**
     * @param string $serviceLevel
     */
    public function setServiceLevel($serviceLevel)
    {
        $this->serviceLevel = $serviceLevel;
    }

    /**
     * @return string
     */
    public function getSeats()
    {
        return $this->seats;
    }

    /**
     * @param string $seats
     */
    public function setSeats($seats)
    {
        $this->seats = $seats;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getStatusType()
    {
        return $this->statusType;
    }

    /**
     * @param string $statusType
     */
    public function setStatusType($statusType)
    {
        $this->statusType = $statusType;
    }

    /**
     * @return string
     */
    public function getDoorsNumber()
    {
        return $this->doorsNumber;
    }

    /**
     * @param string $doorsNumber
     */
    public function setDoorsNumber($doorsNumber)
    {
        $this->doorsNumber = $doorsNumber;
    }
}
