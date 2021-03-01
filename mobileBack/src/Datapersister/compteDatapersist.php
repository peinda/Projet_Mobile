<?php


namespace App\Datapersister;


use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Compte;

class compteDatapersist implements ContextAwareDataPersisterInterface
{

    public function supports($data, array $context = []): bool
    {
        return $data instanceof Compte;
        $codeTrans=genererNumeeoCompte();

    }

    public function persist($data, array $context = [])
    {
        // TODO: Implement persist() method.
    }

    public function remove($data, array $context = [])
    {
        $data->setStatut(true);
        $this->entityManager->persist($data);
        $this->entityManager->flush();      }
}
