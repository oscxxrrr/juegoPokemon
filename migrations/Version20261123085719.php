<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261123085719 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pokedex (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE pokemon (id INT AUTO_INCREMENT NOT NULL, combat_points INT NOT NULL, trainer_id INT NOT NULL, pokedex_id INT NOT NULL, INDEX IDX_62DC90F3FB08EDF6 (trainer_id), INDEX IDX_62DC90F3372A5D14 (pokedex_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME (username), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE pokemon ADD CONSTRAINT FK_62DC90F3FB08EDF6 FOREIGN KEY (trainer_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE pokemon ADD CONSTRAINT FK_62DC90F3372A5D14 FOREIGN KEY (pokedex_id) REFERENCES pokedex (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pokemon DROP FOREIGN KEY FK_62DC90F3FB08EDF6');
        $this->addSql('ALTER TABLE pokemon DROP FOREIGN KEY FK_62DC90F3372A5D14');
        $this->addSql('DROP TABLE pokedex');
        $this->addSql('DROP TABLE pokemon');
        $this->addSql('DROP TABLE `user`');
    }
}
