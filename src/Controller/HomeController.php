<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
      /**
     * @Route("/politique_de_confidentialite", name="privatePolicy")
     */
    public function privatePolicy(): Response
    {
        return $this->render('home/privatePolicy.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
