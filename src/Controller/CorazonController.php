<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CorazonController extends AbstractController
{
    #[Route(path: '/cincuenta', name: 'app_corazon')]
    public function index(): Response
    {
        return $this->render('corazon/index.html.twig', [
            'controller_name' => 'CorazonController',
        ]);
    }
}
