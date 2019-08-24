<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\Depot;
use App\Form\UserType;
use App\Form\DepotType;
use App\Entity\Prestataire;
use App\Form\PrestataireType;
use App\Entity\CompteBancaire;
use App\Form\CompteBancaireType;
use FOS\RestBundle\Controller\Annotations as Rest;
use App\Controller\SecurityController;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CompteBancaireRepository;
use App\Repository\PrestataireRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/api", name="api")
 */

class ApiController extends AbstractController
{
           
/**
* @Route("/prestataire", name="app_prestataire", methods={"GET","POST"})
*/

public function Ajout(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager )
{
    $prestataire = new Prestataire();
    $form1 = $this->createForm(PrestataireType::class, $prestataire);
    $form1->handleRequest($request);
    $date=$request->request->all(); 
    $form1->submit($date);
    $entityManager->persist($prestataire);
    $entityManager->flush();

   $data = [
    'status' => 201,
    'message' => 'Le Prestataire est bien ajoute'
];
return new JsonResponse($data, 201); 


$data = [
'status' => 500,
'message' => 'Vous devez renseigner les champs'
];
return new JsonResponse($data, 500);
}

    /**
     * @Route("/api", name="api")
     */
    public function index()
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }


/**
* @Route("/user", name="app_user", methods={"POST"})
*/
public function ajoutuser(Request $request, UserPasswordEncoderInterface $passwordEncoder)
{
   
    $user = new User();
    $form = $this->createForm(UserType::class, $user);
    $form->handleRequest($request);
    $data=$request->request->all();
    $file=$request->files->all()['imageFile'];
    $form->submit($data);
    
   
        $user->setPassword(
        $passwordEncoder->encodePassword($user,$form->get('plainPassword')->getData()));
        $user->setImageFile($file);
       $repository = $this->getDoctrine()->getRepository(Prestataire::class);
    
        $user->setStatut("actif");
        $profil= $data["profil"];
        $user->setProfil($profil);
        $roles=[];
        if($profil=="Admin"){
            $user->setRoles(['ROLE_Admin_Principale_Systeme']);
        }
        elseif ($profil=="admin") {
            $user->setRoles(['ROLE_Admin_Wari_Prestataire']);
        }
        elseif ($profil=="user") {
            $user->setRoles(['ROLE_USER']);
        }
        elseif ($profil=="Caissier") {
            $user->setRoles(['ROLE_Caisier_DU_Systeme_Principal']);
        }
        elseif ($profil=="caissier") {
            $user->setRoles(['ROLE_Caisier_DU_Wari_Prestataire']);
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        $data = [
            'status' => 201,
            'message' => 'Le user est  bien ajouté'
        ];
        return new JsonResponse($data, 201); 
    //}

    $data = [
        'status' => 500,
        'message' => 'Vous devez renseigner les champs'
    ];
    return new JsonResponse($data, 500);
}


  /**
  * @Route("/CompteBancaire", name="app_CompteBancaire")
  */

  public function CrerCompte(Request $request, UserPasswordEncoderInterface $passwordEncoder)
  {
     $random = random_int(10000000, 99999999);
     $compteBancaire = new CompteBancaire();
     $form = $this->createForm(compteBancaireType::class, $compteBancaire);
     $form->handleRequest($request); 
     $daw=$request->request->all();
     $repository = $this->getDoctrine()->getRepository(Prestataire::class);
     $parte= $repository->findAll();
     $compteBancaire->setNumeroCompte($random);
     $entityManager = $this->getDoctrine()->getManager();
     $form->submit($daw);
     $entityManager->persist($compteBancaire);
     $entityManager->flush();
      $data = [
        'status' => 201,
        'message' => 'Le compte est bien créer'
    ];
    return new JsonResponse($data, 201); 


$data = [
    'status' => 500,
    'message' => 'Vous devez renseigner les champs'
];
return new JsonResponse($data, 500);
}
 /**
  * @Route("/Depot", name="app_register")
  */

  public function dodepot(Request $request, UserPasswordEncoderInterface $passwordEncoder)
  {  
     $depot= new Depot();
     $form = $this->createForm(DepotType::class, $depot);
     $form->handleRequest($request); 
     $data=$request->request->all(); 
     $repository = $this->getDoctrine()->getRepository(CompteBancaire::class);
    $parte= $repository->findAll(); 
     $repository = $this->getDoctrine()->getRepository(User::class);
     $parte= $repository->findAll();
     $entityManager = $this->getDoctrine()->getManager();
     $form->submit($data);
     $entityManager->persist($depot);
     $entityManager->flush();
      $data = [
        'status' => 201,
        'message' => 'Le Depot est bien realiser'
    ];
    return new JsonResponse($data, 201); 


$data = [
    'status' => 500,
    'message' => 'Vous devez renseigner les champs'
];
return new JsonResponse($data, 500);

}


}
