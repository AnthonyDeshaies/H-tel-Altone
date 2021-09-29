<?php

namespace App\Controller;

use App\Entity\Discoveries;
use App\Form\DiscoveriesType;
use App\Repository\DiscoveriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/discoveries")
 */
class DiscoveriesController extends AbstractController
{
    /**
     * @Route("/", name="discoveries_index", methods={"GET"})
     */
    public function index(DiscoveriesRepository $discoveriesRepository): Response
    {
        return $this->render('discoveries/index.html.twig', [
            'discoveries' => $discoveriesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="discoveries_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $discovery = new Discoveries();
        $form = $this->createForm(DiscoveriesType::class, $discovery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($discovery);
            $entityManager->flush();

            return $this->redirectToRoute('discoveries_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('discoveries/new.html.twig', [
            'discovery' => $discovery,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="discoveries_show", methods={"GET"})
     */
    public function show(Discoveries $discovery): Response
    {
        return $this->render('discoveries/show.html.twig', [
            'discovery' => $discovery,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="discoveries_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Discoveries $discovery): Response
    {
        $form = $this->createForm(DiscoveriesType::class, $discovery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('discoveries_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('discoveries/edit.html.twig', [
            'discovery' => $discovery,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="discoveries_delete", methods={"POST"})
     */
    public function delete(Request $request, Discoveries $discovery): Response
    {
        if ($this->isCsrfTokenValid('delete'.$discovery->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($discovery);
            $entityManager->flush();
        }

        return $this->redirectToRoute('discoveries_index', [], Response::HTTP_SEE_OTHER);
    }
}
