<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211019073336 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE suppliers ADD category_suppliers_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE suppliers ADD CONSTRAINT FK_AC28B95CD9828CD1 FOREIGN KEY (category_suppliers_id) REFERENCES category_suppliers (id)');
        $this->addSql('CREATE INDEX IDX_AC28B95CD9828CD1 ON suppliers (category_suppliers_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE suppliers DROP FOREIGN KEY FK_AC28B95CD9828CD1');
        $this->addSql('DROP INDEX IDX_AC28B95CD9828CD1 ON suppliers');
        $this->addSql('ALTER TABLE suppliers DROP category_suppliers_id');
    }
}
