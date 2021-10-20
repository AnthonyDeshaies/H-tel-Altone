<?php

namespace App\Controller;

use App\Entity\Dishes;
use App\Form\DishesType;
use App\Repository\DishesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dishes")
 */
class DishesController extends AbstractController
{
    /**
     * @Route("/", name="dishes_index", methods={"GET"})
     */
    public function index(DishesRepository $dishesRepository): Response
    {
        return $this->render('dishes/index.html.twig', [
            'dishes' => $dishesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/admin", name="dishes_admin", methods={"GET"})
     */
    public function admin(DishesRepository $dishesRepository): Response
    {
        return $this->render('dishes/admin.html.twig', [
            'dishes' => $dishesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="dishes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $dish = new Dishes();
        $form = $this->createForm(DishesType::class, $dish);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dish);
            $entityManager->flush();

            return $this->redirectToRoute('dishes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('dishes/new.html.twig', [
            'dish' => $dish,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="dishes_show", methods={"GET"})
     */
    public function show(Dishes $dish): Response
    {
        return $this->render('dishes/show.html.twig', [
            'dish' => $dish,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="dishes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Dishes $dish): Response
    {
        $form = $this->createForm(DishesType::class, $dish);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dishes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('dishes/edit.html.twig', [
            'dish' => $dish,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="dishes_delete", methods={"POST"})
     */
    public function delete(Request $request, Dishes $dish): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dish->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dish);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dishes_index', [], Response::HTTP_SEE_OTHER);
    }
}
