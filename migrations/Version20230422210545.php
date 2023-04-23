<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230422210545 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__entreprise AS SELECT id, nom_entreprise, slogan, idnat, rccm, sigle, logo, description, responsable, phone_number, email, website, whatsapp_number, facebook, linked_in, twitter, adresse, ville, pays, newsbg389x454, menu_banner295x320_premier, menu_banner295x320_deuxieme, menu_banner295x320_troisieme, main_banner1903x650_un, main_banner1903x650_deux FROM entreprise');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('CREATE TABLE entreprise (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, slogan VARCHAR(255) DEFAULT NULL, idnat VARCHAR(255) DEFAULT NULL, rccm VARCHAR(255) DEFAULT NULL, sigle VARCHAR(255) DEFAULT NULL, logo VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, responsable VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(14) NOT NULL, email VARCHAR(255) DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, whatsapp_number VARCHAR(14) DEFAULT NULL, facebook VARCHAR(255) DEFAULT NULL, linked_in VARCHAR(255) DEFAULT NULL, twitter VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, pays VARCHAR(255) DEFAULT NULL, newsbg389x454 VARCHAR(255) DEFAULT NULL, menu_banner295x320_premier VARCHAR(255) DEFAULT NULL, menu_banner295x320_deuxieme VARCHAR(255) DEFAULT NULL, menu_banner295x320_troisieme VARCHAR(255) DEFAULT NULL, main_banner1903x650_un VARCHAR(255) DEFAULT NULL, main_banner1903x650_deux VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO entreprise (id, nom_entreprise, slogan, idnat, rccm, sigle, logo, description, responsable, phone_number, email, website, whatsapp_number, facebook, linked_in, twitter, adresse, ville, pays, newsbg389x454, menu_banner295x320_premier, menu_banner295x320_deuxieme, menu_banner295x320_troisieme, main_banner1903x650_un, main_banner1903x650_deux) SELECT id, nom_entreprise, slogan, idnat, rccm, sigle, logo, description, responsable, phone_number, email, website, whatsapp_number, facebook, linked_in, twitter, adresse, ville, pays, newsbg389x454, menu_banner295x320_premier, menu_banner295x320_deuxieme, menu_banner295x320_troisieme, main_banner1903x650_un, main_banner1903x650_deux FROM __temp__entreprise');
        $this->addSql('DROP TABLE __temp__entreprise');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__entreprise AS SELECT id, nom_entreprise, slogan, idnat, rccm, sigle, logo, description, responsable, phone_number, email, website, whatsapp_number, facebook, linked_in, twitter, adresse, ville, pays, newsbg389x454, menu_banner295x320_premier, menu_banner295x320_deuxieme, menu_banner295x320_troisieme, main_banner1903x650_un, main_banner1903x650_deux FROM entreprise');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('CREATE TABLE entreprise (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, slogan VARCHAR(255) NOT NULL, idnat VARCHAR(255) NOT NULL, rccm VARCHAR(255) NOT NULL, sigle VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, description VARCHAR(255) NOT NULL, responsable VARCHAR(255) NOT NULL, phone_number VARCHAR(14) NOT NULL, email VARCHAR(255) NOT NULL, website VARCHAR(255) NOT NULL, whatsapp_number VARCHAR(14) NOT NULL, facebook VARCHAR(255) DEFAULT NULL, linked_in VARCHAR(255) DEFAULT NULL, twitter VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, newsbg389x454 VARCHAR(255) DEFAULT NULL, menu_banner295x320_premier VARCHAR(255) DEFAULT NULL, menu_banner295x320_deuxieme VARCHAR(255) DEFAULT NULL, menu_banner295x320_troisieme VARCHAR(255) DEFAULT NULL, main_banner1903x650_un VARCHAR(255) DEFAULT NULL, main_banner1903x650_deux VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO entreprise (id, nom_entreprise, slogan, idnat, rccm, sigle, logo, description, responsable, phone_number, email, website, whatsapp_number, facebook, linked_in, twitter, adresse, ville, pays, newsbg389x454, menu_banner295x320_premier, menu_banner295x320_deuxieme, menu_banner295x320_troisieme, main_banner1903x650_un, main_banner1903x650_deux) SELECT id, nom_entreprise, slogan, idnat, rccm, sigle, logo, description, responsable, phone_number, email, website, whatsapp_number, facebook, linked_in, twitter, adresse, ville, pays, newsbg389x454, menu_banner295x320_premier, menu_banner295x320_deuxieme, menu_banner295x320_troisieme, main_banner1903x650_un, main_banner1903x650_deux FROM __temp__entreprise');
        $this->addSql('DROP TABLE __temp__entreprise');
    }
}
