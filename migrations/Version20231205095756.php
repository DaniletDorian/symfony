<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231205095756 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE episode_season (episode_id INT NOT NULL, season_id INT NOT NULL, INDEX IDX_9CD9C4B2362B62A0 (episode_id), INDEX IDX_9CD9C4B24EC001D1 (season_id), PRIMARY KEY(episode_id, season_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE season_category (season_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_8ABA1C9B4EC001D1 (season_id), INDEX IDX_8ABA1C9B12469DE2 (category_id), PRIMARY KEY(season_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE season_program (season_id INT NOT NULL, program_id INT NOT NULL, INDEX IDX_B794DEDA4EC001D1 (season_id), INDEX IDX_B794DEDA3EB8070A (program_id), PRIMARY KEY(season_id, program_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE episode_season ADD CONSTRAINT FK_9CD9C4B2362B62A0 FOREIGN KEY (episode_id) REFERENCES episode (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE episode_season ADD CONSTRAINT FK_9CD9C4B24EC001D1 FOREIGN KEY (season_id) REFERENCES season (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE season_category ADD CONSTRAINT FK_8ABA1C9B4EC001D1 FOREIGN KEY (season_id) REFERENCES season (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE season_category ADD CONSTRAINT FK_8ABA1C9B12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE season_program ADD CONSTRAINT FK_B794DEDA4EC001D1 FOREIGN KEY (season_id) REFERENCES season (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE season_program ADD CONSTRAINT FK_B794DEDA3EB8070A FOREIGN KEY (program_id) REFERENCES program (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE episode DROP season_id');
        $this->addSql('ALTER TABLE season DROP program_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE episode_season DROP FOREIGN KEY FK_9CD9C4B2362B62A0');
        $this->addSql('ALTER TABLE episode_season DROP FOREIGN KEY FK_9CD9C4B24EC001D1');
        $this->addSql('ALTER TABLE season_category DROP FOREIGN KEY FK_8ABA1C9B4EC001D1');
        $this->addSql('ALTER TABLE season_category DROP FOREIGN KEY FK_8ABA1C9B12469DE2');
        $this->addSql('ALTER TABLE season_program DROP FOREIGN KEY FK_B794DEDA4EC001D1');
        $this->addSql('ALTER TABLE season_program DROP FOREIGN KEY FK_B794DEDA3EB8070A');
        $this->addSql('DROP TABLE episode_season');
        $this->addSql('DROP TABLE season_category');
        $this->addSql('DROP TABLE season_program');
        $this->addSql('ALTER TABLE episode ADD season_id INT NOT NULL');
        $this->addSql('ALTER TABLE season ADD program_id INT NOT NULL');
    }
}
