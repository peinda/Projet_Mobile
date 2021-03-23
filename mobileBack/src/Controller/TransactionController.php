<?php


namespace App\Controller;


use App\Entity\Client;
use App\Entity\Transaction;
use App\Repository\UserRepository;
use App\Service\TransactionService;
use App\Repository\CompteRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TransactionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TransactionController extends AbstractController
{
    /**
     * @Route
     *(path="/api/user/transaction", name="depot", methods={"POST"},
     * defaults={
     *     "_controller"="\app\Controller\TransactionController::depotTransaction",
     *     "_api_resource_class"=Transaction::class,
     *     "_api_collection_operation_name"="depot",
     *    }
     * )
     */
    public function depotTransaction(Request $request,SerializerInterface $serializer, EntityManagerInterface $entityManager,
                                     ValidatorInterface $validator, UserRepository $userRepository, TransactionService $transactionService, Security $security)
    {
        $transactionJson= $request->getContent();
       // dd($request->getContent());
        $transactionTab= $serializer->decode($transactionJson, 'json');
        $transaction = new Transaction();
        $user= $security->getUser();
       // dd($user);
         

        $idUserDepot= $user->getId();
        //dd($idUserDepot);
        $userDepot= $userRepository->find($idUserDepot);
        //dd($userDepot);
        $agenceDepot =$userDepot->getAgence();
        //dd($agence);
        $compteAgenceDepot =$agenceDepot->getCompte();
        //dd($compteAgenceDepot);
        $montantDepot =$transactionTab['montant'];
        $soldeCompteAgenceDepot = $compteAgenceDepot->getSolde();
        //dd($soldeCompteAgenceDepot);
        
        if ($montantDepot<$soldeCompteAgenceDepot){
            $compteAgenceDepot->setSolde($soldeCompteAgenceDepot-$montantDepot);
            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($userDepot);
            $transaction->setUserDepot($userDepot);

            $transaction->setCompteDepot($compteAgenceDepot);
            $transaction->setMontant($montantDepot);

            $dateDepot=new \DateTime();
            //dd($dateDepot);
            $transaction->setDateDepot($dateDepot);
            $codeTrans= $transactionService->generationCodeTransaction();
            //dd($codeTrans);
            $transaction->setCodeTrans($codeTrans);
            $frais= $transactionService->frais($montantDepot);
            //dd($frais);
            $transaction->setFrais($frais);
            $fraisDepot=$transactionService->fraisDepot($frais);
            //dd($fraisDepot);
            $transaction->setFraisDepot($frais);
            $fraisRetrait=$transactionService->fraisRetrait($frais);
            $transaction->setFraisRetrait($fraisRetrait);
            $fraisSysteme=$transactionService->fraisSysteme($frais);
            $transaction->setFraisSysteme($fraisSysteme);
            $fraisEtat=$transactionService->fraisEtat($frais);
            $transaction->setFraisEtat($fraisEtat);

            $clientDepot= new Client();
            $clientDepot->setNomComplet($transactionTab['clientDepot']['nomComplet']);
            //dd($clientDepot);
            if ($transactionService->validationCni($transactionTab['clientDepot']['numCni'])==false){
                return $this->json('votre numero CNI n est pas correct',Response::HTTP_NOT_FOUND);
            }
            $clientDepot->setNumCni($transactionTab['clientDepot']['numCni']);

            if ($transactionService->validationTelephone($transactionTab['clientDepot']['telephone'])==false){
                return $this->json('votre telephone n est pas correct',Response::HTTP_NOT_FOUND);
            }
            $clientDepot->setTelephone($transactionTab['clientDepot']['telephone']);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($clientDepot);
            $transaction->setClientDepot($clientDepot);
            //dd($clientDepot);

            $clientRetrait= new Client();
            $clientRetrait->setNomComplet($transactionTab['clientRetrait']['nomComplet']);

            if ($transactionService->validationTelephone($transactionTab['clientRetrait']['telephone'])==false){
                return $this->json('votre telephone n est pas correct',Response::HTTP_NOT_FOUND);
            }
            
            $clientRetrait->setTelephone($transactionTab['clientRetrait']['telephone']);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($clientRetrait);
            $transaction->setClientRetrait($clientRetrait);
            //dd($clientRetrait);

            $entityManager= $this->getDoctrine()->getManager();
            $entityManager->persist($transaction);
            $entityManager->flush();
            return $this->json($transaction, Response::HTTP_OK);
        }
        return $this->json('solde insuffisant pour cette transaction', Response::HTTP_NOT_FOUND);
    }

    /**
     * @Route
     *(path="/api/user/transaction/{codeTrans}", methods={"GET"},
     * )
     */
    public function codeTransaction( TransactionRepository $transactionRepository,string $codeTrans)
    {
        //dd($codeTrans)
        $code = $transactionRepository->findOneByCodeTrans(['codeTrans'=>$codeTrans]);
       // dd($code);
        return $this->json( $code, 200, [],['groups'=>'codeTran_red'] );

    }
    /**
     * @Route
     *(path="/api/user/transaction/retrait", name="retrait", methods={"PUT"}
     * )
     */
    public function retraitTransaction(Request $request,SerializerInterface $serializer, EntityManagerInterface $entityManager,
                                     ValidatorInterface $validator, UserRepository $userRepository, TransactionRepository $transactionRepository,Security $security, TransactionService $transactionService):Response
    {
        $transactionJson= $request->getContent();
        $transactionTab= $serializer->decode($transactionJson, 'json');
        $transaction = new Transaction();
        $transaction= $transactionRepository->findOneBy(['codeTrans'=>$transactionTab['clientRetrait']['codeTrans']]);
           //dd($security->getUser()->getAgence()->getCompte());
        if(($transaction->getDateRetrait()==null)){
                if ($transactionService->validationCni($transactionTab['clientRetrait']['numCni'])==false){
                 return $this->json('votre numero CNI n est pas correct',Response::HTTP_NOT_FOUND);
            }

            $userRetrait=$this->getUser();
            //dd($compteAgenceDepot);
            $montantRetrait=$transaction->getMontant();
            $compteAgenceRetrait=$security->getUser()->getAgence()->getCompte();
            $soldeCompteAgenceRetrait = $compteAgenceRetrait->getSolde();
            
        
            $compteAgenceRetrait->setSolde($soldeCompteAgenceRetrait+$montantRetrait);
            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($userRetrait);
            $transaction->setUserRetrait($userRetrait);

            $transaction->setCompteRetrait($compteAgenceRetrait);

            $transaction->getClientRetrait()->setNumCni($transactionTab['clientRetrait']['numCni']);
            $transaction->setDateRetrait(new \DateTime());

            $entityManager->flush();
        }
        return $this->json( $transaction, 200, [],['groups'=>'retrait_red'] );

    }

    /**
     * @Route
     *(path="/api/admin/compte/transactions", methods={"GET"},
     *  defaults={
     *     "_controller"="\app\Controller\TransactionController::getTransCompte",
     *     "_api_resource_class"=Transaction::class,
     *     "_api_collections_operation_name"="transCompte",
     *    }
     * )
     */
    public function getTransCompte(TransactionRepository $transactionRepository,SerializerInterface $serializer, Security $security)
    {

        //dd($security->getUser());
        $user= $security->getUser();
        $compteId= $user->getAgence()->getCompte()->getId();
        $transaction=$transactionRepository->findCompteAll($compteId);
        return $this->json($transaction);

}
      /**
     * @Route
     *(path="/api/user/frais/{montant}", methods={"GET"},
     *  defaults={
     *     "_controller"="\app\Controller\TransactionController::getFraisMontant",
     *     "_api_resource_class"=Transaction::class,
     *     "_api_collections_operation_name"="montant",
     *    }
     * )
     */
    public function getFraisMontant(Request $request,TransactionRepository $transactionRepository,SerializerInterface $serializer, EntityManagerInterface $entityManager, TransactionService $transactionService,$montant)
    {
        //dd($montant);
        $frais=$transactionService->frais($montant);
        $fraisEtat=$transactionService->fraisEtat($frais);
        $fraisDepot=$transactionService->fraisDepot($frais);
        $fraisRetrait=$transactionService->fraisRetrait($frais);

        $fraisTab['frais']= $frais;
        $fraisTab['fraisEtat']= $fraisEtat;
        $fraisTab['fraisDepot']= $fraisDepot;
        $fraisTab['fraisRetrait']= $fraisRetrait;


        return $this -> json($fraisTab, Response::HTTP_OK,);


    }

}
