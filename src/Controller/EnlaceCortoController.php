<?php

namespace App\Controller;

use App\Entity\EnlaceCorto;
use App\Form\EnlaceCortoType;
use App\Repository\EnlaceCortoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class EnlaceCortoController extends AbstractController
{
    /**
     * @Route("/enlaces", name="enlace_corto_index", methods={"GET"})
     * @param EnlaceCortoRepository $enlaceCortoRepository
     * @return Response
     */
    public function index(EnlaceCortoRepository $enlaceCortoRepository): Response
    {
        return $this->render('enlace_corto/index.html.twig', [
            'enlace_cortos' => $enlaceCortoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/enlaces/new", name="enlace_corto_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $enlaceCorto = new EnlaceCorto();
        $form = $this->createForm(EnlaceCortoType::class, $enlaceCorto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($enlaceCorto);
            $entityManager->flush();

            return $this->redirectToRoute('enlace_corto_index');
        }

        return $this->render('enlace_corto/new.html.twig', [
            'enlace_corto' => $enlaceCorto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/ingreso", name="page_login", methods={"GET"})
     * @return RedirectResponse
     */

    public function loginPage(): RedirectResponse
    {
        return $this->redirectToRoute(
            'security_login'
        );
    }

    /**
     * @Route("/{enlace}", name="enlace_corto_pagina", methods={"GET"})
     * @param EnlaceCorto $enlaceCorto
     * @return RedirectResponse
     */

    public function irEnlace(EnlaceCorto $enlaceCorto): RedirectResponse
    {
        return $this->redirect(
            $enlaceCorto->getLinkRoute()
        );
    }

    /**
     * @Route("/enlaces/{id}", name="enlace_corto_show", methods={"GET"})
     */
    public function show(EnlaceCorto $enlaceCorto): Response
    {
        return $this->render('enlace_corto/show.html.twig', [
            'enlace_corto' => $enlaceCorto,
        ]);
    }

    /**
     * @Route("/enlaces/{id}/redirigir", name="enlace_corto_redirect", methods={"GET"})
     */
    public function redirigir(EnlaceCorto $enlaceCorto): Response
    {
        return $this->redirect(
            $enlaceCorto->getLinkRoute()
        );
    }



    /**
     * @Route("/enlaces/{id}/edit", name="enlace_corto_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EnlaceCorto $enlaceCorto): Response
    {
        $form = $this->createForm(EnlaceCortoType::class, $enlaceCorto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('enlace_corto_index');
        }

        return $this->render('enlace_corto/edit.html.twig', [
            'enlace_corto' => $enlaceCorto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/enlaces/{id}", name="enlace_corto_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EnlaceCorto $enlaceCorto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$enlaceCorto->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($enlaceCorto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('enlace_corto_index');
    }
}
