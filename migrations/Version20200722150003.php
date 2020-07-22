<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722150003 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE instrumental (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, bpm INT NOT NULL, link VARCHAR(255) NOT NULL, author VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE instrumental_member (instrumental_id INT NOT NULL, member_id INT NOT NULL, INDEX IDX_B18713593A3ECA (instrumental_id), INDEX IDX_B18713597597D3FE (member_id), PRIMARY KEY(instrumental_id, member_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE online (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, link VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE instrumental_member ADD CONSTRAINT FK_B18713593A3ECA FOREIGN KEY (instrumental_id) REFERENCES instrumental (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE instrumental_member ADD CONSTRAINT FK_B18713597597D3FE FOREIGN KEY (member_id) REFERENCES member (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE instrumental_member DROP FOREIGN KEY FK_B18713593A3ECA');
        $this->addSql('ALTER TABLE instrumental_member DROP FOREIGN KEY FK_B18713597597D3FE');
        $this->addSql('DROP TABLE instrumental');
        $this->addSql('DROP TABLE instrumental_member');
        $this->addSql('DROP TABLE member');
        $this->addSql('DROP TABLE online');
    }
}
