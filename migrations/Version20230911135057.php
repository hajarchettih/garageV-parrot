<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230911135057 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
       // $this->addSql('DROP TABLE car');
        $this->addSql('ALTER TABLE admin CHANGE email email VARCHAR(180) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL');
        //$this->addSql('CREATE UNIQUE INDEX UNIQ_880E0D76E7927C74 ON admin (email)');
        //$this->addSql('ALTER TABLE adresse ADD zip_code VARCHAR(100) NOT NULL, ADD phone_number VARCHAR(20) NOT NULL, DROP zipcode, DROP phoneNumber, CHANGE street street VARCHAR(150) NOT NULL, CHANGE city city VARCHAR(100) NOT NULL');
        //$this->addSql('ALTER TABLE contact DROP firstame, DROP lasname, DROP email');
        $this->addSql('ALTER TABLE horaire CHANGE days days VARCHAR(50) DEFAULT NULL, CHANGE open open VARCHAR(100) DEFAULT NULL');
        //$this->addSql('ALTER TABLE service ADD name VARCHAR(255) NOT NULL, ADD content LONGTEXT NOT NULL, DROP service');
        $this->addSql('ALTER TABLE temoignages CHANGE content content LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL');
        //$this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
       
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, brand VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, year INT NOT NULL, fuel VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, kilometer INT NOT NULL, price INT NOT NULL, details LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, carbody VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, exteriorcolor VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, interiorcolor VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, typeengine VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, displacement VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, power VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, gearbox VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, speed INT NOT NULL, airconditioner TINYINT(1) NOT NULL, audiosystem VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, navigationsystem VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, seating INT NOT NULL, security VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, other VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, state VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, maintenancehistory VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, tires VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, photo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        //$this->addSql('DROP INDEX UNIQ_880E0D76E7927C74 ON admin');
        $this->addSql('ALTER TABLE admin CHANGE email email VARCHAR(50) NOT NULL, CHANGE password password INT NOT NULL');
        $this->addSql('ALTER TABLE temoignages CHANGE content content TEXT NOT NULL');
        //$this->addSql('ALTER TABLE adresse ADD zipcode INT NOT NULL, ADD phoneNumber INT NOT NULL, DROP zip_code, DROP phone_number, CHANGE street street VARCHAR(255) NOT NULL, CHANGE city city VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE contact ADD firstame VARCHAR(255) NOT NULL, ADD lasname VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL');
        //$this->addSql('ALTER TABLE service ADD service TEXT NOT NULL, DROP name, DROP content');
        //$this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user CHANGE email email INT NOT NULL, CHANGE password password INT NOT NULL');
        $this->addSql('ALTER TABLE horaire CHANGE days days VARCHAR(255) NOT NULL, CHANGE open open VARCHAR(255) NOT NULL');
    }
}
