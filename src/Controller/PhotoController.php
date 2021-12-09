<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Form\PlaceFormType;
use App\Form\PlaceDeleteFormType;

use Psr\Log\LoggerInterface;
use Symfony\Component\Filesystem\Filesystem;
use App\Service\FileService;
use Doctrine\ORM\EntityManagerInterface;

use App\Service\PaginatorService;

use App\Service\SimpleSearchService;
use App\Form\SearchFormType;
use App\Form\AddFotoPlaceFormType;

//use App\Form\PlaceAddCommentFormType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\User;
use App\Entity\Photo;
use App\Entity\Place;

class PhotoController extends AbstractController
{
    
    
    #[Route('/place/addFoto', name: 'place_add_foto', methods:['GET','POST'])]   
    public function addFoto(Request $request, LoggerInterface $appInfoLogger, FileService $uploader): Response{
        $entityManager= $this->getDoctrine()->getManager();
       // $places = $entityManager->getRepository(Place::class)->findAll();
       $fotos = $entityManager->getRepository(Photo::class)->findAll();
//dd($places);
        $foto = new Photo();
        //$this->denyAccessUnlessGranted('create',$foto);
        
        $formulario = $this->createForm(AddFotoPlaceFormType::class, $foto);
        
        $formulario->handleRequest($request);
        //dd($places);
        if ($formulario->isSubmitted() && $formulario->isValid()){
            //dd('hola5');    
            $uploader->targetDirectory = $this->getParameter('app.photos_root');    
            $file = $formulario->get('fichero')->getData();
            
            if($file){
                $foto->setFichero($uploader->upload($file));                 
            }
            
            $foto->setPlace($request->request->get('id'));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($foto);
            $entityManager->flush();
            
            $mensaje = 'Foto guardadada con id '.$foto->getId();
            $this->addFlash('success', $mensaje);
            $appInfoLogger->info($mensaje);
            
            return $this->redirectToRoute('place_add_foto', ['id' => $foto->getId()]);
        }//dd('hola6');
        //return $this->render('photo/addPhoto.html.twig',['formulario' =>$formulario->createView(),'places' => $places]);
        return $this->render('photo/addPhoto.html.twig',['formulario' =>$formulario->createView(),'fotos' => $fotos]);
    }


 
}
