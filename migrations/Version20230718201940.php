<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230718201940 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // Créer la table "horaire"
        $this->addSql('CREATE TABLE horaire (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Ajouter les colonnes "horaires", "telephone" et "adresse" à la table "horaire"
        $this->addSql('ALTER TABLE horaire ADD horaires LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE horaire ADD telephone VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE horaire ADD adresse VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // Supprimer la table "horaire" en cas de rollback
        $this->addSql('DROP TABLE horaire');
    }
}
