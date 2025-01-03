<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250103101409 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE building_supplier (building_id INT NOT NULL, supplier_id INT NOT NULL, INDEX IDX_40A66D254D2A7E12 (building_id), INDEX IDX_40A66D252ADD6D8C (supplier_id), PRIMARY KEY(building_id, supplier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprety_user (proprety_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_2C547EF9E838838F (proprety_id), INDEX IDX_2C547EF9A76ED395 (user_id), PRIMARY KEY(proprety_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE supplier_activity (supplier_id INT NOT NULL, activity_id INT NOT NULL, INDEX IDX_21FD61DB2ADD6D8C (supplier_id), INDEX IDX_21FD61DB81C06096 (activity_id), PRIMARY KEY(supplier_id, activity_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE building_supplier ADD CONSTRAINT FK_40A66D254D2A7E12 FOREIGN KEY (building_id) REFERENCES building (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE building_supplier ADD CONSTRAINT FK_40A66D252ADD6D8C FOREIGN KEY (supplier_id) REFERENCES supplier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proprety_user ADD CONSTRAINT FK_2C547EF9E838838F FOREIGN KEY (proprety_id) REFERENCES proprety (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proprety_user ADD CONSTRAINT FK_2C547EF9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE supplier_activity ADD CONSTRAINT FK_21FD61DB2ADD6D8C FOREIGN KEY (supplier_id) REFERENCES supplier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE supplier_activity ADD CONSTRAINT FK_21FD61DB81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proprety ADD type_id INT DEFAULT NULL, ADD building_id INT NOT NULL');
        $this->addSql('ALTER TABLE proprety ADD CONSTRAINT FK_5F55C60DC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE proprety ADD CONSTRAINT FK_5F55C60D4D2A7E12 FOREIGN KEY (building_id) REFERENCES building (id)');
        $this->addSql('CREATE INDEX IDX_5F55C60DC54C8C93 ON proprety (type_id)');
        $this->addSql('CREATE INDEX IDX_5F55C60D4D2A7E12 ON proprety (building_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE building_supplier DROP FOREIGN KEY FK_40A66D254D2A7E12');
        $this->addSql('ALTER TABLE building_supplier DROP FOREIGN KEY FK_40A66D252ADD6D8C');
        $this->addSql('ALTER TABLE proprety_user DROP FOREIGN KEY FK_2C547EF9E838838F');
        $this->addSql('ALTER TABLE proprety_user DROP FOREIGN KEY FK_2C547EF9A76ED395');
        $this->addSql('ALTER TABLE supplier_activity DROP FOREIGN KEY FK_21FD61DB2ADD6D8C');
        $this->addSql('ALTER TABLE supplier_activity DROP FOREIGN KEY FK_21FD61DB81C06096');
        $this->addSql('DROP TABLE building_supplier');
        $this->addSql('DROP TABLE proprety_user');
        $this->addSql('DROP TABLE supplier_activity');
        $this->addSql('ALTER TABLE proprety DROP FOREIGN KEY FK_5F55C60DC54C8C93');
        $this->addSql('ALTER TABLE proprety DROP FOREIGN KEY FK_5F55C60D4D2A7E12');
        $this->addSql('DROP INDEX IDX_5F55C60DC54C8C93 ON proprety');
        $this->addSql('DROP INDEX IDX_5F55C60D4D2A7E12 ON proprety');
        $this->addSql('ALTER TABLE proprety DROP type_id, DROP building_id');
    }
}
