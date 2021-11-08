<?php

namespace App\Controller;

use App\Entity\CategoryDrinks;
use App\Form\CategoryDrinksType;
use App\Repository\CategoryDrinksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/category/drinks")
 */
class CategoryDrinksController extends AbstractController
{
    /**
     * @Route("/admin", name="category_drinks_admin", methods={"GET"})
     */
    public function admin(CategoryDrinksRepository $categoryDrinksRepository): Response
    {
        return $this->render('category_drinks/admin.html.twig', [
            'category_drinks' => $categoryDrinksRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="category_drinks_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $categoryDrink = new CategoryDrinks();
        $form = $this->createForm(CategoryDrinksType::class, $categoryDrink);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categoryDrink);
            $entityManager->flush();

            return $this->redirectToRoute('category_drinks_admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('category_drinks/new.html.twig', [
            'category_drink' => $categoryDrink,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="category_drinks_show", methods={"GET"})
     */
    public function show(CategoryDrinks $categoryDrink): Response
    {
        return $this->render('category_drinks/show.html.twig', [
            'category_drink' => $categoryDrink,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="category_drinks_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CategoryDrinks $categoryDrink): Response
    {
        $form = $this->createForm(CategoryDrinksType::class, $categoryDrink);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('category_drinks_admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('category_drinks/edit.html.twig', [
            'category_drink' => $categoryDrink,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="category_drinks_delete", methods={"POST"})
     */
    public function delete(Request $request, CategoryDrinks $categoryDrink): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categoryDrink->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categoryDrink);
            $entityManager->flush();
        }

        return $this->redirectToRoute('category_drinks_admin', [], Response::HTTP_SEE_OTHER);
    }
}
