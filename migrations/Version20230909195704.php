<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230909195704 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE temoignages ADD name VARCHAR(255) NOT NULL, ADD content LONGTEXT NOT NULL, DROP firstname, DROP lastname, DROP comment, CHANGE valid approved TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE temoignages ADD lastname VARCHAR(255) NOT NULL, ADD comment VARCHAR(255) NOT NULL, DROP content, CHANGE name firstname VARCHAR(255) NOT NULL, CHANGE approved valid TINYINT(1) NOT NULL');
    }
}
