<?php

namespace RentApiBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 12.05.2017
 * Time: 12:03
 */
class CarsRepository extends EntityRepository
{
    private static $DEFAULT_CATEGORIES = array(
        'urban',
        'compact',
        'monospace',
        'utilities'
    );

    private static $DEFAULT_FUEL_TYPES = array(
        'Petrol',
        'Diesel',
        'Hybrid',
        'Electric'
    );

    private static $DEFAULT_TRANSMISSION_TYPES = array(
        'Automatic',
        'Manual'
    );

    const DEFAULT_DOORS_NUMBER = 0;
    const DEFAULT_PASSENGERS_NUMBER = 0;

    public function searchCars($categories, $fuelTypes, $transmissionTypes, $doorsNumber, $passengers) {

        $queryBuilder = $this->createQueryBuilder('car');

        $queryBuilder
            ->where('car.category IN (:categories)')
            ->andWhere('car.fuelType IN (:fuelTypes)')
            ->andWhere('car.transmissionType IN (:transmissionTypes)')
            ->andWhere('car.doorsNumber >= :doorsNumber')
            ->andWhere('car.seats >= :passengers')
            ->setParameter('categories', $categories ? $categories : self::$DEFAULT_CATEGORIES)
            ->setParameter('fuelTypes', $fuelTypes ? $fuelTypes : self::$DEFAULT_FUEL_TYPES)
            ->setParameter('transmissionTypes', $transmissionTypes ? $transmissionTypes : self::$DEFAULT_TRANSMISSION_TYPES)
            ->setParameter('doorsNumber', $doorsNumber ? $doorsNumber : self::DEFAULT_DOORS_NUMBER)
            ->setParameter('passengers', $passengers ? $passengers : self::DEFAULT_PASSENGERS_NUMBER);

        return $queryBuilder->getQuery()->getResult();
    }
}
