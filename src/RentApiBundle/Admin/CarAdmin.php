<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 13.05.2017
 * Time: 15:38
 */

namespace RentApiBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class CarAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('parking')
            ->add('brand')
            ->add('model')
            ->add('version')
            ->add('registrationNumber')
            ->add('fuelType', 'choice', array(
                'choices' => array(
                    'Diesel' => 'Diesel',
                    'Petrol' => 'Petrol',
                    'Hybrid' => 'Hybrid',
                    'Electric' => 'Electric'
            )))
            ->add('transmissionType', 'choice', array(
                'choices' => array(
                    'Automatic' => 'Automatic',
                    'Manual' => 'Manual'
                )
            ))
            ->add('pictureUrl')
            ->add('seats')
            ->add('category', 'choice', array(
                    'choices' => array(
                    'urban' => 'urban',
                    'compact' => 'compact',
                    'monospace' => 'monospace',
                    'utilities' => 'utilities'
                )
            ))
            ->add('color')
            ->add('doorsNumber')
            ->add('accessories')
            ->add('pricePerKm')
            ->add('freeKmPerDay')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('parking')
            ->add('brand')
            ->add('model')
            ->add('registrationNumber')
            ->add('fuelType')
            ->add('transmissionType')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('brand')
            ->add('model')
            ->add('parking')
            ->add('registrationNumber')
            ->add('fuelType')
            ->add('transmissionType')
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('parking')
            ->add('brand')
            ->add('model')
            ->add('version')
            ->add('registrationNumber')
            ->add('fuelType')
            ->add('transmissionType')
            ->add('pictureUrl')
            ->add('seats')
            ->add('category')
            ->add('color')
            ->add('doorsNumber')
            ->add('accessories')
            ->add('pricePerKm')
            ->add('freeKmPerDay')
        ;
    }
}
