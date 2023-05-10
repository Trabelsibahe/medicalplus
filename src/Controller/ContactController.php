<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
use Twig\Environment;
use App\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="app_contact")
     */
    public function show(Environment $twig, Request $request, EntityManagerInterface $entityManager)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

        $entityManager->persist($contact);
        $entityManager->flush();
        $this->addFlash('success', 'Cher '.$contact->getNom(). ' '.$contact->getPrenom().'. Nous avons reçu votre message.');
        return $this->redirectToRoute('app_alert');
    }
        return new Response($twig->render('contact/contact.html.twig', [
            'form' => $form->createView()
        ]));
    }
    
}
