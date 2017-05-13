<?php

namespace RentApiBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;


class ParkingAdmin extends AbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('site')
            ->add('name')
            ->add('latitude')
            ->add('longitude')
            ->add('streetNumber')
            ->add('streetName')
            ->add('city')
            ->add('postalCode')
            ->add('country')
            ->add('formattedAddress')
            ->add('electricCharging')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('city')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('site')
            ->add('city')
            ->add('country')
            ->add('formattedAddress')
            ->add('electricCharging')
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('site')
            ->add('name')
            ->add('latitude')
            ->add('longitude')
            ->add('streetNumber')
            ->add('streetName')
            ->add('city')
            ->add('postalCode')
            ->add('country')
            ->add('formattedAddress')
            ->add('electricCharging')
        ;
    }
}
