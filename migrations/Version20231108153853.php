<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231108153853 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrator (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, administrator_id INT DEFAULT NULL, employee_id INT DEFAULT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, year VARCHAR(5) NOT NULL, km VARCHAR(6) NOT NULL, price VARCHAR(10) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_773DE69D4B09E92C (administrator_id), INDEX IDX_773DE69D8C03F15C (employee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_image (id INT AUTO_INCREMENT NOT NULL, car_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_1A968188C3C6F69F (car_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employee (id INT AUTO_INCREMENT NOT NULL, administrator_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, INDEX IDX_5D9F75A14B09E92C (administrator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messages (id INT AUTO_INCREMENT NOT NULL, administrator_id INT DEFAULT NULL, employee_id INT DEFAULT NULL, customer_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, INDEX IDX_DB021E964B09E92C (administrator_id), INDEX IDX_DB021E968C03F15C (employee_id), INDEX IDX_DB021E969395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reviews (id INT AUTO_INCREMENT NOT NULL, administrator_id INT DEFAULT NULL, employee_id INT DEFAULT NULL, customer_id INT DEFAULT NULL, text LONGTEXT DEFAULT NULL, INDEX IDX_6970EB0F4B09E92C (administrator_id), INDEX IDX_6970EB0F8C03F15C (employee_id), INDEX IDX_6970EB0F9395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schedules (id INT AUTO_INCREMENT NOT NULL, administrator_id INT DEFAULT NULL, day VARCHAR(255) NOT NULL, opening_time VARCHAR(255) NOT NULL, closing_time VARCHAR(255) NOT NULL, INDEX IDX_313BDC8E4B09E92C (administrator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, administrator_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_E19D9AD24B09E92C (administrator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service_image (id INT AUTO_INCREMENT NOT NULL, service_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_6C4FE9B8ED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D4B09E92C FOREIGN KEY (administrator_id) REFERENCES administrator (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D8C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id)');
        $this->addSql('ALTER TABLE car_image ADD CONSTRAINT FK_1A968188C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A14B09E92C FOREIGN KEY (administrator_id) REFERENCES administrator (id)');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E964B09E92C FOREIGN KEY (administrator_id) REFERENCES administrator (id)');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E968C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id)');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E969395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE reviews ADD CONSTRAINT FK_6970EB0F4B09E92C FOREIGN KEY (administrator_id) REFERENCES administrator (id)');
        $this->addSql('ALTER TABLE reviews ADD CONSTRAINT FK_6970EB0F8C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id)');
        $this->addSql('ALTER TABLE reviews ADD CONSTRAINT FK_6970EB0F9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE schedules ADD CONSTRAINT FK_313BDC8E4B09E92C FOREIGN KEY (administrator_id) REFERENCES administrator (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD24B09E92C FOREIGN KEY (administrator_id) REFERENCES administrator (id)');
        $this->addSql('ALTER TABLE service_image ADD CONSTRAINT FK_6C4FE9B8ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D4B09E92C');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D8C03F15C');
        $this->addSql('ALTER TABLE car_image DROP FOREIGN KEY FK_1A968188C3C6F69F');
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A14B09E92C');
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E964B09E92C');
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E968C03F15C');
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E969395C3F3');
        $this->addSql('ALTER TABLE reviews DROP FOREIGN KEY FK_6970EB0F4B09E92C');
        $this->addSql('ALTER TABLE reviews DROP FOREIGN KEY FK_6970EB0F8C03F15C');
        $this->addSql('ALTER TABLE reviews DROP FOREIGN KEY FK_6970EB0F9395C3F3');
        $this->addSql('ALTER TABLE schedules DROP FOREIGN KEY FK_313BDC8E4B09E92C');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD24B09E92C');
        $this->addSql('ALTER TABLE service_image DROP FOREIGN KEY FK_6C4FE9B8ED5CA9E6');
        $this->addSql('DROP TABLE administrator');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE car_image');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE employee');
        $this->addSql('DROP TABLE messages');
        $this->addSql('DROP TABLE reviews');
        $this->addSql('DROP TABLE schedules');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE service_image');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
