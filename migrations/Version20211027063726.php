<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211027063726 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tareas (id INT AUTO_INCREMENT NOT NULL, id_usuario_id INT NOT NULL, titulo VARCHAR(100) NOT NULL, descripcion LONGTEXT DEFAULT NULL, fecha DATETIME NOT NULL, realizada TINYINT(1) NOT NULL, INDEX IDX_BFE3AB357EB2C349 (id_usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuarios (id INT AUTO_INCREMENT NOT NULL, nombre_usuario VARCHAR(25) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tareas ADD CONSTRAINT FK_BFE3AB357EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES usuarios (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tareas DROP FOREIGN KEY FK_BFE3AB357EB2C349');
        $this->addSql('DROP TABLE tareas');
        $this->addSql('DROP TABLE usuarios');
    }
}
