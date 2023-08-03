<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230722093415 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // Modify the password column to be VARCHAR(255) and NOT NULL
        $this->addSql('ALTER TABLE user CHANGE password password VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        // Note: You can leave the down() method as it is, as it's only used for rollback
        $this->addSql('ALTER TABLE user ADD password TEXT NOT NULL');
    }
}
