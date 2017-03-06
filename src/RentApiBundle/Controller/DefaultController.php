<?php

namespace RentApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RentApiBundle:Default:index.html.twig');
    }
}
