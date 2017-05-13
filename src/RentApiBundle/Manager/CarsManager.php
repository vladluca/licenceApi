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
    const EARTH_RADIUS = 6371;
    const SEARCH_LOCATION_RADIUS = 50;
    const ESTIMATED_KM_PER_HOUR = 50;
    const ESTIMATED_PAUSE_HOURS = 16;

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
        $fuelTypes = $request->request->get('fuelTypes');
        $transmissionTypes = $request->request->get('transmissionTypes');
        $start = $request->request->get('start');
        $end = $request->request->get('end');

        $cars = $this->em->getRepository(Car::class)->searchCars($categories, $fuelTypes, $transmissionTypes, $doorsNumber, $passengers);
        $cars = $this->filterCarsByLocation($cars, $start);

        $result = array();
        $result['data']['results'] = array();
        $result['data']['metadata']['facets']['startParkings'] = array();

        foreach ($cars as $car) {
            $result['data']['results'][] = array(
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
                    'seats' => $car->getSeats(),
                    'category' => $car->getCategory(),
                    'color' => $car->getColor(),
                    'accessories' => $this->formatAccessorise($car->getAccessories()),
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
                'carSharingInfo' => array(
                    'cost' => array(
                        'pricePerKm' => $car->getPricePerKm(),
                        'estimatedPriceForDuration' => $this->calculatePriceForDuration($start, $end, $car->getPricePerKm()),
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

    private function calculatePriceForDuration($start, $end, $carPricePerKm) {
        $startDate = new \DateTime($start['date']);
        $endDate = new \DateTime($end['date']);

        $daysDiff = $startDate->diff($endDate)->days;
        $hoursDiff = $startDate->diff($endDate)->h;
        $hoursDiff = $daysDiff * 24 + $hoursDiff;

        $hoursDiff = $hoursDiff - ($daysDiff * self::ESTIMATED_PAUSE_HOURS);

        $estimatedPriceForDuration = $hoursDiff * self::ESTIMATED_KM_PER_HOUR * floatval($carPricePerKm);

        return $estimatedPriceForDuration;

    }

    private function filterCarsByLocation($cars, $start) {
        $cars = array_filter($cars, function($car) use ($start) {
            return $this->isPointInCircle(
                $start['address']['coordinates']['latitude'],
                $start['address']['coordinates']['longitude'],
                $car->getParking()->getLatitude(),
                $car->getParking()->getLongitude()
            );
        });

        return $cars;
    }

    private function calculateDistanceBetweenPoints($centerX, $centerY, $locationX, $locationY) {
        $centerX = deg2rad($centerX);
        $centerY = deg2rad($centerY);
        $locationX = deg2rad($locationX);
        $locationY = deg2rad($locationY);

        return acos(sin($centerX) * sin($locationX) + cos($centerX) * cos($locationX) * cos($centerY - $locationY)) * self::EARTH_RADIUS;
    }

    private function isPointInCircle($centerX, $centerY, $locationX, $locationY) {
        return $this->calculateDistanceBetweenPoints($centerX, $centerY, floatval($locationX), floatval($locationY)) <= self::SEARCH_LOCATION_RADIUS;
    }

    private function formatAccessorise($accessorise) {
        return explode(';', $accessorise);
    }
}
