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

    public function addUser(EntityManagerInterface $entityManager, Request $request) : Request
    {
//        $name = $request->query->get('name');
        return $request;
//        $user = new User();
//        $user->setName($name);
//        $entityManager->persist($user);
//        $entityManager->flush();
//
//        return new JsonResponse([
//            "id" => $user->getId(),
//        ]);
    }

    // get all categories stub
    public function getCategories() : JsonResponse
    {
        return new JsonResponse([
            "0" => "Авто",
            "1" => "Хозяйственые товары",
            "2" => "Продукты",
            "3" => "Здоровье",
            "4" => "Спорт",
            "5" => "Наркотики",
        ]);
    }
}