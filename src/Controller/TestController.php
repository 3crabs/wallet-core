<?php


namespace App\Controller;


use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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

    // get all categories stub
    public function getCategories(Request $request) : Response
    {
        $allowHeader = $request->headers->get('Origin');
        $obj = [
            "0" => [
                "id" => "12",
                "name" => "Авто",
            ],
            "1" => [
                "id" => "24",
                "name" => "Хозяйственые товары",
            ],
            "2" => [
                "id" => "36",
                "name" => "Продукты",
            ],
            "3" => [
                "id" => "56",
                "name" => "Здоровье",
                "childrens" => [
                    "0" => [
                        "id" => "136",
                        "name" => "Лекарства",
                    ],
                    "1" => [
                        "id" => "236",
                        "name" => "Санаторий",
                    ],
                ]
            ],
            "4" => [
                "id" => "66",
                "name" => "Спорт",
            ],
            "5" => [
                "id" => "3423",
                "name" => "Наркотики",
            ],
        ];
        $resp = new Response(json_encode ($obj,JSON_UNESCAPED_UNICODE));
        $resp->headers->set('Content-Type', 'application/json');
        $resp->headers->set('Access-Control-Allow-Origin', $allowHeader);
        return $resp;
    }
}