<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211014074841 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rooms DROP FOREIGN KEY FK_7CA11A967C361F66');
        $this->addSql('DROP INDEX IDX_7CA11A967C361F66 ON rooms');
        $this->addSql('ALTER TABLE rooms DROP type_room_id, DROP type_room');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rooms ADD type_room_id INT DEFAULT NULL, ADD type_room VARCHAR(55) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE rooms ADD CONSTRAINT FK_7CA11A967C361F66 FOREIGN KEY (type_room_id) REFERENCES type_room (id)');
        $this->addSql('CREATE INDEX IDX_7CA11A967C361F66 ON rooms (type_room_id)');
    }
}
