<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/reservation")
 */
class ReservationController extends AbstractController
{

    /**
     * @Route("/admin", name="reservation_admin", methods={"GET"})
     */
    public function admin(ReservationRepository $reservationRepository): Response
    {



        return $this->render('reservation/admin.html.twig', [
            'reservations' => $reservationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="reservation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reservation);
            $entityManager->flush();

            return $this->redirectToRoute('reservation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reservation/new.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="reservation_show", methods={"GET"})
     */
    public function show(Reservation $reservation): Response
    {
        return $this->render('reservation/show.html.twig', [
            'reservation' => $reservation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="reservation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Reservation $reservation): Response
    {
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reservation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reservation/edit.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="reservation_delete", methods={"POST"})
     */
    public function delete(Request $request, Reservation $reservation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reservation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('reservation_index', [], Response::HTTP_SEE_OTHER);
    }
        /**
     * @Route("/", name="reservation_index")
     */
    public function index(ReservationRepository $reservationRepository, Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ReservationType::class);
        $reservation = $form->handleRequest($request);
        $mail= $this->getUser()->getEmail();
   
        if ($form->isSubmitted() && $form->isValid()) {
            $email = (new TemplatedEmail())
                ->from($mail)
                ->to('a.deshaies@laposte.net')
                ->subject('reservation')
                ->htmlTemplate('email/reservation.html.twig')
                ->context([
                    'prenom' => $reservation->get('firstname')->getData(),
                    'nom' => $reservation->get('lastname')->getData(),
                    'mail' => $mail,
                    'dateStartReservation' => $reservation->get('dateEndReservation')->getData(),
                    'dateEndReservation' => $reservation->get('dateStartReservation')->getData(),
                    'nbPeopleReservation' => $reservation->get('nbPeopleReservation')->getData(),
                    'typeRoom' => $reservation->get('typeRoom')->getData(),
                    'transportReservation' => $reservation->get('transportReservation')->getData(),
                ]);

                $mailer->send($email);

                return $this->redirectToRoute('reservation_index');
        }

        return $this->render('reservation/index.html.twig', [
            'form' => $form->createView(),
            'reservations' => $reservationRepository->findAll(),
        ]);
    }
}
