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
use App\Entity\Comment;

use Symfony\Component\Security\Core\User\UserInterface;

class CommentController extends AbstractController
{
    #[Route('/comments/{pagina}', defaults:['pagina'=>1], name: 'actor_list')]
    public function index(int $pagina, PaginatorService $paginator): Response
    {
        
        $paginator->setEntityType('App\Entity\Comment');
        //$paginator->setLimit($this->getParameter('app.comment_results'));

        $comments =$paginator->findAllEntities($pagina);
        
        return $this->renderForm("comment/list.html.twig",[
            "comments" => $comments,
            "totalPaginas" => $paginator->getTotalPages(),
            "totalPlaces" => $paginator->getTotal(),
            "paginaActual" => $pagina
            
        ]);
    } 

    #[Route('/place/addcomment/{id<\d+>}', name: 'place_add_comment', methods:['POST'] )]
    #[IsGranted('edit', subject: 'place')]
    public function addActor(Place $place, Request $request, EntityManagerInterface $em, LoggerInterface $appInfoLogger){
        
        //$this->denyAccessUnlessGranted('edit',$pelicula);
        
        $formularioAddComment = $this->createForm(AddCommentPlaceFormType::class);
        $formularioAddComment->handleRequest($request);
        
        $datos= $formularioAddComment->getData();
        
        if(empty($datos['commenttext'])){
            $this->addFlash('addCommentError', 'No se indicó un comentario válido.');
            
        }else{
            $comment = $datos['comment'];
            $place->addComment($comment);
            $em->flush();
            
            $mensaje  = 'Comentario '. $comment->getCommenttext();
            $mensaje .= ' añadido a '. $place->getNom().'correctamente.';
            $this->addFlash('success', $mensaje);
            $appInfoLogger->info($mensaje);
        }
        return $this->redirectToRoute('place_show', ['id' => $place->getId()]);
    }

    #[Route('/place/removeplace/{place<\d+>}/{comment<\d+>}', name: 'place_remove_comment', methods:['GET'] )]
    public function removeComment(Place $place, Comment $comment, EntityManagerInterface $em, LoggerInterface $appInfoLogger){
        
        $this->denyAccessUnlessGranted('edit',$place);
        
        $place->removeComment($comment);
        $em->flush();
        
        $mensaje  = 'Comentario '. $comment->getCommenttext();
        $mensaje .= ' eliminado de '. $place->getNom().'correctamente.';
        $this->addFlash('success', $mensaje);
        $appInfoLogger->info($mensaje);
        
        return $this->redirectToRoute('place_edit', ['id' => $place->getId()]);
    }
    
}
