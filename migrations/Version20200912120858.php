<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200912120858 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE advert ADD garage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE advert ADD CONSTRAINT FK_54F1F40BC4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('CREATE INDEX IDX_54F1F40BC4FFF555 ON advert (garage_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE advert DROP FOREIGN KEY FK_54F1F40BC4FFF555');
        $this->addSql('DROP INDEX IDX_54F1F40BC4FFF555 ON advert');
        $this->addSql('ALTER TABLE advert DROP garage_id');
    }
}
