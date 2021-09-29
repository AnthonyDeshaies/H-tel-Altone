<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210929084925 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rooms (id INT AUTO_INCREMENT NOT NULL, name_room VARCHAR(150) NOT NULL, type_room VARCHAR(55) NOT NULL, nb_place INT NOT NULL, price_room NUMERIC(10, 2) NOT NULL, view_room VARCHAR(55) DEFAULT NULL, description_type_room LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roooms (id INT AUTO_INCREMENT NOT NULL, name_room VARCHAR(100) NOT NULL, nbplaces INT NOT NULL, price_room NUMERIC(10, 2) NOT NULL, view_room VARCHAR(155) DEFAULT NULL, description_type_room LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE rooms');
        $this->addSql('DROP TABLE roooms');
    }
}
