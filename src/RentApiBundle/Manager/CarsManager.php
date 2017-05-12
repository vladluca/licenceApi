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

    public function searchCars($request)
    {
        $categories = $request->request->get('categories');
        $doorsNumber = $request->request->get('doorsNumber');
        $passengers = $request->request->get('passengers');
        $start = $request->request->get('start');
        $end = $request->request->get('end');
        $fuelTypes = $request->request->get('fuelTypes');
        $transmissionTypes = $request->request->get('transmissionTypes');

        $cars = $this->em->getRepository(Car::class)->searchCars($categories, $fuelTypes, $transmissionTypes, $doorsNumber, $passengers);

        $result = array();

        foreach ($cars as $car) {
            $result['data']['results'][] = array(
                'type' => $car->getServiceType(),
                'start' => array(
                    'date' => '2017-04-15T09:30+01:00',
                    'coordinates' => array(
                        'latitude' => floatval($car->getParking()->getLatitude()),
                        'longitude' => floatval($car->getParking()->getLongitude())
                    ),
                    'address' => array(
                        'streetNumber' => $car->getParking()->getStreetNumber(),
                        'streetName' => $car->getParking()->getStreetName(),
                        'city' => $car->getParking()->getCity(),
                        'postalCode' => $car->getParking()->getPostalCode(),
                        'country' => $car->getParking()->getCountry(),
                        'formattedAddress' => $car->getParking()->getFormattedAddress(),
                    ),
                    'parking' => array(
                        'id' => $car->getParking()->getId(),
                        'name' => $car->getParking()->getName(),
                        'coordinates' => array(
                            'latitude' => floatval($car->getParking()->getLatitude()),
                            'longitude' => floatval($car->getParking()->getLongitude())
                        ),
                        'site' => array(
                            'id' => $car->getParking()->getSite()->getId(),
                            'name' => $car->getParking()->getSite()->getName(),
                            'address' => array(
                                'streetNumber' => $car->getParking()->getSite()->getStreetNumber(),
                                'streetName' => $car->getParking()->getSite()->getStreetName(),
                                'city' => $car->getParking()->getSite()->getCity(),
                                'postalCode' => $car->getParking()->getSite()->getPostalCode(),
                                'country' => $car->getParking()->getSite()->getCountry(),
                                'formattedAddress' => $car->getParking()->getSite()->getFormattedAddress(),
                            ),
                        ),
                        'electricCharging' => $car->getParking()->getElectricCharging()
                    )
                ),
                'end' => array(
                    'date' => '2017-04-17T09:30+01:00',
                    'coordinates' => array(
                        'latitude' => floatval($car->getParking()->getLatitude()),
                        'longitude' => floatval($car->getParking()->getLongitude())
                    ),
                    'address' => array(
                        'streetNumber' => $car->getParking()->getStreetNumber(),
                        'streetName' => $car->getParking()->getStreetName(),
                        'city' => $car->getParking()->getCity(),
                        'postalCode' => $car->getParking()->getPostalCode(),
                        'country' => $car->getParking()->getCountry(),
                        'formattedAddress' => $car->getParking()->getFormattedAddress(),
                    ),
                    'parking' => array(
                        'id' => $car->getParking()->getId(),
                        'name' => $car->getParking()->getName(),
                        'coordinates' => array(
                            'latitude' => floatval($car->getParking()->getLatitude()),
                            'longitude' => floatval($car->getParking()->getLongitude())
                        ),
                        'site' => array(
                            'id' => $car->getParking()->getSite()->getId(),
                            'name' => $car->getParking()->getSite()->getName(),
                            'address' => array(
                                'streetNumber' => $car->getParking()->getSite()->getStreetNumber(),
                                'streetName' => $car->getParking()->getSite()->getStreetName(),
                                'city' => $car->getParking()->getSite()->getCity(),
                                'postalCode' => $car->getParking()->getSite()->getPostalCode(),
                                'country' => $car->getParking()->getSite()->getCountry(),
                                'formattedAddress' => $car->getParking()->getSite()->getFormattedAddress(),
                            ),
                        ),
                        'electricCharging' => $car->getParking()->getElectricCharging()
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
                    'colorDetails' => array(
                        'id' => $car->getColorId(),
                        'code' => $car->getColorCode()
                    ),
                    'accessories' => $this->formatAccessorise($car->getAccessories()),
                    'type' => $car->getType(),
                    'statusType' => $car->getStatusType(),
                    'doorsNumber' => $car->getDoorsNumber(),
                    'parking' => array(
                        'id' => $car->getParking()->getId(),
                        'name' => $car->getParking()->getName(),
                        'coordinates' => array(
                            'latitude' => floatval($car->getParking()->getLatitude()),
                            'longitude' => floatval($car->getParking()->getLongitude())
                        ),
                        'site' => array(
                            'id' => $car->getParking()->getSite()->getId(),
                            'name' => $car->getParking()->getSite()->getName(),
                            'address' => array(
                                'streetNumber' => $car->getParking()->getSite()->getStreetNumber(),
                                'streetName' => $car->getParking()->getSite()->getStreetName(),
                                'city' => $car->getParking()->getSite()->getCity(),
                                'postalCode' => $car->getParking()->getSite()->getPostalCode(),
                                'country' => $car->getParking()->getSite()->getCountry(),
                                'formattedAddress' => $car->getParking()->getSite()->getFormattedAddress(),
                            ),
                        ),
                        'electricCharging' => $car->getParking()->getElectricCharging()
                    ),
                ),
                'reservedSeats' => '1',
                'carSharingInfo' => array(
                    'usageType' => $car->getUsageType(),
                    'cost' => array(
                        'pricePerKm' => $car->getPricePerKm(),
                        'estimatedPriceForDuration' => '142',
                        'freeKmPerDay' => $car->getFreeKmPerDay()
                    )
                )
            );

            $result['data']['metadata']['facets']['startParkings'] = array();
            foreach ($cars as $car) {
                $parking = array(
                    'id' => $car->getParking()->getId(),
                    'name' => $car->getParking()->getName(),
                    'coordinates' => array(
                        'latitude' => floatval($car->getParking()->getLatitude()),
                        'longitude' => floatval($car->getParking()->getLongitude())
                    ),
                    'site' => array(
                        'id' => $car->getParking()->getSite()->getId(),
                        'name' => $car->getParking()->getSite()->getName(),
                        'address' => array(
                            'streetNumber' => $car->getParking()->getSite()->getStreetNumber(),
                            'streetName' => $car->getParking()->getSite()->getStreetName(),
                            'city' => $car->getParking()->getSite()->getCity(),
                            'postalCode' => $car->getParking()->getSite()->getPostalCode(),
                            'country' => $car->getParking()->getSite()->getCountry(),
                            'formattedAddress' => $car->getParking()->getSite()->getFormattedAddress(),
                        ),
                    ),
                    'electricCharging' => $car->getParking()->getElectricCharging()
                );
                if (!in_array($parking, $result['data']['metadata']['facets']['startParkings'])) {
                    $result['data']['metadata']['facets']['startParkings'][] = $parking;
                }
            }
        }

        return $result;
    }

    private function formatAccessorise($accessorise) {
        return explode(';', $accessorise);
    }
}
