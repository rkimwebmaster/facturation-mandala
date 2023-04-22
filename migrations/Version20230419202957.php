<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230419202957 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, telephone VARCHAR(14) NOT NULL)');
        $this->addSql('CREATE TABLE agent (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, identite_id INTEGER NOT NULL, organisation_id INTEGER NOT NULL, CONSTRAINT FK_268B9C9DE5F13C8F FOREIGN KEY (identite_id) REFERENCES identite (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_268B9C9D9E6B1585 FOREIGN KEY (organisation_id) REFERENCES organisation (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_268B9C9DE5F13C8F ON agent (identite_id)');
        $this->addSql('CREATE INDEX IDX_268B9C9D9E6B1585 ON agent (organisation_id)');
        $this->addSql('CREATE TABLE detail_facture (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, produit_id INTEGER NOT NULL, facture_id INTEGER NOT NULL, quantite INTEGER NOT NULL, total_ligne DOUBLE PRECISION NOT NULL, CONSTRAINT FK_9949E4C5F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_9949E4C57F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_9949E4C5F347EFB ON detail_facture (produit_id)');
        $this->addSql('CREATE INDEX IDX_9949E4C57F2DEE08 ON detail_facture (facture_id)');
        $this->addSql('CREATE TABLE entreprise (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, slogan VARCHAR(255) NOT NULL, idnat VARCHAR(255) NOT NULL, rccm VARCHAR(255) NOT NULL, sigle VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, description VARCHAR(255) NOT NULL, responsable VARCHAR(255) NOT NULL, phone_number VARCHAR(14) NOT NULL, email VARCHAR(255) NOT NULL, website VARCHAR(255) NOT NULL, whatsapp_number VARCHAR(14) NOT NULL, facebook VARCHAR(255) DEFAULT NULL, linked_in VARCHAR(255) DEFAULT NULL, twitter VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, newsbg389x454 VARCHAR(255) DEFAULT NULL, menu_banner295x320_premier VARCHAR(255) DEFAULT NULL, menu_banner295x320_deuxieme VARCHAR(255) DEFAULT NULL, menu_banner295x320_troisieme VARCHAR(255) DEFAULT NULL, main_banner1903x650_un VARCHAR(255) DEFAULT NULL, main_banner1903x650_deux VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE facture (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, agent_id INTEGER DEFAULT NULL, client VARCHAR(255) DEFAULT NULL, prix_total DOUBLE PRECISION NOT NULL, observation VARCHAR(255) DEFAULT NULL, date DATETIME NOT NULL, updated_time VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , CONSTRAINT FK_FE8664103414710B FOREIGN KEY (agent_id) REFERENCES agent (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_FE8664103414710B ON facture (agent_id)');
        $this->addSql('CREATE TABLE identite (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, postnom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE organisation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, identite_id INTEGER DEFAULT NULL, adresse_id INTEGER DEFAULT NULL, designation VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, CONSTRAINT FK_E6E132B4E5F13C8F FOREIGN KEY (identite_id) REFERENCES identite (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_E6E132B44DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E6E132B4E5F13C8F ON organisation (identite_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E6E132B44DE7DC5C ON organisation (adresse_id)');
        $this->addSql('CREATE TABLE produit (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, prix DOUBLE PRECISION NOT NULL, unite VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE "user" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE agent');
        $this->addSql('DROP TABLE detail_facture');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE identite');
        $this->addSql('DROP TABLE organisation');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
