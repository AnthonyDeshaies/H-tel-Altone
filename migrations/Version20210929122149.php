<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210929122149 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE amenities (id INT AUTO_INCREMENT NOT NULL, name_amenity VARCHAR(55) NOT NULL, description_amenity LONGTEXT DEFAULT NULL, img_amenity VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contacts (id INT AUTO_INCREMENT NOT NULL, name_contact VARCHAR(55) NOT NULL, first_name_contact VARCHAR(55) NOT NULL, mail_contact VARCHAR(100) NOT NULL, text_contact LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE discoveries (id INT AUTO_INCREMENT NOT NULL, name_discovery VARCHAR(100) NOT NULL, descriptiondiscovery LONGTEXT DEFAULT NULL, img_discovery VARCHAR(255) DEFAULT NULL, city_discovery VARCHAR(100) NOT NULL, coordinates_discovery VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseurs (id INT AUTO_INCREMENT NOT NULL, name_fournisseur VARCHAR(100) NOT NULL, description_fournisseur LONGTEXT NOT NULL, img_fournisseur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suppliers (id INT AUTO_INCREMENT NOT NULL, name_supplier VARCHAR(100) NOT NULL, description_supplier LONGTEXT NOT NULL, img_supplier VARCHAR(255) NOT NULL, adress_supplier VARCHAR(155) NOT NULL, cp_supplier VARCHAR(55) NOT NULL, city_supplier VARCHAR(55) NOT NULL, phone_supplier VARCHAR(55) DEFAULT NULL, mail_supplier VARCHAR(55) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE amenities');
        $this->addSql('DROP TABLE contacts');
        $this->addSql('DROP TABLE discoveries');
        $this->addSql('DROP TABLE fournisseurs');
        $this->addSql('DROP TABLE suppliers');
    }
}
