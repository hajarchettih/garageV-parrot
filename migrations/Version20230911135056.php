<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230911135056 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('CREATE TABLE user_car (id INT AUTO_INCREMENT NOT NULL, contact_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, price DOUBLE PRECISION NOT NULL, year INT NOT NULL, kilometer INT NOT NULL, characteristics LONGTEXT NOT NULL, energy VARCHAR(100) NOT NULL, photo VARCHAR(255) DEFAULT NULL, INDEX IDX_9C2B8716E7A1254A (contact_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('ALTER TABLE user_car ADD CONSTRAINT FK_9C2B8716E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        //$this->addSql('DROP TABLE usercar');
        $this->addSql('ALTER TABLE admin ADD email VARCHAR(180) NOT NULL');
        //$this->addSql('CREATE UNIQUE INDEX UNIQ_880E0D76E7927C74 ON admin (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        //$this->addSql('CREATE TABLE usercar (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, price DOUBLE PRECISION NOT NULL, year INT NOT NULL, kilometer INT NOT NULL, characteristics LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, energy VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, photo INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = MyISAM COMMENT = \'\' ');
        //$this->addSql('ALTER TABLE user_car DROP FOREIGN KEY FK_9C2B8716E7A1254A');
        //$this->addSql('DROP TABLE user_car');
        //$this->addSql('DROP INDEX UNIQ_880E0D76E7927C74 ON admin');
        $this->addSql('ALTER TABLE admin DROP email');
    }
}
