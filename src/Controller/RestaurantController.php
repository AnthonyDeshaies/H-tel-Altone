<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Form\RestaurantType;
use App\Repository\DishesRepository;
use App\Repository\DrinksRepository;
use App\Repository\RestaurantRepository;
use App\Repository\CategoryDishesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * @Route("/restaurant")
 */
class RestaurantController extends AbstractController
{
    /**
     * @Route("/", name="restaurant_index", methods={"GET"})
     */
    public function index(RestaurantRepository $restaurantRepository, DishesRepository $dishesRepository, CategoryDishesRepository $CategoryDishesRepository, DrinksRepository $drinksRepository ): Response
    {
        return $this->render('restaurant/index.html.twig', [
            'restaurants' => $restaurantRepository->findAll(),
            'dishes' => $dishesRepository->findAll(),
            'drinks' => $drinksRepository->findAll(),
            'categoryDishes' => $CategoryDishesRepository->findAll(),
        ]);
    }

     /**
     * @Route("/admin", name="restaurant_admin", methods={"GET"})
     */
    public function admin(RestaurantRepository $restaurantRepository): Response
    {
        return $this->render('restaurant/admin.html.twig', [
            'restaurants' => $restaurantRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="restaurant_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $restaurant = new Restaurant();
        $form = $this->createForm(RestaurantType::class, $restaurant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($restaurant);
            $entityManager->flush();

            return $this->redirectToRoute('restaurant_admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('restaurant/new.html.twig', [
            'restaurant' => $restaurant,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="restaurant_show", methods={"GET"})
     */
    public function show(Restaurant $restaurant): Response
    {
        return $this->render('restaurant/show.html.twig', [
            'restaurant' => $restaurant,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="restaurant_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Restaurant $restaurant, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(RestaurantType::class, $restaurant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('restaurant_admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('restaurant/edit.html.twig', [
            'restaurant' => $restaurant,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="restaurant_delete", methods={"POST"})
     */
    public function delete(Request $request, Restaurant $restaurant): Response
    {
        if ($this->isCsrfTokenValid('delete'.$restaurant->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($restaurant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('restaurant_admin', [], Response::HTTP_SEE_OTHER);
    }
}
