<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230901092531 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car ADD fuel VARCHAR(255) NOT NULL, ADD details LONGTEXT NOT NULL, ADD carbody VARCHAR(255) NOT NULL, ADD exteriorcolor VARCHAR(255) NOT NULL, ADD interiorcolor VARCHAR(255) NOT NULL, ADD typeengine VARCHAR(255) NOT NULL, ADD displacement VARCHAR(255) NOT NULL, ADD power VARCHAR(255) NOT NULL, ADD gearbox VARCHAR(255) NOT NULL, ADD speed INT NOT NULL, ADD airconditioner TINYINT(1) NOT NULL, ADD audiosystem VARCHAR(255) NOT NULL, ADD navigationsystem VARCHAR(255) NOT NULL, ADD seating INT NOT NULL, ADD security VARCHAR(255) NOT NULL, ADD other VARCHAR(255) NOT NULL, ADD state VARCHAR(255) NOT NULL, ADD maintenancehistory VARCHAR(255) NOT NULL, ADD tires VARCHAR(255) NOT NULL, DROP caracteristic');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car ADD caracteristic TEXT NOT NULL, DROP fuel, DROP details, DROP carbody, DROP exteriorcolor, DROP interiorcolor, DROP typeengine, DROP displacement, DROP power, DROP gearbox, DROP speed, DROP airconditioner, DROP audiosystem, DROP navigationsystem, DROP seating, DROP security, DROP other, DROP state, DROP maintenancehistory, DROP tires');
    }
}
