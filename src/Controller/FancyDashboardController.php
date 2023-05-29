<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
class FancyDashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_fancy_dashboard')]
    public function index(): Response
    {
        return $this->render('fancy_dashboard/index.html.twig', [
            'controller_name' => 'FancyDashboardController',
        ]);
    }
}
