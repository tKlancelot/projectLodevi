<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200920200623 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE garage (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, garage_name VARCHAR(255) NOT NULL, garage_adress VARCHAR(255) NOT NULL, postal_code VARCHAR(8) NOT NULL, siret_number VARCHAR(14) NOT NULL, INDEX IDX_9F26610BA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, brand_label VARCHAR(255) NOT NULL, brand_logo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_model (id INT AUTO_INCREMENT NOT NULL, brand_id INT DEFAULT NULL, model_name VARCHAR(255) NOT NULL, INDEX IDX_83EF70E44F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE advert (id INT AUTO_INCREMENT NOT NULL, car_model_id INT DEFAULT NULL, garage_id INT DEFAULT NULL, reference VARCHAR(8) NOT NULL, price DOUBLE PRECISION NOT NULL, description LONGTEXT NOT NULL, mileage INT NOT NULL, fuel_type VARCHAR(255) NOT NULL, release_year DATE NOT NULL, publication_date DATE NOT NULL, picture VARCHAR(255) DEFAULT NULL, INDEX IDX_54F1F40BF64382E3 (car_model_id), INDEX IDX_54F1F40BC4FFF555 (garage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE car_model ADD CONSTRAINT FK_83EF70E44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE advert ADD CONSTRAINT FK_54F1F40BF64382E3 FOREIGN KEY (car_model_id) REFERENCES car_model (id)');
        $this->addSql('ALTER TABLE advert ADD CONSTRAINT FK_54F1F40BC4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_model DROP FOREIGN KEY FK_83EF70E44F5D008');
        $this->addSql('ALTER TABLE advert DROP FOREIGN KEY FK_54F1F40BF64382E3');
        $this->addSql('ALTER TABLE advert DROP FOREIGN KEY FK_54F1F40BC4FFF555');
        $this->addSql('ALTER TABLE garage DROP FOREIGN KEY FK_9F26610BA76ED395');
        $this->addSql('DROP TABLE advert');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE car_model');
        $this->addSql('DROP TABLE garage');
        $this->addSql('DROP TABLE user');
    }
}
