<?php


namespace App\Controller;


use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use phpDocumentor\Reflection\Types\This;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use JMS\Serializer\SerializerBuilder;

class TestApiController extends AbstractFOSRestController
{
    /**
     * @Rest\Post("/user", name="addUser")
     * @param EntityManagerInterface $entityManager
     * @param Request $request
     * @return JsonResponse
     */
    public function userAddAction(EntityManagerInterface $entityManager, Request $request) : JsonResponse
    {
        $serializer = SerializerBuilder::create()->build();
        $requestBody = $request->request;

        $errors = [];
        if (!$requestBody->has('name')) {
            $errors[] = 'name is empty';
        }

        if (!$requestBody->has('password')) {
            $errors[] = 'password is empty';
        }

        if (empty($errors)) {
            $name = $requestBody->get('name');
            $password = $requestBody->get('password');
            $user = new User($name, $password);
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->json([
                'id' => $user->getId(),
            ]);
        } else {

            return $this->json([
                'errors' => $errors,
            ]);
        }

    }
}