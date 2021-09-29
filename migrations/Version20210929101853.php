<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210929101853 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_dishes (id INT AUTO_INCREMENT NOT NULL, name_category VARCHAR(55) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dishes (id INT AUTO_INCREMENT NOT NULL, name_dish VARCHAR(55) NOT NULL, description_dish LONGTEXT NOT NULL, price_dish NUMERIC(6, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menus (id INT AUTO_INCREMENT NOT NULL, restaurant_id INT DEFAULT NULL, name_menu VARCHAR(55) NOT NULL, price_menu NUMERIC(6, 2) NOT NULL, description_menu LONGTEXT NOT NULL, INDEX IDX_727508CFB1E7706E (restaurant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, description_restaurant LONGTEXT NOT NULL, img_restaurant VARCHAR(255) NOT NULL, img_starter VARCHAR(255) NOT NULL, img_main_course VARCHAR(255) NOT NULL, img_dessert VARCHAR(255) NOT NULL, img_drink VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roooms (id INT AUTO_INCREMENT NOT NULL, name_room VARCHAR(100) NOT NULL, nbplaces INT NOT NULL, price_room NUMERIC(10, 2) NOT NULL, view_room VARCHAR(155) DEFAULT NULL, description_type_room LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE menus ADD CONSTRAINT FK_727508CFB1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menus DROP FOREIGN KEY FK_727508CFB1E7706E');
        $this->addSql('DROP TABLE category_dishes');
        $this->addSql('DROP TABLE dishes');
        $this->addSql('DROP TABLE menus');
        $this->addSql('DROP TABLE restaurant');
        $this->addSql('DROP TABLE roooms');
    }
}
