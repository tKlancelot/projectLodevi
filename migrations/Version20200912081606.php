<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200912081606 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE advert (id INT AUTO_INCREMENT NOT NULL, car_model_id INT DEFAULT NULL, reference VARCHAR(8) NOT NULL, price NUMERIC(8, 2) NOT NULL, description LONGTEXT NOT NULL, mileage INT NOT NULL, fuel_type VARCHAR(255) NOT NULL, release_year DATE NOT NULL, publication_date DATE NOT NULL, INDEX IDX_54F1F40BF64382E3 (car_model_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE advert ADD CONSTRAINT FK_54F1F40BF64382E3 FOREIGN KEY (car_model_id) REFERENCES car_model (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE advert');
    }
}
