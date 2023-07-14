<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230703150254 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, brand VARCHAR(255) NOT NULL, year INT NOT NULL, fuel VARCHAR(255) NOT NULL, kilometer INT NOT NULL, price INT NOT NULL, details LONGTEXT NOT NULL, carbody VARCHAR(255) NOT NULL, exteriorcolor VARCHAR(255) NOT NULL, interiorcolor VARCHAR(255) NOT NULL, typeengine VARCHAR(255) NOT NULL, displacement VARCHAR(255) NOT NULL, power VARCHAR(255) NOT NULL, gearbox VARCHAR(255) NOT NULL, speed INT NOT NULL, airconditioner TINYINT(1) NOT NULL, audiosystem VARCHAR(255) NOT NULL, navigationsystem VARCHAR(255) NOT NULL, seating INT NOT NULL, security VARCHAR(255) NOT NULL, other VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, maintenancehistory VARCHAR(255) NOT NULL, tires VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE temoignages (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, note INT NOT NULL, comment VARCHAR(255) NOT NULL, valid TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, mail VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, role LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE temoignages');
        $this->addSql('DROP TABLE user');
    }
}
