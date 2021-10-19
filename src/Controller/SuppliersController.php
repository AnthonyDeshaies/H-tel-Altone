<?php

namespace App\Controller;

use App\Entity\Suppliers;
use App\Form\SuppliersType;
use App\Repository\SuppliersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @Route("/suppliers")
 */
class SuppliersController extends AbstractController
{
    /**
     * @Route("/", name="suppliers_index", methods={"GET"})
     */
    public function index(SuppliersRepository $suppliersRepository): Response
    {
        return $this->render('suppliers/index.html.twig', [
            'suppliers' => $suppliersRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="suppliers_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $supplier = new Suppliers();
        $form = $this->createForm(SuppliersType::class, $supplier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $img_supplier = $form->get('img_supplier')->getData();
            if ($img_supplier) {
                $originalFilename = pathinfo($img_supplier->getClientOriginalName(), PATHINFO_FILENAME);
                // ceci est nécessaire pour inclure en toute sécurité le nom de fichier dans l'URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $img_supplier->guessExtension();
                // Déplacez le fichier dans le répertoire où les brochures sont stockées
                try {
                    $img_supplier->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... gérer l'exception si quelque chose se produit pendant letéléchargement du fichier
                }
                // met à jour la propriété 'photoEleve' pour stocker le nom du fichier PDF au lieu de son contenu
                $supplier->setImgSupplier($newFilename);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($supplier);
            $entityManager->flush();

            return $this->redirectToRoute('suppliers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('suppliers/new.html.twig', [
            'supplier' => $supplier,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="suppliers_show", methods={"GET"})
     */
    public function show(Suppliers $supplier): Response
    {
        return $this->render('suppliers/show.html.twig', [
            'supplier' => $supplier,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="suppliers_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Suppliers $supplier, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(SuppliersType::class, $supplier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $img_supplier = $form->get('img_supplier')->getData();
            if ($img_supplier) {
                $originalFilename = pathinfo($img_supplier->getClientOriginalName(), PATHINFO_FILENAME);
                // ceci est nécessaire pour inclure en toute sécurité le nom de fichier dans l'URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $img_supplier->guessExtension();
                // Déplacez le fichier dans le répertoire où les brochures sont stockées
                try {
                    $img_supplier->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... gérer l'exception si quelque chose se produit pendant letéléchargement du fichier
                }
                // met à jour la propriété 'photoEleve' pour stocker le nom du fichier PDF au lieu de son contenu
                $supplier->setImgSupplier($newFilename);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('suppliers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('suppliers/edit.html.twig', [
            'supplier' => $supplier,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="suppliers_delete", methods={"POST"})
     */
    public function delete(Request $request, Suppliers $supplier): Response
    {
        if ($this->isCsrfTokenValid('delete' . $supplier->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($supplier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('suppliers_index', [], Response::HTTP_SEE_OTHER);
    }
}
