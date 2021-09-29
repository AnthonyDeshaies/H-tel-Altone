<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210929102539 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dishes ADD category_dishes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE dishes ADD CONSTRAINT FK_584DD35D673D014A FOREIGN KEY (category_dishes_id) REFERENCES category_dishes (id)');
        $this->addSql('CREATE INDEX IDX_584DD35D673D014A ON dishes (category_dishes_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dishes DROP FOREIGN KEY FK_584DD35D673D014A');
        $this->addSql('DROP INDEX IDX_584DD35D673D014A ON dishes');
        $this->addSql('ALTER TABLE dishes DROP category_dishes_id');
    }
}
