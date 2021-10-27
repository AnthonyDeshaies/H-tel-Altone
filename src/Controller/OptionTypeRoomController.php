<?php

namespace App\Controller;

use App\Entity\OptionTypeRoom;
use App\Form\OptionTypeRoomType;
use App\Repository\OptionTypeRoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/option/type/room")
 */
class OptionTypeRoomController extends AbstractController
{
    /**
     * @Route("/", name="option_type_room_index", methods={"GET"})
     */
    public function index(OptionTypeRoomRepository $optionTypeRoomRepository): Response
    {
        return $this->render('option_type_room/index.html.twig', [
            'option_type_rooms' => $optionTypeRoomRepository->findAll(),
        ]);
    }

    /**
     * @Route("/admin", name="option_type_room_admin", methods={"GET"})
     */
    public function admin(OptionTypeRoomRepository $optionTypeRoomRepository): Response
    {
        return $this->render('option_type_room/admin.html.twig', [
            'option_type_rooms' => $optionTypeRoomRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="option_type_room_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $optionTypeRoom = new OptionTypeRoom();
        $form = $this->createForm(OptionTypeRoomType::class, $optionTypeRoom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($optionTypeRoom);
            $entityManager->flush();

            return $this->redirectToRoute('option_type_room_admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('option_type_room/new.html.twig', [
            'option_type_room' => $optionTypeRoom,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="option_type_room_show", methods={"GET"})
     */
    public function show(OptionTypeRoom $optionTypeRoom): Response
    {
        return $this->render('option_type_room/show.html.twig', [
            'option_type_room' => $optionTypeRoom,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="option_type_room_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, OptionTypeRoom $optionTypeRoom): Response
    {
        $form = $this->createForm(OptionTypeRoomType::class, $optionTypeRoom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('option_type_room_admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('option_type_room/edit.html.twig', [
            'option_type_room' => $optionTypeRoom,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="option_type_room_delete", methods={"POST"})
     */
    public function delete(Request $request, OptionTypeRoom $optionTypeRoom): Response
    {
        if ($this->isCsrfTokenValid('delete'.$optionTypeRoom->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($optionTypeRoom);
            $entityManager->flush();
        }

        return $this->redirectToRoute('option_type_room_admin', [], Response::HTTP_SEE_OTHER);
    }
}
