<?php

namespace App\Controller;

use App\Entity\TypeRoom;
use App\Form\TypeRoomType;
use App\Repository\TypeRoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @Route("/type/room")
 */
class TypeRoomController extends AbstractController
{
    /**
     * @Route("/", name="type_room_index", methods={"GET"})
     */
    public function index(TypeRoomRepository $typeRoomRepository): Response
    {
        return $this->render('type_room/index.html.twig', [
            'type_rooms' => $typeRoomRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_room_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $typeRoom = new TypeRoom();
        $form = $this->createForm(TypeRoomType::class, $typeRoom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imgType1 = $form->get('imgType1')->getData();
            if ($imgType1) {
                $originalFilename = pathinfo($imgType1->getClientOriginalName(), PATHINFO_FILENAME);
                // ceci est nécessaire pour inclure en toute sécurité le nom de fichier dans l'URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imgType1->guessExtension();
                // Déplacez le fichier dans le répertoire où les brochures sont stockées
                try {
                    $imgType1->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... gérer l'exception si quelque chose se produit pendant letéléchargement du fichier
                }
                // met à jour la propriété 'imgType1' pour stocker le nom du fichier PDF au lieu de son contenu
                $typeRoom->setImgType1($newFilename);
            }
            $imgType2 = $form->get('imgType2')->getData();
            if ($imgType2) {
                $originalFilename = pathinfo($imgType1->getClientOriginalName(), PATHINFO_FILENAME);
                // ceci est nécessaire pour inclure en toute sécurité le nom de fichier dans l'URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imgType2->guessExtension();
                // Déplacez le fichier dans le répertoire où les brochures sont stockées
                try {
                    $imgType2->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $typeRoom->setImgType2($newFilename);
            }
            $imgType3 = $form->get('imgType3')->getData();
            if ($imgType3) {
                $originalFilename = pathinfo($imgType3->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imgType3->guessExtension();
                try {
                    $imgType3->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $typeRoom->setImgType3($newFilename);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeRoom);
            $entityManager->flush();

            return $this->redirectToRoute('type_room_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_room/new.html.twig', [
            'type_room' => $typeRoom,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="type_room_show", methods={"GET"})
     */
    public function show(TypeRoom $typeRoom): Response
    {
        return $this->render('type_room/show.html.twig', [
            'type_room' => $typeRoom,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_room_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeRoom $typeRoom, SluggerInterface $slugger ): Response
    {
        $form = $this->createForm(TypeRoomType::class, $typeRoom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imgType1 = $form->get('imgType1')->getData();
            if ($imgType1) {
                $originalFilename = pathinfo($imgType1->getClientOriginalName(), PATHINFO_FILENAME);
                // ceci est nécessaire pour inclure en toute sécurité le nom de fichier dans l'URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imgType1->guessExtension();
                // Déplacez le fichier dans le répertoire où les brochures sont stockées
                try {
                    $imgType1->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... gérer l'exception si quelque chose se produit pendant letéléchargement du fichier
                }
                // met à jour la propriété 'imgType1' pour stocker le nom du fichier PDF au lieu de son contenu
                $typeRoom->setImgType1($newFilename);
            }
            $imgType2 = $form->get('imgType2')->getData();
            if ($imgType2) {
                $originalFilename = pathinfo($imgType1->getClientOriginalName(), PATHINFO_FILENAME);
                // ceci est nécessaire pour inclure en toute sécurité le nom de fichier dans l'URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imgType2->guessExtension();
                // Déplacez le fichier dans le répertoire où les brochures sont stockées
                try {
                    $imgType2->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $typeRoom->setImgType2($newFilename);
            }
            $imgType3 = $form->get('imgType3')->getData();
            if ($imgType3) {
                $originalFilename = pathinfo($imgType3->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imgType3->guessExtension();
                try {
                    $imgType3->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $typeRoom->setImgType3($newFilename);
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_room_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_room/edit.html.twig', [
            'type_room' => $typeRoom,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="type_room_delete", methods={"POST"})
     */
    public function delete(Request $request, TypeRoom $typeRoom): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeRoom->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeRoom);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_room_index', [], Response::HTTP_SEE_OTHER);
    }
}
