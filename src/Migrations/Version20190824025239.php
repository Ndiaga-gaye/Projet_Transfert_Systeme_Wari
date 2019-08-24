<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190824025239 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE compte_bancaire (id INT AUTO_INCREMENT NOT NULL, prestataire_id INT DEFAULT NULL, numero_compte INT NOT NULL, solde INT NOT NULL, INDEX IDX_50BC21DEBE3DB2B7 (prestataire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestataire (id INT AUTO_INCREMENT NOT NULL, nom_complet VARCHAR(255) NOT NULL, ninea VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, raison_social VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, nom_envoyeur VARCHAR(255) NOT NULL, prenom_envoyeur VARCHAR(255) NOT NULL, date_naissance VARCHAR(255) NOT NULL, numero_identite INT NOT NULL, telephone INT NOT NULL, telephone_beneficiaire INT NOT NULL, nom_beneficiare VARCHAR(255) NOT NULL, prenom_beneficiare VARCHAR(255) NOT NULL, date_emvoie VARCHAR(255) NOT NULL, code_envoie INT NOT NULL, INDEX IDX_723705D1A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, prestataire_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom_complet VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, telephone INT NOT NULL, numero_identite INT NOT NULL, email VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, profil VARCHAR(255) DEFAULT NULL, image_name VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), INDEX IDX_8D93D649BE3DB2B7 (prestataire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE depot (id INT AUTO_INCREMENT NOT NULL, proprietaire_compte_id INT NOT NULL, numero_compte INT NOT NULL, montant_depot INT NOT NULL, date_depot VARCHAR(255) NOT NULL, INDEX IDX_47948BBC9811E7E2 (proprietaire_compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compte_bancaire ADD CONSTRAINT FK_50BC21DEBE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('ALTER TABLE depot ADD CONSTRAINT FK_47948BBC9811E7E2 FOREIGN KEY (proprietaire_compte_id) REFERENCES compte_bancaire (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE depot DROP FOREIGN KEY FK_47948BBC9811E7E2');
        $this->addSql('ALTER TABLE compte_bancaire DROP FOREIGN KEY FK_50BC21DEBE3DB2B7');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649BE3DB2B7');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1A76ED395');
        $this->addSql('DROP TABLE compte_bancaire');
        $this->addSql('DROP TABLE prestataire');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE depot');
    }
}
