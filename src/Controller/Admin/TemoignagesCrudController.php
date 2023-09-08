<?php

namespace App\Controller;

use App\Entity\Temoignages;
use App\Form\TemoignagesFormType;
use App\Repository\AdresseRepository;
use App\Repository\HoraireRepository;
use App\Repository\TemoignagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class TemoignagesController extends AbstractController
{
    private $entityManager;
    private $temoignagesRepository;

    public function __construct(EntityManagerInterface $entityManager, TemoignagesRepository $temoignagesRepository)
    {
        $this->entityManager = $entityManager;
        $this->temoignagesRepository = $temoignagesRepository;
    }
    #[Route('/temoignages', name: 'app_temoignages', methods: ['GET', 'POST'])]
    public function new(Request $request, AdresseRepository $adresseRepository, HoraireRepository $horaireRepository): Response
    {
        $temoignages = new Temoignages();
        $temoignages->setApproved(false);

        $form = $this->createForm(TemoignagesFormType::class, $temoignages);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $note = $data->getNote();
    
            if ($note < 0 || $note > 5) {
                $form->get('note')->addError(new FormError('La note doit être comprise entre 0 et 5.'));
            } else {
                $this->entityManager->persist($temoignages);
                $this->entityManager->flush();
    
                return $this->redirectToRoute('app_temoignages_success');
            }
        }

        return $this->render('temoignages/new.html.twig', [
            'form' => $form->createView(),
            'adresse' => $adresseRepository->findOneBy([],[]),
            'horaire' => $horaireRepository->findBy([],[])
        ]);
    }
    #[Route('/temoignages/success', name: 'app_temoignages_success', methods: ['GET'])]
    public function success(): Response
    {
        return $this->render('temoignages/success.html.twig');
    }
    
    #[Route('/admin', name: 'admin_temoignages')]
    public function adminTemoignages(): Response
    {
        $temoignages = $this->temoignagesRepository->findAll();

        return $this->render('temoignages/admin_temoiganges.html.twig', [
            'temoignages' => $temoignages,
        ]);
    }

    #[Route('/admin/temoignages/approve/{id}', name: 'admin_temoignages_approve')]
    public function approveTemoignages(Temoignages $temoignages): Response
    {
        $temoignages->setApproved(true);
        $this->entityManager->flush();

        return $this->redirectToRoute('admin_temoignages');
    }

    #[Route('/admin/temoignages/disapprove/{id}', name: 'admin_temoignages_disapprove')]
    public function disapproveTemoignages(Temoignages $temoignages): Response
    {
        $temoignages->setApproved(false);
        $this->entityManager->flush();

        return $this->redirectToRoute('admin_temoignages');
    }
}