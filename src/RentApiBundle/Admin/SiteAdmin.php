<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 13.05.2017
 * Time: 14:59
 */

namespace RentApiBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class SiteAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('streetNumber')
            ->add('streetName')
            ->add('city')
            ->add('postalCode')
            ->add('country')
            ->add('formattedAddress')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('city')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('city')
            ->add('country')
            ->add('formattedAddress')
        ;
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('streetNumber')
            ->add('streetName')
            ->add('city')
            ->add('postalCode')
            ->add('country')
            ->add('formattedAddress')
        ;
    }
}
