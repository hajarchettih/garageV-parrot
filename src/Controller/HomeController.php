<?php

namespace App\Controller;

use App\Repository\TemoignagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    
    #[Route('/', name: 'app_home')]
    public function index (TemoignagesRepository $temoignagesRepository): Response
    {
        return $this->render('home/home.html.twig',[
        'temoignages' => $temoignagesRepository->findBy([],[])
        ]);
    }
}
