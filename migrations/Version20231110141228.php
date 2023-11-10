<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231110141228 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reviews DROP FOREIGN KEY FK_6970EB0F4B09E92C');
        $this->addSql('ALTER TABLE reviews DROP FOREIGN KEY FK_6970EB0F8C03F15C');
        $this->addSql('ALTER TABLE reviews DROP FOREIGN KEY FK_6970EB0F9395C3F3');
        $this->addSql('DROP INDEX IDX_6970EB0F4B09E92C ON reviews');
        $this->addSql('DROP INDEX IDX_6970EB0F8C03F15C ON reviews');
        $this->addSql('DROP INDEX IDX_6970EB0F9395C3F3 ON reviews');
        $this->addSql('ALTER TABLE reviews ADD firstname VARCHAR(100) NOT NULL, ADD lastname VARCHAR(100) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD rating INT NOT NULL, ADD message LONGTEXT NOT NULL, ADD published_at DATETIME DEFAULT NULL, ADD is_approved TINYINT(1) NOT NULL, DROP administrator_id, DROP employee_id, DROP customer_id, DROP text');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reviews ADD administrator_id INT DEFAULT NULL, ADD employee_id INT DEFAULT NULL, ADD customer_id INT DEFAULT NULL, ADD text LONGTEXT DEFAULT NULL, DROP firstname, DROP lastname, DROP email, DROP rating, DROP message, DROP published_at, DROP is_approved');
        $this->addSql('ALTER TABLE reviews ADD CONSTRAINT FK_6970EB0F4B09E92C FOREIGN KEY (administrator_id) REFERENCES administrator (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE reviews ADD CONSTRAINT FK_6970EB0F8C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE reviews ADD CONSTRAINT FK_6970EB0F9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_6970EB0F4B09E92C ON reviews (administrator_id)');
        $this->addSql('CREATE INDEX IDX_6970EB0F8C03F15C ON reviews (employee_id)');
        $this->addSql('CREATE INDEX IDX_6970EB0F9395C3F3 ON reviews (customer_id)');
    }
}
