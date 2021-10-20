<?php

namespace App\Controller;

use App\Entity\Discoveries;
use App\Form\DiscoveriesType;
use App\Repository\DiscoveriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
     * @Route("/admin", name="discoveries_admin", methods={"GET"})
     */
    public function admin(DiscoveriesRepository $discoveriesRepository): Response
    {
        return $this->render('discoveries/admin.html.twig', [
            'discoveries' => $discoveriesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="discoveries_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $discovery = new Discoveries();
        $form = $this->createForm(DiscoveriesType::class, $discovery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imgDiscovery = $form->get('imgDiscovery')->getData();
            if ($imgDiscovery) {
                $originalFilename = pathinfo($imgDiscovery->getClientOriginalName(), PATHINFO_FILENAME);
                // ceci est nécessaire pour inclure en toute sécurité le nom defichier dans l'URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imgDiscovery->guessExtension();
                // Déplacez le fichier dans le répertoire où les brochures sontstockées
                try {
                    $imgDiscovery->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... gérer l'exception si quelque chose se produit pendant letéléchargement du fichier
                }
                // met à jour la propriété 'photoEleve' pour stocker le nom dufichier PDF au lieu de son contenu
                $discovery->setImgDiscovery($newFilename);
            }
            /** Fin du code à ajouter **/

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
    public function edit(Request $request, Discoveries $discovery, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(DiscoveriesType::class, $discovery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           
            $imgDiscovery = $form->get('imgDiscovery')->getData();
            if ($imgDiscovery) {
                $originalFilename = pathinfo($imgDiscovery->getClientOriginalName(), PATHINFO_FILENAME);
                // ceci est nécessaire pour inclure en toute sécurité le nom defichier dans l'URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imgDiscovery->guessExtension();
                // Déplacez le fichier dans le répertoire où les brochures sontstockées
                try {
                    $imgDiscovery->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... gérer l'exception si quelque chose se produit pendant letéléchargement du fichier
                }
                // met à jour la propriété 'photoEleve' pour stocker le nom dufichier PDF au lieu de son contenu
                $discovery->setImgDiscovery($newFilename);
            }
            $this->getDoctrine()->getManager()->flush();
            /** Fin du code à ajouter **/

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
        if ($this->isCsrfTokenValid('delete' . $discovery->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($discovery);
            $entityManager->flush();
        }

        return $this->redirectToRoute('discoveries_index', [], Response::HTTP_SEE_OTHER);
    }
}
