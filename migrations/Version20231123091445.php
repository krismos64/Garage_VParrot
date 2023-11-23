<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231123091445 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car_image (id INT AUTO_INCREMENT NOT NULL, car_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_1A968188C3C6F69F (car_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car_image ADD CONSTRAINT FK_1A968188C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE car DROP images, DROP image_path, CHANGE brand brand VARCHAR(255) NOT NULL, CHANGE model model VARCHAR(255) NOT NULL, CHANGE year year VARCHAR(255) NOT NULL, CHANGE km km VARCHAR(6) NOT NULL, CHANGE price price VARCHAR(10) NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE name name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_image DROP FOREIGN KEY FK_1A968188C3C6F69F');
        $this->addSql('DROP TABLE car_image');
        $this->addSql('ALTER TABLE car ADD images JSON DEFAULT NULL, ADD image_path VARCHAR(255) DEFAULT NULL, CHANGE brand brand VARCHAR(255) DEFAULT NULL, CHANGE model model VARCHAR(255) DEFAULT NULL, CHANGE year year VARCHAR(255) DEFAULT NULL, CHANGE km km VARCHAR(6) DEFAULT NULL, CHANGE price price VARCHAR(10) DEFAULT NULL, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE name name VARCHAR(255) DEFAULT NULL');
    }
}
