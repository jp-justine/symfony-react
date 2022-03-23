<?php

namespace App\Controller;

use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;


     /**
     *  @Route("/api", name = "api")
     */
class UsersController extends AbstractController
{

#[Route('/users', name: 'index', methods: 'GET')]
    public function getUsers(UsersRepository $usersRepository, SerializerInterface $serializer)
    {
        $users = $usersRepository->findAll();
        $jsonContent = $serializer->serialize($users, 'json');
        $response = new Response();

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent(json_encode($jsonContent));

        return $response;
    }

    #[Route('/delete_user/{id}', name: 'delete')]
    public function deleteUser( Users $user, EntityManagerInterface $em): Response
    {
        
        $em->remove($user);
        $em->flush();

        $this->addFlash('success', 'User was deleted !');

        $response = new Response();

        return $response;
    }

}
