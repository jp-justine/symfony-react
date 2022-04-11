<?php

namespace App\Controller;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


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

}
