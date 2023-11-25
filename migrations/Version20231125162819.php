<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231125162819 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E969395C3F3');
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E96A76ED395');
        $this->addSql('DROP INDEX IDX_DB021E96A76ED395 ON messages');
        $this->addSql('DROP INDEX IDX_DB021E969395C3F3 ON messages');
        $this->addSql('ALTER TABLE messages ADD first_name VARCHAR(100) NOT NULL, ADD last_name VARCHAR(100) NOT NULL, ADD content LONGTEXT NOT NULL, ADD approved TINYINT(1) NOT NULL, ADD phone_number VARCHAR(15) NOT NULL, ADD email VARCHAR(255) NOT NULL, DROP user_id, DROP customer_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE messages ADD user_id INT DEFAULT NULL, ADD customer_id INT DEFAULT NULL, DROP first_name, DROP last_name, DROP content, DROP approved, DROP phone_number, DROP email');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E969395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E96A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_DB021E96A76ED395 ON messages (user_id)');
        $this->addSql('CREATE INDEX IDX_DB021E969395C3F3 ON messages (customer_id)');
    }
}
