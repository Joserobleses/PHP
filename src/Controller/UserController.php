<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseHasHeader;

use App\Entity\Place;
use App\Service\PaginatorService;
use App\Service\SimpleSearchService;
use App\Entity\User;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
class UserController extends AbstractController{

     #[Route('/home/{pagina}', defaults:['pagina'=>1], name: 'home', methods:['GET'])]
     public function home(int $pagina, PaginatorService $paginator, SimpleSearchService $busqueda,UserInterface $user)
     {
     $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
  
     //$places = $busqueda->search('App\Entity\Place');
     $repository = $this->getDoctrine()->getRepository(Place::class);//dd($repository);
     $userId = $user = $this->get('security.token_storage')->getToken()->getUser();
    
     //   $userId = $user->;
    
     $places= $repository->findBy(
        ['user' => $userId]
        
    );
     return $this->render('user/home.html.twig',[
         'places' => $places
     ]);     
    }
}  
  
  
     /*
     $paginator->setEntityType('App\Entity\Place');
        
     $places =$paginator->findAllEntities($pagina);
     
     
     return $this->render("user/home.html.twig",[
         "places" => $places,
         "totalPaginas" => $paginator->getTotalPages(),
         "totalPlaces" => $paginator->getTotal(),
         "paginaActual" => $pagina
         
     ]);
*/
     //return $this->render('user/home.html.twig');
     
     
     
     /*
     #[Route('/user/pic/{fotografia}', name: 'pic_show', methods:['GET'])]
     public function showPic(string $fotografia)
     {
         $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
         
         $ruta =  $this->getParameter('app.users_pics_root');
         
         $response = new BinaryFileResponse($ruta.'/'.$fotografia);
         $response->trustXSendfileTypeHeader();
         $response->setContentDisposition(
                ResponseHasHeaderBag::DISPOSITION_INLINE,
                $fotografia,
                iconv('UTF-8','ASCII//TRANSLIT', $fotografia)
         );
         return $response;
     }
     */
