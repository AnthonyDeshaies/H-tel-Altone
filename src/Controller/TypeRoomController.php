<?php

namespace App\Controller;

use App\Entity\TypeRoom;
use App\Form\TypeRoomType;
use App\Repository\TypeRoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function new(Request $request): Response
    {
        $typeRoom = new TypeRoom();
        $form = $this->createForm(TypeRoomType::class, $typeRoom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
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
    public function edit(Request $request, TypeRoom $typeRoom): Response
    {
        $form = $this->createForm(TypeRoomType::class, $typeRoom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
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
