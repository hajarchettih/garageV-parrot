<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230908200103 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse ADD zip_code VARCHAR(100) NOT NULL, ADD phone_number VARCHAR(20) NOT NULL, DROP zipCode, DROP phoneNumber, CHANGE street street VARCHAR(150) NOT NULL, CHANGE city city VARCHAR(100) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse ADD zipCode INT NOT NULL, ADD phoneNumber INT NOT NULL, DROP zip_code, DROP phone_number, CHANGE street street VARCHAR(255) NOT NULL, CHANGE city city VARCHAR(255) NOT NULL');
    }
}
