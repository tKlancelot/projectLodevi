<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200923055019 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fuel_type (id INT AUTO_INCREMENT NOT NULL, fuel_type_label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE advert ADD fuel_type_id INT DEFAULT NULL, DROP fuel_type');
        $this->addSql('ALTER TABLE advert ADD CONSTRAINT FK_54F1F40B6A70FE35 FOREIGN KEY (fuel_type_id) REFERENCES fuel_type (id)');
        $this->addSql('CREATE INDEX IDX_54F1F40B6A70FE35 ON advert (fuel_type_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE advert DROP FOREIGN KEY FK_54F1F40B6A70FE35');
        $this->addSql('DROP TABLE fuel_type');
        $this->addSql('DROP INDEX IDX_54F1F40B6A70FE35 ON advert');
        $this->addSql('ALTER TABLE advert ADD fuel_type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP fuel_type_id');
    }
}
