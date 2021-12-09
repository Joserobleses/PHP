<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Place;

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
use App\Form\AddCommentPlaceFormType;

//use App\Form\PlaceAddCommentFormType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\User;
use App\Entity\Photo;

use Symfony\Component\Security\Core\User\UserInterface;

class PlaceController extends AbstractController
{
    
    #[Route('/place/{id<\d+>}', defaults:['pagina'=>1], name: 'place_show')]
    public function show(Place $place,int $pagina, Request $request, PaginatorService $paginator,
                        EntityManagerInterface $em, LoggerInterface $appInfoLogger, 
                        SimpleSearchService $busqueda):Response{ 
        
        $paginator->setEntityType('App\Entity\Photo');
        //$photos =$paginator->findAllEntities($pagina);

        
        
        
            $myplace = $place->getId();
        //dd($myplace);
        $photos =$paginator->findMyEntities($pagina, $myplace);

        $formularioAddComment = $this->createForm(AddCommentPlaceFormType::class);
        $formularioAddComment->handleRequest($request);
        
        $datos = $formularioAddComment->getData();

    if (is_object($datos)){        
        if(empty($datos->getCommenttext())){
            $this->addFlash('addCommentError', 'No se indicó un comentario válido.');

        }else{

            $comment = $datos;

            $place->addComment($comment);
            $em->flush();
            
            $mensaje  = 'Comentario '. $comment->getCommenttext();
            $mensaje .= ' añadido a '. $place->getNom().'correctamente.';
            $this->addFlash('success', $mensaje);
            $appInfoLogger->info($mensaje);
            
        }
    }

        return $this->render("place/show.html.twig", ['formulario' =>$formularioAddComment->createView(),
                                                        'id' => $place->getId(),
                                                        'place' => $place,
                                                        'photos' => $photos
                                                    ]); //,'places' => $places,
    }

    #[Route('/places/{pagina}', defaults:['pagina'=>1], name: 'place_list')]
    public function index(int $pagina, PaginatorService $paginator): Response
    {
        
        $paginator->setEntityType('App\Entity\Place');
        
        $places =$paginator->findAllEntities($pagina);
        
        
        return $this->renderForm("place/list.html.twig",[
            "places" => $places,
            "totalPaginas" => $paginator->getTotalPages(),
            "totalPlaces" => $paginator->getTotal(),
            "paginaActual" => $pagina
            
        ]);
    }
    
    

    
    #[Route('/place/create', name: 'place_create', methods:['GET','POST'])]
    public function create(Request $request, LoggerInterface $appInfoLogger, FileService $uploader): Response{
        
        $place = new Place();
       

        $this->denyAccessUnlessGranted('create',$place);
        
        $formulario = $this->createForm(PlaceFormType::class, $place);
        
        
        $formulario->handleRequest($request);
        
        if ($formulario->isSubmitted() && $formulario->isValid()){
            
            $uploader->targetDirectory = $this->getParameter('app.photos_root');    
            $file = $formulario->get('foto')->getData();
            
            if($file){
                $place->setFoto($uploader->upload($file));                 
            }
            $place->setUser($this->getUser());
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($place);
            $entityManager->flush();
            
            $mensaje = 'Sitio guardado con id '.$place->getId();
            $this->addFlash('success', $mensaje);
            $appInfoLogger->info($mensaje);
            
            //return $this->redirectToRoute('place_show', ['id' => $place->getId()]);
            return $this->redirectToRoute('place_add_foto', ['id' => $place->getId()]);
        }
        return $this->render('place/create.html.twig',['formulario' =>$formulario->createView()]);
    }
   
    
    
   
    #[Route('/place/edit/{id<\d+>}', defaults:['pagina'=>1], name: 'place_edit', methods:['GET','POST'])]
    #[IsGranted('edit', subject: 'place')]
    public function edit(Place $place, Request $request,
                        LoggerInterface $appInfoLogger, FileService $uploader,
                         EntityManagerInterface $em,
                         int $pagina, PaginatorService $paginator ): Response{
        
        $this->denyAccessUnlessGranted('edit',$place);
        
        $usuarioIdentificado = $this->getUser();
        
        if ($place->getUser() !== $usuarioIdentificado && !$this->isGranted('ROLE_ADMIN', $usuarioIdentificado)){
            throw $this->createAccessDeniedException();
        }
        
        $paginator->setEntityType('App\Entity\Photo');
        
        $photos =$paginator->findAllEntities($pagina);
//dd($photos);
        $fichero = $place->getFoto();
        
        $formulario = $this->createForm(PlaceFormType::class, $place);
        
        $formulario->handleRequest($request);
        
        if ($formulario->isSubmitted() && $formulario->isValid()){
            
            $uploader->targetDirectory = $this->getParameter('app.photos_root');
            
            $file = $formulario->get('foto')->getData();
            if($file){
                $fichero = $uploader->replace($file, $fichero);           
            }
            
            $place->setFoto($fichero);
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();
            
            $mensaje = 'Sitio editado con id '.$place->getId();
            $this->addFlash('success', $mensaje);
            $appInfoLogger->info($mensaje);
            
            return $this->redirectToRoute('place_show', ['id' => $place->getId()]);
        }
        
        $formularioAddFoto = $this->createForm(AddFotoPlaceFormType::class);
        $formularioAddFoto->handleRequest($request);
        
        $datos = $formularioAddFoto->getData();
        
        if (is_object($datos)){        
            if(empty($datos->getFoto())){
                $this->addFlash('addFotoError', 'No se indicó una foto con formato válido.');
                
            }else{
                //$comment = $datos['commenttext'];
                
                $photo = $datos;//dd($place);// dd($comment);//dd($datos->getCommenttext());
                //$place->addComment($comment);
                $place->addPhotoss($photo);
                $em->flush();
                
                $mensaje  = 'Foto '. $photo->getFoto();
                $mensaje .= ' añadida a '. $place->getNom().'correctamente.';
                $this->addFlash('success', $mensaje);
                $appInfoLogger->info($mensaje);
                //dd('$places');
            }
        }   

    
        //dd('holamundoo3');
        return $this->renderForm('place/edit.html.twig',[
            'formularioFoto' =>$formularioAddFoto,
            'formulario' =>$formulario,
            'place' => $place,
            'photos',$photos]);
    }


    #[Route('/place/delete/{id}', name: 'place_delete', methods:['GET','POST'])]
    #[IsGranted('delete', subject: 'place')]
    public function delete(Place $place, Request $request, LoggerInterface $appInfoLogger, FileService $uploader): Response{
        
        $formulario = $this->createForm(PlaceDeleteFormType::class, $place);
        
        $formulario->handleRequest($request);
        
        if ($formulario->isSubmitted() && $formulario->isValid()){
            
            if($place->getFoto()){
                $uploader->delete($place->getFoto());
        
            }
            $mensaje = 'Sitio borrado con id '.$place->getId();
            $appInfoLogger->info($mensaje);
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($place);
            $entityManager->flush();
            
            
            $this->addFlash('success', $mensaje);
            
            
            return $this->redirectToRoute('place_list');
        }
        return $this->render('place/delete.html.twig',['formulario' =>$formulario->createView(),
            'place' => $place]);
    }

    #[Route('/place/search', name: 'place_search', methods:['GET','POST'])]
    public function search(Request $request, SimpleSearchService $busqueda):Response{
        
        $formulario = $this->createForm(SearchFormType::class, $busqueda,[
            'field_choices' => [
                'Nombre' => 'nom',
                'Pais' => 'pais',
                'Población' => 'poblacio'
                
            ],
            'order_choices' =>[
                'ID' => 'id',
                'Nombre' =>'nom',
                'Pais' => 'pais',
                'Población' => 'poblacio'
            ]
        ]);
        
        $formulario->get('campo')->setData($busqueda->campo);
        $formulario->get('orden')->setData($busqueda->orden);
        
        $formulario->handleRequest($request);
        
        $places = $busqueda->search('App\Entity\Place');
        
        return $this->renderForm('place/buscar.html.twig',[
            'formulario' => $formulario,
            'places' => $places
        ]);
    }
    

    #[Route('/place/deleteimage/{id<\d+>}', name: 'place_delete_photo', methods:['GET'])]
    public function deleteImage(Place $place, Request $request, FileService $uploader, EntityManagerInterface $em): Response{
        if($place->getFoto()){
            $uploader->delete($place->getFoto());
        
            
            $place->getFoto(NULL);
        
            $em->flush();
            $mensaje = 'Foto del sitio'.$place->getNom().' borrada.';
            $this->addFlash('success', $mensaje);
        }
        return $this->redirectToRoute('place_edit',['id' => $place->getId()]);/////////pagina 45 pdf symfony 16 servicios
    }

    #[Route('/place/destroy/{id}', name: 'place_destroy')]
    public function destroy($id):Response{
        $entityManager= $this->getDoctrine()->getManager();
        $place = $entityManager->getRepository(Place::class)->find($id);
        
        if(!$place)
            throw $this->createNotFoundException("No se encontró el sitio $id");
            
            $entityManager->remove($place);
            $entityManager->flush();
            
            return new Response("El sitio : <b>$place</b> fue eliminado correctamente.");
    }

}
