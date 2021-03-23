<?php

namespace App\DataFixtures;

use App\Entity\Agence;
use App\Entity\Compte;
use App\Entity\Profils;
use App\Entity\User;
use App\Repository\AgenceRepository;
use App\Repository\CompteRepository;
use App\Repository\ProfilsRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $agenceRepo;

    public function __construct(UserPasswordEncoderInterface $encoder, ProfilsRepository $profilRepository,
                                AgenceRepository $agenceRepository, CompteRepository $compteRepository)
    {
        $this->encoder = $encoder;
        $this->profilRepo = $profilRepository;
        $this->agenceRepo = $agenceRepository;
        $this->compteRepo = $compteRepository;
    }
        public function load(ObjectManager $manager)
    {

       /* $agence = new Agence();
        $agence->setTelephone("33737737");
        $agence->setAdresse("Colobane");
        $agence->setLatitude(24.00);
        $agence->setLongitude(87.00);
        $manager->persist($agence);
        $manager->flush();
        $agence = new Agence();
        $agence->setTelephone("77237377");
        $agence->setAdresse("Thies");
        $agence->setLatitude(76.00);
        $agence->setLongitude(98.00);
        $manager->persist($agence);
        $manager->flush();*/

       /* $compte=new Compte();
        $compte->setNumeroCompte(34523898);
        $compte->setSolde(700000);
        $dateCreation=new \DateTime();
        $compte->setDateCreation($dateCreation);
        $agence=$this->agenceRepo->find(2);
        $compte->setAgence($agence);
        $manager->persist($compte);
        $manager->flush();
        $compte=new Compte();
        $compte->setNumeroCompte(122898);
        $compte->setSolde(500000);
        $dateCreation=new \DateTime();
        $compte->setDateCreation($dateCreation);
        $agence=$this->agenceRepo->find(1);
        $compte->setAgence($agence);
        $manager->persist($compte);
        $manager->flush();
        /*
        $user = new User();
        $user->setEmail("sd@gmail.com");
        $user->setPrenom("Seck");
        $user->setNom("Dieng");
        $user->setTelephone("777066602");
        $user->setPassword($this->encoder->encodePassword($user,'password'));
        $profil = $this->profilRepo->find(1);
        $user->setProfils($profil);
        $agence = $this->agenceRepo->find(1);
        $user->setAgence($agence);
        $manager->persist($user);
        $manager->flush();*/

        // $user = new User();
        // $user->setEmail("zale@gmail.com");
        // $user->setPrenom("zale");
        // $user->setNom("diop");
        // $user->setTelephone("78754232");
        // $user->setPassword($this->encoder->encodePassword($user,'passer'));
        // $profil = $this->profilRepo->find(2);
        // $user->setProfil($profil);
        // $agence = $this->agenceRepo->find(2);
        // $user->setAgence($agence);
        // $manager->persist($user);
        // $manager->flush();

        // $user = new User();
        // $user->setEmail("penda@gmail.com");
        // $user->setPrenom("penda");
        // $user->setNom("ndiaye");
        // $user->setTelephone("765432204");
        // $user->setPassword($this->encoder->encodePassword($user,'passer'));
        // $profil = $this->profilRepo->find(3);
        // $user->setProfil($profil);
        // $agence = $this->agenceRepo->find(3);
        // $user->setAgence($agence);
        // $manager->persist($user);
        // $manager->flush();

        // $user = new User();
        // $user->setEmail("doudou@gmail.com");
        // $user->setPrenom("doudou");
        // $user->setNom("niang");
        // $user->setTelephone("745635523");
        // $user->setPassword($this->encoder->encodePassword($user,'passer'));
        // $profil = $this->profilRepo->find(4);
        // $user->setProfil($profil);
        // $agence = $this->agenceRepo->find(4);
        // $user->setAgence($agence);
        // $manager->persist($user);
        // $manager->flush();

        // $user = new User();
        // $user->setEmail("aly@gmail.com");
        // $user->setPrenom("aly");
        // $user->setNom("tall");
        // $user->setTelephone("787625545");
        // $user->setPassword($this->encoder->encodePassword($user,'password'));
        // $profil = $this->profilRepo->find(4);
        // $user->setProfil($profil);
        // $agence = $this->agenceRepo->find(4);
        // $user->setAgence($agence);
        // $manager->persist($user);
        // $manager->flush();


      /*  $user = new Profils();
        $user->setLibelle('Admin_Systeme');
        $manager->persist($user);
        $manager->flush();

        $user = new Profils();
        $user->setLibelle('Caissier');
        $manager->persist($user);
        $manager->flush();

        $user = new Profils();
        $user->setLibelle('Admin_Agence');
        $manager->persist($user);
        $manager->flush();

        $user = new Profils();
        $user->setLibelle('User_Agence');
        $manager->persist($user);
        $manager->flush();*/
    }
}
