<?php

namespace App\Controller;

use App\Entity\EnlaceCorto;
use App\Form\EnlaceCortoType;
use App\Repository\EnlaceCortoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/')]
class EnlaceCortoController extends AbstractController
{
    #[Route(path: '/enlaces', name: 'enlace_corto_index', methods: ['GET'])]
    public function index(EnlaceCortoRepository $enlaceCortoRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $search = null;
        if ($request->query->get('search')) {
            $search = $request->query->get('search');
        }

        $enlaces_cortos_query = $enlaceCortoRepository->findAllEnlaces($search);

        $enlaces_cortos = $paginator->paginate(
            // Consulta Doctrine, no resultados
            $enlaces_cortos_query,
            // Definir el parámetro de la página
            $request->query->getInt('page', 1),
            // Items per page
            15
        );

        return $this->render('enlace_corto/index.html.twig', [
            'enlace_cortos' => $enlaces_cortos,
        ]);
    }

    #[Route(path: '/enlaces/new', name: 'enlace_corto_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $enlaceCorto = new EnlaceCorto();
        $form = $this->createForm(EnlaceCortoType::class, $enlaceCorto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($enlaceCorto);
            $entityManager->flush();

            return $this->redirectToRoute('enlace_corto_index');
        }

        return $this->render('enlace_corto/new.html.twig', [
            'enlace_corto' => $enlaceCorto,
            'form' => $form,
        ]);
    }

    #[Route(path: '/ingreso', name: 'page_login', methods: ['GET'])]
    public function loginPage(): RedirectResponse
    {
        return $this->redirectToRoute(
            'security_login'
        );
    }

    #[Route(path: '/{enlace}', name: 'enlace_corto_pagina', methods: ['GET'])]
    public function irEnlace(EnlaceCorto $enlaceCorto): RedirectResponse
    {
        return $this->redirect(
            $enlaceCorto->getLinkRoute()
        );
    }

    #[Route(path: '/enlaces/{id}', name: 'enlace_corto_show', methods: ['GET'])]
    public function show(EnlaceCorto $enlaceCorto): Response
    {
        return $this->render('enlace_corto/show.html.twig', [
            'enlace_corto' => $enlaceCorto,
        ]);
    }

    #[Route(path: '/enlaces/{id}/redirigir', name: 'enlace_corto_redirect', methods: ['GET'])]
    public function redirigir(EnlaceCorto $enlaceCorto): Response
    {
        return $this->redirect(
            $enlaceCorto->getLinkRoute()
        );
    }

    #[Route(path: '/enlaces/{id}/edit', name: 'enlace_corto_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EnlaceCorto $enlaceCorto, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EnlaceCortoType::class, $enlaceCorto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('enlace_corto_index');
        }

        return $this->render('enlace_corto/edit.html.twig', [
            'enlace_corto' => $enlaceCorto,
            'form' => $form,
        ]);
    }

    #[Route(path: '/enlaces/{id}', name: 'enlace_corto_delete', methods: ['DELETE'])]
    public function delete(Request $request, EnlaceCorto $enlaceCorto, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$enlaceCorto->getId(), $request->request->get('_token'))) {
            $entityManager->remove($enlaceCorto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('enlace_corto_index');
    }
}
