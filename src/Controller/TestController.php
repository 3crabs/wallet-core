<?php


namespace App\Controller;


use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TestController
{
    public function getTestData() : JsonResponse
    {
        return new JsonResponse([
            'author' => 'debik',
            'version' => '0.-1.-2',
        ]);
    }

    public function getUsers(UserRepository $userRepository) : Response
    {
        $users = $userRepository->getAllUser();
        $serObj = [
            "users" => [],
        ];
        foreach ($users as $value) {
            $serObj["users"][] = $value["name"];
        }
        $resp = new Response(json_encode ($serObj,JSON_UNESCAPED_UNICODE));
        $resp->headers->set('Content-Type', 'application/json');
        return $resp;
    }
}