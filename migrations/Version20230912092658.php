<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230912092658 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin ADD email VARCHAR(180) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_880E0D76E7927C74 ON admin (email)');
        //$this->addSql('ALTER TABLE contact firstname, lastname, mail, phonenumber, content, approved');
        $this->addSql('ALTER TABLE user_car ADD CONSTRAINT FK_9C2B8716E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
       $this->addSql('DROP INDEX UNIQ_880E0D76E7927C74 ON admin');
       $this->addSql('ALTER TABLE admin DROP email');
       $this->addSql('ALTER TABLE user_car DROP FOREIGN KEY FK_9C2B8716E7A1254A');
        $this->addSql('ALTER TABLE contact ADD firstname VARCHAR(50) NOT NULL, ADD lastname VARCHAR(50) NOT NULL, ADD mail VARCHAR(50) NOT NULL, ADD phonenumber VARCHAR(50) NOT NULL, ADD content LONGTEXT NOT NULL, ADD approved TINYINT(1) NOT NULL');
    }
}
