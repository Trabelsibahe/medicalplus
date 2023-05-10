<?php

namespace App\Controller;
use App\Entity\Admin;
use App\Entity\Rendezvous;
use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OC\PlatformBundle\Form\AdvertType;
class AdminController extends AbstractController
{


    //***********************************Admin start***********************************************************//
    /**
     * @Route("/amessages", name="display_msg")
     */
    public function index(): Response
    {

        $contacts = $this->getDoctrine()->getManager()->getRepository(Contact::class)->findAll();
        return $this->render('admin/amsg.html.twig', [
            'c'=>$contacts
        ]);
    }

    //***********************************Admin start***********************************************************//
    /**
     * @Route("/arendezvous", name="display_rv")
     */
    public function displayrv(): Response
    {

        $rendezvous = $this->getDoctrine()->getManager()->getRepository(Rendezvous::class)->findAll();
        return $this->render('admin/arv.html.twig', [
            'r'=>$rendezvous
        ]);
    }

    /**
     * @Route("/admin", name="display_admin")
     */
    public function indexAdmin(): Response
    {

        return $this->render('Admin/admin.html.twig'
        );
    }


    /**
     * @Route("/removeContact/{id}", name="supp_contact")
     */
    public function sup_contact(Contact  $contact): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($contact);
        $em->flush();

        return $this->redirectToRoute('display_msg');


    }

        /**
     * @Route("/removerv/{id}", name="supp_rv")
     */
    public function sup_rv(Rendezvous  $rendezvous): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($rendezvous);
        $em->flush();

        return $this->redirectToRoute('display_rv');


    }
    
   

}
