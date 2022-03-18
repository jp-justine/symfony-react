<?php
    
namespace App\Controller;
    
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UsersRepository;
    
class DefaultController extends AbstractController
{
        /**
     * @Route("/{reactRouting}", name="home", defaults={"reactRouting": null})
     */
    public function index()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/api/users", name="users")
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function showUsers( UsersRepository $usersRepository)
    {
        $users = $usersRepository
            ->findAll();
            
            $response = new Response();

            $response->headers->set('Content-Type', 'application/json');
            $response->headers->set('Access-Control-Allow-Origin', '*');
    
            $response->setContent(json_encode($users));
            
            return $response;
    }
    
}