<?php

namespace App\Controller;

use App\Entity\CategorySuppliers;
use App\Form\CategorySuppliersType;
use App\Repository\CategorySuppliersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/category/suppliers")
 */
class CategorySuppliersController extends AbstractController
{
    /**
     * @Route("/", name="category_suppliers_index", methods={"GET"})
     */
    public function index(CategorySuppliersRepository $categorySuppliersRepository): Response
    {
        return $this->render('category_suppliers/index.html.twig', [
            'category_suppliers' => $categorySuppliersRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="category_suppliers_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $categorySupplier = new CategorySuppliers();
        $form = $this->createForm(CategorySuppliersType::class, $categorySupplier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categorySupplier);
            $entityManager->flush();

            return $this->redirectToRoute('category_suppliers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('category_suppliers/new.html.twig', [
            'category_supplier' => $categorySupplier,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="category_suppliers_show", methods={"GET"})
     */
    public function show(CategorySuppliers $categorySupplier): Response
    {
        return $this->render('category_suppliers/show.html.twig', [
            'category_supplier' => $categorySupplier,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="category_suppliers_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CategorySuppliers $categorySupplier): Response
    {
        $form = $this->createForm(CategorySuppliersType::class, $categorySupplier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('category_suppliers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('category_suppliers/edit.html.twig', [
            'category_supplier' => $categorySupplier,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="category_suppliers_delete", methods={"POST"})
     */
    public function delete(Request $request, CategorySuppliers $categorySupplier): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorySupplier->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categorySupplier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('category_suppliers_index', [], Response::HTTP_SEE_OTHER);
    }
}
