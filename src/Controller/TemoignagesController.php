<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Temoignages;
use App\Form\TemoignagesType;

class TemoignagesController extends AbstractController
{
    #[Route('/temoignages', name: 'app_temoignages')]
    public function index(Request $request): Response
    {
        $temoignages = new Temoignages();
        $form = $this->createForm(TemoignagesType::class, $temoignages);

        $form->handleRequest($request);


        return $this->render('temoignages/index.html.twig', [
            'controller_name' => 'TemoignagesController',
        ]);
    }
}
