<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NothingSpecialController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(): Response
    {
        return $this->render('nothing_special/index.html.twig', [
            'controller_name' => 'NothingSpecialController',
        ]);
    }

    #[Route('/loggedout', name: 'nothing_special_loggedout')]
    public function loggedout(): Response
    {
        return $this->render('nothing_special/index.html.twig', [
            'controller_name' => 'NothingSpecialController',
        ]);
    }
}
