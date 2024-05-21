<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240521094536 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE genre_artist (genre_id INT NOT NULL, artist_id INT NOT NULL, INDEX IDX_EAEAA6A74296D31F (genre_id), INDEX IDX_EAEAA6A7B7970CF8 (artist_id), PRIMARY KEY(genre_id, artist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE genre_artist ADD CONSTRAINT FK_EAEAA6A74296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE genre_artist ADD CONSTRAINT FK_EAEAA6A7B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE slot ADD artist_id INT NOT NULL, ADD stage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE slot ADD CONSTRAINT FK_AC0E2067B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id)');
        $this->addSql('ALTER TABLE slot ADD CONSTRAINT FK_AC0E20672298D193 FOREIGN KEY (stage_id) REFERENCES stage (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AC0E2067B7970CF8 ON slot (artist_id)');
        $this->addSql('CREATE INDEX IDX_AC0E20672298D193 ON slot (stage_id)');
        $this->addSql('ALTER TABLE ticket ADD durations_id INT NOT NULL, ADD festival_goer_category_id INT NOT NULL');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA36F4E5E44 FOREIGN KEY (durations_id) REFERENCES duration (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA310DEF81D FOREIGN KEY (festival_goer_category_id) REFERENCES festival_goer_category (id)');
        $this->addSql('CREATE INDEX IDX_97A0ADA36F4E5E44 ON ticket (durations_id)');
        $this->addSql('CREATE INDEX IDX_97A0ADA310DEF81D ON ticket (festival_goer_category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE genre_artist DROP FOREIGN KEY FK_EAEAA6A74296D31F');
        $this->addSql('ALTER TABLE genre_artist DROP FOREIGN KEY FK_EAEAA6A7B7970CF8');
        $this->addSql('DROP TABLE genre_artist');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA36F4E5E44');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA310DEF81D');
        $this->addSql('DROP INDEX IDX_97A0ADA36F4E5E44 ON ticket');
        $this->addSql('DROP INDEX IDX_97A0ADA310DEF81D ON ticket');
        $this->addSql('ALTER TABLE ticket DROP durations_id, DROP festival_goer_category_id');
        $this->addSql('ALTER TABLE slot DROP FOREIGN KEY FK_AC0E2067B7970CF8');
        $this->addSql('ALTER TABLE slot DROP FOREIGN KEY FK_AC0E20672298D193');
        $this->addSql('DROP INDEX UNIQ_AC0E2067B7970CF8 ON slot');
        $this->addSql('DROP INDEX IDX_AC0E20672298D193 ON slot');
        $this->addSql('ALTER TABLE slot DROP artist_id, DROP stage_id');
    }
}
