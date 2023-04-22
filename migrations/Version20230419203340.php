<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230419203340 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture ADD COLUMN mode_paiement VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__facture AS SELECT id, agent_id, client, prix_total, observation, date, updated_time, updated_at FROM facture');
        $this->addSql('DROP TABLE facture');
        $this->addSql('CREATE TABLE facture (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, agent_id INTEGER DEFAULT NULL, client VARCHAR(255) DEFAULT NULL, prix_total DOUBLE PRECISION NOT NULL, observation VARCHAR(255) DEFAULT NULL, date DATETIME NOT NULL, updated_time VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , CONSTRAINT FK_FE8664103414710B FOREIGN KEY (agent_id) REFERENCES agent (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO facture (id, agent_id, client, prix_total, observation, date, updated_time, updated_at) SELECT id, agent_id, client, prix_total, observation, date, updated_time, updated_at FROM __temp__facture');
        $this->addSql('DROP TABLE __temp__facture');
        $this->addSql('CREATE INDEX IDX_FE8664103414710B ON facture (agent_id)');
    }
}
