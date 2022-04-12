<?php

namespace App\Controller;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;


class UsersController extends AbstractController
{
    #[Route('/api/users', name: 'api_users_index', methods: 'GET')]
    public function index(UsersRepository $usersRepository)
    {
       return $this->json($usersRepository->findAll(), 200,[], ['groups' => 'read']);
    }

    #[Route('/api/users/delete/{id}', name: 'api_users_delete', methods: ['DELETE'])]
    public function deleteUser(Users $user, EntityManagerInterface $entityManager): Response 
    {

        $entityManager->remove($user);
        $entityManager->flush();

        $response = new Response();
        $response->setStatusCode(200);

        return $response;
    }

    #[Route('/api/user/{id}', name: 'users_show', methods: ['GET'])]
    public function showUser(Users $user): Response
    {
        return $this->json($user, 200,[], ['groups' => 'read']);

    }
    #[Route('/api/new', name: 'new', methods: ['POST'])]
    public function new(Request $request, SerializerInterface $serializer, EntityManagerInterface $em, ValidatorInterface $validator): Response
    {
        $jsonResponse = $request->getContent();

        try {
            $user = $serializer->deserialize($jsonResponse,
            Users::class, 'json');

            $errors = $validator->validate($user);

            if(count($errors) > 0) {
                return $this->json($errors, 400);
            }

            $em->persist($user);
            $em->flush();

            return $this->json($user, 201, [], ['groups' => 'read']);

        } catch (NotEncodableValueException $e) {
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage()
            ], 400);
        }
    }
}