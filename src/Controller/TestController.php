<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;

class TestController
{
    public function getTestData() : JsonResponse
    {
        return new JsonResponse([
            'author' => 'debik',
            'version' => '0.-1.-2',
        ]);
    }
}