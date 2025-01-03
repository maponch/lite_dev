<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250102201000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE building (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, address VARCHAR(255) NOT NULL, municipalities VARCHAR(255) NOT NULL, postal_code INT NOT NULL, floor INT NOT NULL, number_of_lot INT NOT NULL, administrator INT NOT NULL, supplier INT DEFAULT NULL, note INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE building_user (building_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_2BB7A11D4D2A7E12 (building_id), INDEX IDX_2BB7A11DA76ED395 (user_id), PRIMARY KEY(building_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE building_user ADD CONSTRAINT FK_2BB7A11D4D2A7E12 FOREIGN KEY (building_id) REFERENCES building (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE building_user ADD CONSTRAINT FK_2BB7A11DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE buidling');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE buidling (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, address VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, municipalities VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, postal_code INT NOT NULL, floor INT NOT NULL, number_of_lot INT NOT NULL, administrator INT NOT NULL, supplier INT DEFAULT NULL, note INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE building_user DROP FOREIGN KEY FK_2BB7A11D4D2A7E12');
        $this->addSql('ALTER TABLE building_user DROP FOREIGN KEY FK_2BB7A11DA76ED395');
        $this->addSql('DROP TABLE building');
        $this->addSql('DROP TABLE building_user');
    }
}
