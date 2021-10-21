<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211021124905 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE amenities (id INT AUTO_INCREMENT NOT NULL, name_amenity VARCHAR(55) NOT NULL, description_amenity LONGTEXT DEFAULT NULL, img_amenity VARCHAR(255) DEFAULT NULL, price_amenity VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_dishes (id INT AUTO_INCREMENT NOT NULL, name_category VARCHAR(55) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_drinks (id INT AUTO_INCREMENT NOT NULL, name_category VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_suppliers (id INT AUTO_INCREMENT NOT NULL, name_category VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contacts (id INT AUTO_INCREMENT NOT NULL, name_contact VARCHAR(55) NOT NULL, first_name_contact VARCHAR(55) NOT NULL, mail_contact VARCHAR(100) NOT NULL, text_contact LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE discoveries (id INT AUTO_INCREMENT NOT NULL, name_discovery VARCHAR(100) NOT NULL, descriptiondiscovery LONGTEXT DEFAULT NULL, img_discovery VARCHAR(255) DEFAULT NULL, city_discovery VARCHAR(100) NOT NULL, latitude_discovery VARCHAR(50) NOT NULL, longitude_discovery VARCHAR(50) NOT NULL, cp_discovery VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dishes (id INT AUTO_INCREMENT NOT NULL, category_dishes_id INT DEFAULT NULL, name_dish VARCHAR(55) NOT NULL, description_dish LONGTEXT NOT NULL, price_dish NUMERIC(6, 2) NOT NULL, INDEX IDX_584DD35D673D014A (category_dishes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE drinks (id INT AUTO_INCREMENT NOT NULL, category_drinks_id INT DEFAULT NULL, name_drink VARCHAR(50) NOT NULL, detail_drink VARCHAR(150) DEFAULT NULL, price_drink NUMERIC(5, 2) NOT NULL, INDEX IDX_EAD79309EC2BB2CB (category_drinks_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseurs (id INT AUTO_INCREMENT NOT NULL, name_fournisseur VARCHAR(100) NOT NULL, description_fournisseur LONGTEXT NOT NULL, img_fournisseur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menus (id INT AUTO_INCREMENT NOT NULL, restaurant_id INT DEFAULT NULL, name_menu VARCHAR(55) NOT NULL, price_menu NUMERIC(6, 2) NOT NULL, description_menu LONGTEXT NOT NULL, INDEX IDX_727508CFB1E7706E (restaurant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, description_restaurant LONGTEXT NOT NULL, img_restaurant VARCHAR(255) NOT NULL, img_starter VARCHAR(255) NOT NULL, img_main_course VARCHAR(255) NOT NULL, img_dessert VARCHAR(255) NOT NULL, img_drink VARCHAR(255) NOT NULL, name_restaurant VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rooms (id INT AUTO_INCREMENT NOT NULL, type_room_id INT DEFAULT NULL, name_room VARCHAR(150) NOT NULL, nb_place INT NOT NULL, price_room NUMERIC(10, 2) NOT NULL, view_room VARCHAR(55) DEFAULT NULL, INDEX IDX_7CA11A967C361F66 (type_room_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suppliers (id INT AUTO_INCREMENT NOT NULL, category_suppliers_id INT DEFAULT NULL, name_supplier VARCHAR(100) NOT NULL, description_supplier LONGTEXT DEFAULT NULL, adress_supplier VARCHAR(155) DEFAULT NULL, cp_supplier VARCHAR(55) DEFAULT NULL, city_supplier VARCHAR(55) DEFAULT NULL, phone_supplier VARCHAR(55) DEFAULT NULL, mail_supplier VARCHAR(55) DEFAULT NULL, website_supplier VARCHAR(50) DEFAULT NULL, INDEX IDX_AC28B95CD9828CD1 (category_suppliers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_room (id INT AUTO_INCREMENT NOT NULL, name_type VARCHAR(155) NOT NULL, img_type1 VARCHAR(255) NOT NULL, img_type2 VARCHAR(255) NOT NULL, img_type3 VARCHAR(255) NOT NULL, description_type_room LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dishes ADD CONSTRAINT FK_584DD35D673D014A FOREIGN KEY (category_dishes_id) REFERENCES category_dishes (id)');
        $this->addSql('ALTER TABLE drinks ADD CONSTRAINT FK_EAD79309EC2BB2CB FOREIGN KEY (category_drinks_id) REFERENCES category_drinks (id)');
        $this->addSql('ALTER TABLE menus ADD CONSTRAINT FK_727508CFB1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('ALTER TABLE rooms ADD CONSTRAINT FK_7CA11A967C361F66 FOREIGN KEY (type_room_id) REFERENCES type_room (id)');
        $this->addSql('ALTER TABLE suppliers ADD CONSTRAINT FK_AC28B95CD9828CD1 FOREIGN KEY (category_suppliers_id) REFERENCES category_suppliers (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dishes DROP FOREIGN KEY FK_584DD35D673D014A');
        $this->addSql('ALTER TABLE drinks DROP FOREIGN KEY FK_EAD79309EC2BB2CB');
        $this->addSql('ALTER TABLE suppliers DROP FOREIGN KEY FK_AC28B95CD9828CD1');
        $this->addSql('ALTER TABLE menus DROP FOREIGN KEY FK_727508CFB1E7706E');
        $this->addSql('ALTER TABLE rooms DROP FOREIGN KEY FK_7CA11A967C361F66');
        $this->addSql('DROP TABLE amenities');
        $this->addSql('DROP TABLE category_dishes');
        $this->addSql('DROP TABLE category_drinks');
        $this->addSql('DROP TABLE category_suppliers');
        $this->addSql('DROP TABLE contacts');
        $this->addSql('DROP TABLE discoveries');
        $this->addSql('DROP TABLE dishes');
        $this->addSql('DROP TABLE drinks');
        $this->addSql('DROP TABLE fournisseurs');
        $this->addSql('DROP TABLE menus');
        $this->addSql('DROP TABLE restaurant');
        $this->addSql('DROP TABLE rooms');
        $this->addSql('DROP TABLE suppliers');
        $this->addSql('DROP TABLE type_room');
        $this->addSql('DROP TABLE user');
    }
}
