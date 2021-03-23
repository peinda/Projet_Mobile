<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210321004835 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agence CHANGE telephone telephone VARCHAR(255) NOT NULL, CHANGE latitude latitude DOUBLE PRECISION NOT NULL, CHANGE longitude longitude DOUBLE PRECISION NOT NULL, CHANGE adresse adresse VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE client CHANGE nom_complet nom_complet VARCHAR(255) NOT NULL, CHANGE telephone telephone VARCHAR(255) NOT NULL, CHANGE num_cni num_cni VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE profils CHANGE libelle libelle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE transaction CHANGE date_retrait date_retrait DATE NOT NULL, CHANGE frais frais INT NOT NULL, CHANGE frais_depot frais_depot INT NOT NULL, CHANGE frais_retrait frais_retrait INT NOT NULL, CHANGE frais_etat frais_etat INT NOT NULL, CHANGE frais_systeme frais_systeme INT NOT NULL, CHANGE isretired is_retired TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE telephone telephone VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649450FF010 ON user (telephone)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agence CHANGE telephone telephone VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE latitude latitude DOUBLE PRECISION DEFAULT NULL, CHANGE longitude longitude DOUBLE PRECISION DEFAULT NULL, CHANGE adresse adresse VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE client CHANGE nom_complet nom_complet VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE num_cni num_cni VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE profils CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE transaction CHANGE date_retrait date_retrait DATE DEFAULT NULL, CHANGE frais frais INT DEFAULT NULL, CHANGE frais_depot frais_depot INT DEFAULT NULL, CHANGE frais_retrait frais_retrait INT DEFAULT NULL, CHANGE frais_etat frais_etat INT DEFAULT NULL, CHANGE frais_systeme frais_systeme INT DEFAULT NULL, CHANGE is_retired isRetired TINYINT(1) DEFAULT NULL');
        $this->addSql('DROP INDEX UNIQ_8D93D649450FF010 ON user');
        $this->addSql('ALTER TABLE user CHANGE telephone telephone VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
