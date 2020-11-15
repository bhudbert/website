<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201115173818 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE text_block_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE text_block (id INT NOT NULL, post_id INT NOT NULL, name VARCHAR(255) NOT NULL, content TEXT NOT NULL, published BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D5AF2D7F4B89032C ON text_block (post_id)');
        $this->addSql('ALTER TABLE text_block ADD CONSTRAINT FK_D5AF2D7F4B89032C FOREIGN KEY (post_id) REFERENCES posts (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pages RENAME COLUMN content TO description');
        $this->addSql('ALTER TABLE posts DROP content');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE text_block_id_seq CASCADE');
        $this->addSql('DROP TABLE text_block');
        $this->addSql('ALTER TABLE pages RENAME COLUMN description TO content');
        $this->addSql('ALTER TABLE posts ADD content TEXT DEFAULT NULL');
    }
}
