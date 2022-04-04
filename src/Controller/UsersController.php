<?php

namespace App\Controller;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UsersController extends AbstractController
{
    #[Route('/api/users', name: 'index', methods: 'GET')]
    public function index(UsersRepository $usersRepository)
    {
        return $this->json($usersRepository->findAll(), 200,[], ['groups' => 'users:read']);
    }

    #[Route('/api/users/delete/{id}', name: 'delete', methods: ['DELETE'])]
    public function deleteUsers(
        Request $request,
        Users $users,
        EntityManagerInterface $entityManager,
        ): Response {

            $entityManager->remove($users);
            $entityManager->flush();
    
            $response = new Response();
            $response->setStatusCode(200);
    
            return $response;
        }

    #[Route('/users/{id}', name: 'show', methods: ['GET'])]
    public function showUsers(
        Users $users,
    ): Response {

        return $this->json($users, 200,[], ['groups' => 'users:read']);
    }
    // #[Route('/add', name: 'add', methods: ['POST'])]
    // public function add(Request $request, SerializerInterface $serializer, EntityManagerInterface $em, ValidatorInterface $validator): Response
    // {
    //     $jsonResponse = $request->getContent();

    //         $user = $serializer->deserialize($jsonResponse,
    //         Users::class, 'json');

    //         $errors = $validator->validate($user);

    //         if(count($errors) > 0) {
    //             return $this->json($errors, 400);
    //         }

    //         $em->persist($user);
    //         $em->flush();

    //         return $this->json($user, 201, [], ['groups' => 'users:read']);
     
    // }
}