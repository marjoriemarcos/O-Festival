<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240523081520 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE customer_ticket (customer_id INT NOT NULL, ticket_id INT NOT NULL, INDEX IDX_266571F29395C3F3 (customer_id), INDEX IDX_266571F2700047D2 (ticket_id), PRIMARY KEY(customer_id, ticket_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE customer_ticket ADD CONSTRAINT FK_266571F29395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE customer_ticket ADD CONSTRAINT FK_266571F2700047D2 FOREIGN KEY (ticket_id) REFERENCES ticket (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA39395C3F3');
        $this->addSql('DROP INDEX IDX_97A0ADA39395C3F3 ON ticket');
        $this->addSql('ALTER TABLE ticket DROP customer_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer_ticket DROP FOREIGN KEY FK_266571F29395C3F3');
        $this->addSql('ALTER TABLE customer_ticket DROP FOREIGN KEY FK_266571F2700047D2');
        $this->addSql('DROP TABLE customer_ticket');
        $this->addSql('ALTER TABLE ticket ADD customer_id INT NOT NULL');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA39395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_97A0ADA39395C3F3 ON ticket (customer_id)');
    }
}
