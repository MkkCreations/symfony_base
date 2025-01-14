<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231123083906 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE burger DROP FOREIGN KEY FK_EFE35A0DBA9CD190');
        $this->addSql('DROP INDEX UNIQ_EFE35A0DBA9CD190 ON burger');
        $this->addSql('ALTER TABLE burger DROP commentaire_id');
        $this->addSql('ALTER TABLE commentaire DROP INDEX UNIQ_67F068BC17CE5090, ADD INDEX IDX_67F068BC17CE5090 (burger_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE burger ADD commentaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE burger ADD CONSTRAINT FK_EFE35A0DBA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EFE35A0DBA9CD190 ON burger (commentaire_id)');
        $this->addSql('ALTER TABLE commentaire DROP INDEX IDX_67F068BC17CE5090, ADD UNIQUE INDEX UNIQ_67F068BC17CE5090 (burger_id)');
    }
}
