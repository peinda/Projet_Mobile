<?php


namespace App\Controller;


use App\Entity\Client;
use App\Entity\Transaction;
use App\Repository\TransactionRepository;
use App\Repository\UserRepository;
use App\Service\TransactionService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Routing\Annotation\Route;
class TransactionController extends AbstractController
{
    /**
     * @Route
     *(path="/api/user/transaction", name="depot", methods={"POST"})
     */
    public function depotTransaction(Request $request,SerializerInterface $serializer, EntityManagerInterface $entityManager,
                                     ValidatorInterface $validator, UserRepository $userRepository, TransactionService $transactionService)
    {
        $transactionJson= $request->getContent();
        $transactionTab= $serializer->decode($transactionJson, 'json');
        $transaction = new Transaction();
        $idUserDepot= $transactionTab['idUserDepot'];
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
        if ($soldeCompteAgenceDepot<5000){
            return $this->json('votre solde est inferieur a 5000',Response::HTTP_NOT_FOUND);
        }
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
     *(path="/api/user/transaction/{codeTrans}", name="codeTRans", methods={"GET"})
     */
    public function codeTransaction( TransactionRepository $transactionRepository, $codeTrans)
    {

        $codeTrans = $transactionRepository->findOneBy(['codeTrans'=>$codeTrans]);
        return $this->json( $codeTrans );

    }
    /**
     * @Route
     *(path="/api/user/transaction/{id}", name="retrait", methods={"PUT"})
     */
    public function retraitTransaction(Request $request,SerializerInterface $serializer, EntityManagerInterface $entityManager,
                                     ValidatorInterface $validator, UserRepository $userRepository,$id, TransactionRepository $transactionRepository, TransactionService $transactionService)
    {
        $transactionJson= $request->getContent();
        $transactionTab= $serializer->decode($transactionJson, 'json');
        $transaction = new Transaction();
        $transaction= $transactionRepository->find($id);

        if(($transaction->getDateRetrait()==null)){
                if ($transactionService->validationCni($transactionTab['clientRetrait']['numCni'])==false){
                 return $this->json('votre numero CNI n est pas correct',Response::HTTP_NOT_FOUND);
            }
            $transaction->getClientRetrait()->setNumCni($transactionTab['clientRetrait']['numCni']);
            $transaction->setDateRetrait(new \DateTime());
            $entityManager->flush();
            return $this->json($transaction, Response::HTTP_OK);
        }

    }

    /**
     * @Route
     *(path="/api/user/client/{numCni}", name="numCni", methods={"GET"})
     */
    public function getClientCni( TransactionRepository $transactionRepository, $numCni)
    {

        $numCni = $transactionRepository->findOneBy(['numCni'=>$numCni]);
        return $this->json( $numCni);
        

}

}
