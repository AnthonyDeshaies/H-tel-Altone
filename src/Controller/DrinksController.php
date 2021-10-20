<?php

namespace App\Controller;

use App\Entity\Drinks;
use App\Form\DrinksType;
use App\Repository\DrinksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/drinks")
 */
class DrinksController extends AbstractController
{
    /**
     * @Route("/", name="drinks_index", methods={"GET"})
     */
    public function index(DrinksRepository $drinksRepository): Response
    {
        return $this->render('drinks/index.html.twig', [
            'drinks' => $drinksRepository->findAll(),
        ]);
    }

     /**
     * @Route("/admin", name="drinks_admin", methods={"GET"})
     */
    public function admin(DrinksRepository $drinksRepository): Response
    {
        return $this->render('drinks/admin.html.twig', [
            'drinks' => $drinksRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="drinks_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $drink = new Drinks();
        $form = $this->createForm(DrinksType::class, $drink);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($drink);
            $entityManager->flush();

            return $this->redirectToRoute('drinks_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('drinks/new.html.twig', [
            'drink' => $drink,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="drinks_show", methods={"GET"})
     */
    public function show(Drinks $drink): Response
    {
        return $this->render('drinks/show.html.twig', [
            'drink' => $drink,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="drinks_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Drinks $drink): Response
    {
        $form = $this->createForm(DrinksType::class, $drink);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('drinks_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('drinks/edit.html.twig', [
            'drink' => $drink,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="drinks_delete", methods={"POST"})
     */
    public function delete(Request $request, Drinks $drink): Response
    {
        if ($this->isCsrfTokenValid('delete'.$drink->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($drink);
            $entityManager->flush();
        }

        return $this->redirectToRoute('drinks_index', [], Response::HTTP_SEE_OTHER);
    }
}
