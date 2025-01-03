<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250103102426 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proprety DROP FOREIGN KEY FK_5F55C60D4D2A7E12');
        $this->addSql('DROP INDEX IDX_5F55C60D4D2A7E12 ON proprety');
        $this->addSql('ALTER TABLE proprety DROP building_id, DROP id_building');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proprety ADD building_id INT NOT NULL, ADD id_building INT NOT NULL');
        $this->addSql('ALTER TABLE proprety ADD CONSTRAINT FK_5F55C60D4D2A7E12 FOREIGN KEY (building_id) REFERENCES building (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_5F55C60D4D2A7E12 ON proprety (building_id)');
    }
}
