<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RendezvousType;
use Twig\Environment;
use App\Entity\Rendezvous;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
class RendezvousController extends AbstractController
{
    /**
     * @Route("/rendezvous", name="app_rendezvous")
     */
    public function show(Environment $twig, Request $request, EntityManagerInterface $entityManager)
    {
        $rendezvous = new Rendezvous();
        $form = $this->createForm(RendezvousType::class, $rendezvous);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

        $entityManager->persist($rendezvous);
        $entityManager->flush();
        $this->addFlash('success', 'Cher '.$rendezvous->getNom().' '.$rendezvous->getPrenom().". Merci d'avoir demandé un rendez-vous à ce date: ".$rendezvous->getDate()->format('Y-m-d').
        ' Nous vous appellerons sur '.$rendezvous->gettel().' ou enverrons un E-mail à '.$rendezvous->getEmail().' pour confirmer votre rendez-vous.');

        return $this->redirectToRoute('app_alert');    }
        return new Response($twig->render('rendezvous/rendezvous.html.twig', [
            'form' => $form->createView()
        ]));
    }
}
