<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250104182854 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE supplier CHANGE phone phone VARCHAR(255) NOT NULL, CHANGE tva tva VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE role role JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE supplier CHANGE phone phone INT NOT NULL, CHANGE tva tva INT NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE role role LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
    }
}
