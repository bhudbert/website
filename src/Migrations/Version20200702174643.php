<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200702174643 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP SEQUENCE users_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE category_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE page_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tag_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE catrgories_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE file_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE projects_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE gallery_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE training_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE page (id INT NOT NULL, name VARCHAR(50) NOT NULL, slug VARCHAR(150) NOT NULL, content TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE page_technology (page_id INT NOT NULL, technology_id INT NOT NULL, PRIMARY KEY(page_id, technology_id))');
        $this->addSql('CREATE INDEX IDX_FF8363D3C4663E4 ON page_technology (page_id)');
        $this->addSql('CREATE INDEX IDX_FF8363D34235D463 ON page_technology (technology_id)');
        $this->addSql('CREATE TABLE page_gallery (page_id INT NOT NULL, gallery_id INT NOT NULL, PRIMARY KEY(page_id, gallery_id))');
        $this->addSql('CREATE INDEX IDX_BD4B93AFC4663E4 ON page_gallery (page_id)');
        $this->addSql('CREATE INDEX IDX_BD4B93AF4E7AF8F ON page_gallery (gallery_id)');
        $this->addSql('CREATE TABLE tag (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE catrgories (id INT NOT NULL, name VARCHAR(35) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON "user" (username)');
        $this->addSql('CREATE TABLE file (id INT NOT NULL, name VARCHAR(100) NOT NULL, link VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE projects (id INT NOT NULL, name VARCHAR(100) NOT NULL, description TEXT NOT NULL, summary TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE gallery (id INT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE gallery_file (gallery_id INT NOT NULL, file_id INT NOT NULL, PRIMARY KEY(gallery_id, file_id))');
        $this->addSql('CREATE INDEX IDX_1F801E9C4E7AF8F ON gallery_file (gallery_id)');
        $this->addSql('CREATE INDEX IDX_1F801E9C93CB796C ON gallery_file (file_id)');
        $this->addSql('CREATE TABLE training (id INT NOT NULL, name VARCHAR(120) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE page_technology ADD CONSTRAINT FK_FF8363D3C4663E4 FOREIGN KEY (page_id) REFERENCES page (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE page_technology ADD CONSTRAINT FK_FF8363D34235D463 FOREIGN KEY (technology_id) REFERENCES technology (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE page_gallery ADD CONSTRAINT FK_BD4B93AFC4663E4 FOREIGN KEY (page_id) REFERENCES page (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE page_gallery ADD CONSTRAINT FK_BD4B93AF4E7AF8F FOREIGN KEY (gallery_id) REFERENCES gallery (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE gallery_file ADD CONSTRAINT FK_1F801E9C4E7AF8F FOREIGN KEY (gallery_id) REFERENCES gallery (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE gallery_file ADD CONSTRAINT FK_1F801E9C93CB796C FOREIGN KEY (file_id) REFERENCES file (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE category');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE page_technology DROP CONSTRAINT FK_FF8363D3C4663E4');
        $this->addSql('ALTER TABLE page_gallery DROP CONSTRAINT FK_BD4B93AFC4663E4');
        $this->addSql('ALTER TABLE gallery_file DROP CONSTRAINT FK_1F801E9C93CB796C');
        $this->addSql('ALTER TABLE page_gallery DROP CONSTRAINT FK_BD4B93AF4E7AF8F');
        $this->addSql('ALTER TABLE gallery_file DROP CONSTRAINT FK_1F801E9C4E7AF8F');
        $this->addSql('DROP SEQUENCE page_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tag_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE catrgories_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE file_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE projects_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE gallery_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE training_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE users (id INT NOT NULL, name VARCHAR(35) NOT NULL, firstname VARCHAR(45) NOT NULL, username VARCHAR(45) NOT NULL, email VARCHAR(100) NOT NULL, password VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE category (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE page_technology');
        $this->addSql('DROP TABLE page_gallery');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE catrgories');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE file');
        $this->addSql('DROP TABLE projects');
        $this->addSql('DROP TABLE gallery');
        $this->addSql('DROP TABLE gallery_file');
        $this->addSql('DROP TABLE training');
    }
}
