<?php

namespace App\Controller;

use App\Entity\Amenities;
use App\Form\AmenitiesType;
use App\Repository\AmenitiesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @Route("/amenities")
 */
class AmenitiesController extends AbstractController
{
    /**
     * @Route("/", name="amenities_index", methods={"GET"})
     */
    public function index(AmenitiesRepository $amenitiesRepository): Response
    {
        return $this->render('amenities/index.html.twig', [
            'amenities' => $amenitiesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="amenities_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $amenity = new Amenities();
        $form = $this->createForm(AmenitiesType::class, $amenity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imgAmenity = $form->get('imgAmenity')->getData();
            if ($imgAmenity) {
                $originalFilename = pathinfo($imgAmenity->getClientOriginalName(), PATHINFO_FILENAME);
                // ceci est nécessaire pour inclure en toute sécurité le nom de fichier dans l'URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imgAmenity->guessExtension();
                // Déplacez le fichier dans le répertoire où les brochures sont stockées
                try {
                    $imgAmenity->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... gérer l'exception si quelque chose se produit pendant letéléchargement du fichier
                }
                // met à jour la propriété 'photoEleve' pour stocker le nom du fichier PDF au lieu de son contenu
                $amenity->setImgAmenity($newFilename);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($amenity);
            $entityManager->flush();

            return $this->redirectToRoute('amenities_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('amenities/new.html.twig', [
            'amenity' => $amenity,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="amenities_show", methods={"GET"})
     */
    public function show(Amenities $amenity): Response
    {
        return $this->render('amenities/show.html.twig', [
            'amenity' => $amenity,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="amenities_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Amenities $amenity, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(AmenitiesType::class, $amenity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imgAmenity = $form->get('imgAmenity')->getData();
            if ($imgAmenity) {
                $originalFilename = pathinfo($imgAmenity->getClientOriginalName(), PATHINFO_FILENAME);
                // ceci est nécessaire pour inclure en toute sécurité le nom de fichier dans l'URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imgAmenity->guessExtension();
                // Déplacez le fichier dans le répertoire où les brochures sont stockées
                try {
                    $imgAmenity->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... gérer l'exception si quelque chose se produit pendant letéléchargement du fichier
                }
                // met à jour la propriété 'photoEleve' pour stocker le nom du fichier PDF au lieu de son contenu
                $amenity->setImgAmenity($newFilename);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('amenities_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('amenities/edit.html.twig', [
            'amenity' => $amenity,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="amenities_delete", methods={"POST"})
     */
    public function delete(Request $request, Amenities $amenity): Response
    {
        if ($this->isCsrfTokenValid('delete' . $amenity->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($amenity);
            $entityManager->flush();
        }

        return $this->redirectToRoute('amenities_index', [], Response::HTTP_SEE_OTHER);
    }
}
