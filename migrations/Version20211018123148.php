<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211018123148 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_drinks (id INT AUTO_INCREMENT NOT NULL, name_category VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE drinks (id INT AUTO_INCREMENT NOT NULL, category_drinks_id INT DEFAULT NULL, name_drink VARCHAR(50) NOT NULL, detail_drink VARCHAR(150) DEFAULT NULL, price_drink NUMERIC(5, 2) NOT NULL, INDEX IDX_EAD79309EC2BB2CB (category_drinks_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE drinks ADD CONSTRAINT FK_EAD79309EC2BB2CB FOREIGN KEY (category_drinks_id) REFERENCES category_drinks (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE drinks DROP FOREIGN KEY FK_EAD79309EC2BB2CB');
        $this->addSql('DROP TABLE category_drinks');
        $this->addSql('DROP TABLE drinks');
    }
}
