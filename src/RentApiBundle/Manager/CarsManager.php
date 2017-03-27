<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 20.03.2017
 * Time: 16:06
 */

namespace RentApiBundle\Manager;

use Doctrine\ORM\EntityManager;
use RentApiBundle\Entity\Car;

/**
 * Class CarsManager
 * @package RentApiBundle\Manager
 */
class CarsManager
{
    /**
     * @var
     */
    private $em;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function searchCars()
    {
        $cars = $this->em->getRepository(Car::class)->findAll();

        $result = array();

        foreach ($cars as $car) {
            $result['data']['results'][] = array(
                'type' => 'CAR_SHARING',
                'start' => array(
                    'date' => new \DateTime(),
                    'coordinates' => array(
                        'latitude' => $car->getParking()->getLatitude(),
                        'longitude' => $car->getParking()->getLongitude()
                    ),
                    'address' => array(
                        'streetNumber' => $car->getParking()->getStreetNumber(),
                        'streetName' => $car->getParking()->getStreetName(),
                        'city' => $car->getParking()->getCity(),
                        'postalCode' => $car->getParking()->getPostalCode(),
                        'country' => $car->getParking()->getCountry(),
                        'formattedAddress' => $car->getParking()->getFormattedAddress(),
                    )
                ),
                'vehicle' => array(
                    'id' => $car->getId(),
                    'brand' => $car->getBrand(),
                    'model' => $car->getModel(),
                    'version' => $car->getVersion(),
                    'registrationNumber' => $car->getRegistrationNumber(),
                    'fuelType' => $car->getFuelType(),
                    'transmissionType' => $car->getTransmissionType(),
                    'pictureUrl' => $car->getPictureUrl(),
                    'serviceLevel' => $car->getServiceLevel(),
                    'seats' => $car->getSeats(),
                    'category' => $car->getCategory(),
                    'color' => $car->getColor(),
                    'type' => $car->getType(),
                    'statusType' => $car->getStatusType(),
                    'doorsNumber' => $car->getDoorsNumber()
                )
            );
        }

        return $result;
    }
}
