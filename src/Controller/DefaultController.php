<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Place;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'portada')]
    public function index(EntityManagerInterface $em): Response
    {
        
        
              $repositorio = $this->getDoctrine()->getRepository(Place::class);
              $places = $repositorio->findLastWithPhoto(3);
           
              return $this->render("portada.html.twig",  ["places" => $places]);
    }

}
