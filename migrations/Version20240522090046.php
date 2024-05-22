<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240522090046 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA310DEF81D');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA36F4E5E44');
        $this->addSql('ALTER TABLE fee_ticket ADD CONSTRAINT FK_4273E32B8FDC0E9A FOREIGN KEY (tickets_id) REFERENCES ticket (id)');
        $this->addSql('ALTER TABLE fee_ticket ADD CONSTRAINT FK_4273E32BAB45AECA FOREIGN KEY (fee_id) REFERENCES fee (id)');
        $this->addSql('DROP INDEX IDX_97A0ADA36F4E5E44 ON ticket');
        $this->addSql('DROP INDEX IDX_97A0ADA310DEF81D ON ticket');
        $this->addSql('ALTER TABLE ticket ADD start_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD end_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP durations_id, DROP festival_goer_category_id, CHANGE quantity quantity INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fee_ticket DROP FOREIGN KEY FK_4273E32B8FDC0E9A');
        $this->addSql('ALTER TABLE fee_ticket DROP FOREIGN KEY FK_4273E32BAB45AECA');
    }
}
