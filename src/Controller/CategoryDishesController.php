<?php

namespace App\Controller;

use App\Entity\CategoryDishes;
use App\Form\CategoryDishesType;
use App\Repository\CategoryDishesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/category/dishes")
 */
class CategoryDishesController extends AbstractController
{
    /**
     * @Route("/admin", name="category_dishes_admin", methods={"GET"})
     */
    public function admin(CategoryDishesRepository $categoryDishesRepository): Response
    {
        return $this->render('category_dishes/admin.html.twig', [
            'category_dishes' => $categoryDishesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="category_dishes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $categoryDish = new CategoryDishes();
        $form = $this->createForm(CategoryDishesType::class, $categoryDish);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categoryDish);
            $entityManager->flush();

            return $this->redirectToRoute('category_dishes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('category_dishes/new.html.twig', [
            'category_dish' => $categoryDish,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="category_dishes_show", methods={"GET"})
     */
    public function show(CategoryDishes $categoryDish): Response
    {
        return $this->render('category_dishes/show.html.twig', [
            'category_dish' => $categoryDish,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="category_dishes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CategoryDishes $categoryDish): Response
    {
        $form = $this->createForm(CategoryDishesType::class, $categoryDish);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('category_dishes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('category_dishes/edit.html.twig', [
            'category_dish' => $categoryDish,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="category_dishes_delete", methods={"POST"})
     */
    public function delete(Request $request, CategoryDishes $categoryDish): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categoryDish->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categoryDish);
            $entityManager->flush();
        }

        return $this->redirectToRoute('category_dishes_index', [], Response::HTTP_SEE_OTHER);
    }
}
