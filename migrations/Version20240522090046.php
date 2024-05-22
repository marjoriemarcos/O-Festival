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
        $this->addSql('DROP TABLE festival_goer_category');
        $this->addSql('DROP TABLE duration');
        $this->addSql('ALTER TABLE fee_ticket ADD CONSTRAINT FK_4273E32B8FDC0E9A FOREIGN KEY (tickets_id) REFERENCES ticket (id)');
        $this->addSql('ALTER TABLE fee_ticket ADD CONSTRAINT FK_4273E32BAB45AECA FOREIGN KEY (fee_id) REFERENCES fee (id)');
        $this->addSql('DROP INDEX IDX_97A0ADA36F4E5E44 ON ticket');
        $this->addSql('DROP INDEX IDX_97A0ADA310DEF81D ON ticket');
        $this->addSql('ALTER TABLE ticket ADD start_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD end_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP durations_id, DROP festival_goer_category_id, CHANGE quantity quantity INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE festival_goer_category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(64) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE duration (id INT AUTO_INCREMENT NOT NULL, day_quantity INT NOT NULL, day_name VARCHAR(64) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE fee_ticket DROP FOREIGN KEY FK_4273E32B8FDC0E9A');
        $this->addSql('ALTER TABLE fee_ticket DROP FOREIGN KEY FK_4273E32BAB45AECA');
        $this->addSql('ALTER TABLE ticket ADD durations_id INT NOT NULL, ADD festival_goer_category_id INT NOT NULL, DROP start_at, DROP end_at, CHANGE quantity quantity INT NOT NULL');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA310DEF81D FOREIGN KEY (festival_goer_category_id) REFERENCES festival_goer_category (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA36F4E5E44 FOREIGN KEY (durations_id) REFERENCES duration (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_97A0ADA36F4E5E44 ON ticket (durations_id)');
        $this->addSql('CREATE INDEX IDX_97A0ADA310DEF81D ON ticket (festival_goer_category_id)');
    }
}
