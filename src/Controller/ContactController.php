<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $contact = $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email = (new TemplatedEmail())
                ->from($contact->get('email')->getData())
                ->to('a.deshaies@laposte.net')
                ->subject('contact')
                ->htmlTemplate('email/contact.html.twig')
                ->context([
                    'prenom' => $contact->get('firstname')->getData(),
                    'nom' => $contact->get('lastname')->getData(),
                    'mail' => $contact->get('email')->getData(),
                    'subject' => $contact->get('subject')->getData(),
                    'message' => $contact->get('message')->getData(),
                ]);

                $mailer->send($email);

                return $this->redirectToRoute('contact');

        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
