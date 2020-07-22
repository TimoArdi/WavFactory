<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722222127 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE instrumental_member');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE instrumental_member (instrumental_id INT NOT NULL, member_id INT NOT NULL, INDEX IDX_B18713597597D3FE (member_id), INDEX IDX_B18713593A3ECA (instrumental_id), PRIMARY KEY(instrumental_id, member_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE instrumental_member ADD CONSTRAINT FK_B18713593A3ECA FOREIGN KEY (instrumental_id) REFERENCES instrumental (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE instrumental_member ADD CONSTRAINT FK_B18713597597D3FE FOREIGN KEY (member_id) REFERENCES member (id) ON DELETE CASCADE');
    }
}
