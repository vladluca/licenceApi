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

    public function postCarsAction(Request $request)
    {
        $parameter = $request->request->get('parameter');
        return new JsonResponse(array('data' => 'post'), 200);
    }
}
