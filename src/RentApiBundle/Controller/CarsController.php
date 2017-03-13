<?php

namespace RentApiBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CarsController
{
    public function getCarsAction()
    {
        return new JsonResponse(array('data' => 'get'), 200);
    }

    public function optionsCarsAction()
    {
        return new JsonResponse(array(), 200, array(
            'Access-Control-Allow-Headers' => 'DNT,Authorization,X-CustomHeader,Keep-Alive,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type,Accept,X-Auth-Token',
            'Access-Control-Allow-Methods' => 'GET, POST, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Origin' => '*',
        ));
    }

    public function postCarsAction(Request $request)
    {
        $parameter = $request->request->get('parameter');

        return new JsonResponse(array('data' => 'post'), 200, array(
            'Access-Control-Allow-Origin' => '*'
        ));
    }
}
