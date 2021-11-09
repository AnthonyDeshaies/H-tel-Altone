<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211109142530 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE first_name');
        $this->addSql('ALTER TABLE dishes ADD restaurant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE dishes ADD CONSTRAINT FK_584DD35DB1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('CREATE INDEX IDX_584DD35DB1E7706E ON dishes (restaurant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE first_name (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE dishes DROP FOREIGN KEY FK_584DD35DB1E7706E');
        $this->addSql('DROP INDEX IDX_584DD35DB1E7706E ON dishes');
        $this->addSql('ALTER TABLE dishes DROP restaurant_id');
    }
}
