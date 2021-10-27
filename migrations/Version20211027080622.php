<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211027080622 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tareas DROP FOREIGN KEY FK_BFE3AB357EB2C349');
        $this->addSql('DROP INDEX IDX_BFE3AB357EB2C349 ON tareas');
        $this->addSql('ALTER TABLE tareas DROP id_usuario_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tareas ADD id_usuario_id INT NOT NULL');
        $this->addSql('ALTER TABLE tareas ADD CONSTRAINT FK_BFE3AB357EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES usuarios (id)');
        $this->addSql('CREATE INDEX IDX_BFE3AB357EB2C349 ON tareas (id_usuario_id)');
    }
}
