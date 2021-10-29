<?php

namespace App\Controller\Admin;

use App\Entity\Organization;
use App\Form\OrganizationType;
use App\Repository\OrganizationRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/organization")
 */
class OrganizationController extends AbstractController
{
    /**
     * @Route("/", name="organization_index", methods={"GET"})
     * @param OrganizationRepository $organizationRepository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function index(OrganizationRepository $organizationRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $organizations_query = $organizationRepository->findAllOrganizations();
        $organizations = $paginator->paginate(
        // Consulta Doctrine, no resultados
            $organizations_query,
            // Definir el parámetro de la página
            $request->query->getInt('page', 1),
            // Items per page
            15
        );
        return $this->render('organization/list.html.twig', [
            'organizations' => $organizations,
        ]);
    }

    /**
     * @Route("/new", name="organization_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $organization = new Organization();
        $form = $this->createForm(OrganizationType::class, $organization);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($organization);
            $entityManager->flush();

            return $this->redirectToRoute('organization_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('organization/new.html.twig', [
            'organization' => $organization,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="organization_show", methods={"GET"})
     */
    public function show(Organization $organization): Response
    {
        return $this->render('organization/show.html.twig', [
            'organization' => $organization,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="organization_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Organization $organization): Response
    {
        $form = $this->createForm(OrganizationType::class, $organization);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('organization_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('organization/edit.html.twig', [
            'organization' => $organization,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="organization_delete", methods={"POST"})
     */
    public function delete(Request $request, Organization $organization): Response
    {
        if ($this->isCsrfTokenValid('delete'.$organization->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($organization);
            $entityManager->flush();
        }

        return $this->redirectToRoute('organization_index', [], Response::HTTP_SEE_OTHER);
    }
}
