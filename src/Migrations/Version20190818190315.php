<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190818190315 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE employees DROP FOREIGN KEY fk_position_id');
        $this->addSql('DROP INDEX fk_position_id ON employees');
        $this->addSql('ALTER TABLE employees DROP position_id, CHANGE patronymic patronymic INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE employees ADD position_id INT DEFAULT NULL, CHANGE patronymic patronymic VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE employees ADD CONSTRAINT fk_position_id FOREIGN KEY (position_id) REFERENCES positions (id)');
        $this->addSql('CREATE INDEX fk_position_id ON employees (position_id)');
    }
}
