<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200923130132 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE categories_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE files_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE galleries_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE pages_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE posts_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE projects_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tags_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE technologies_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE trainings_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE categories (id INT NOT NULL, name VARCHAR(35) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE files (id INT NOT NULL, name VARCHAR(100) NOT NULL, link VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE galleries (id INT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE gallery_file (gallery_id INT NOT NULL, file_id INT NOT NULL, PRIMARY KEY(gallery_id, file_id))');
        $this->addSql('CREATE INDEX IDX_1F801E9C4E7AF8F ON gallery_file (gallery_id)');
        $this->addSql('CREATE INDEX IDX_1F801E9C93CB796C ON gallery_file (file_id)');
        $this->addSql('CREATE TABLE pages (id INT NOT NULL, name VARCHAR(50) NOT NULL, slug VARCHAR(150) NOT NULL, content TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE page_technology (page_id INT NOT NULL, technology_id INT NOT NULL, PRIMARY KEY(page_id, technology_id))');
        $this->addSql('CREATE INDEX IDX_FF8363D3C4663E4 ON page_technology (page_id)');
        $this->addSql('CREATE INDEX IDX_FF8363D34235D463 ON page_technology (technology_id)');
        $this->addSql('CREATE TABLE page_gallery (page_id INT NOT NULL, gallery_id INT NOT NULL, PRIMARY KEY(page_id, gallery_id))');
        $this->addSql('CREATE INDEX IDX_BD4B93AFC4663E4 ON page_gallery (page_id)');
        $this->addSql('CREATE INDEX IDX_BD4B93AF4E7AF8F ON page_gallery (gallery_id)');
        $this->addSql('CREATE TABLE posts (id INT NOT NULL, name VARCHAR(150) NOT NULL, title VARCHAR(200) NOT NULL, slug VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, content TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE post_category (post_id INT NOT NULL, category_id INT NOT NULL, PRIMARY KEY(post_id, category_id))');
        $this->addSql('CREATE INDEX IDX_B9A190604B89032C ON post_category (post_id)');
        $this->addSql('CREATE INDEX IDX_B9A1906012469DE2 ON post_category (category_id)');
        $this->addSql('CREATE TABLE projects (id INT NOT NULL, name VARCHAR(100) NOT NULL, description TEXT NOT NULL, summary TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE tags (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE technologies (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE trainings (id INT NOT NULL, name VARCHAR(120) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE users (id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(100) DEFAULT \'firstname\' NOT NULL, name VARCHAR(100) DEFAULT \'name\' NOT NULL, email VARCHAR(150) DEFAULT \'firstname.name@domain.com\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9F85E0677 ON users (username)');
        $this->addSql('ALTER TABLE gallery_file ADD CONSTRAINT FK_1F801E9C4E7AF8F FOREIGN KEY (gallery_id) REFERENCES galleries (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE gallery_file ADD CONSTRAINT FK_1F801E9C93CB796C FOREIGN KEY (file_id) REFERENCES files (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE page_technology ADD CONSTRAINT FK_FF8363D3C4663E4 FOREIGN KEY (page_id) REFERENCES pages (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE page_technology ADD CONSTRAINT FK_FF8363D34235D463 FOREIGN KEY (technology_id) REFERENCES technologies (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE page_gallery ADD CONSTRAINT FK_BD4B93AFC4663E4 FOREIGN KEY (page_id) REFERENCES pages (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE page_gallery ADD CONSTRAINT FK_BD4B93AF4E7AF8F FOREIGN KEY (gallery_id) REFERENCES galleries (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE post_category ADD CONSTRAINT FK_B9A190604B89032C FOREIGN KEY (post_id) REFERENCES posts (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE post_category ADD CONSTRAINT FK_B9A1906012469DE2 FOREIGN KEY (category_id) REFERENCES categories (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE post_category DROP CONSTRAINT FK_B9A1906012469DE2');
        $this->addSql('ALTER TABLE gallery_file DROP CONSTRAINT FK_1F801E9C93CB796C');
        $this->addSql('ALTER TABLE gallery_file DROP CONSTRAINT FK_1F801E9C4E7AF8F');
        $this->addSql('ALTER TABLE page_gallery DROP CONSTRAINT FK_BD4B93AF4E7AF8F');
        $this->addSql('ALTER TABLE page_technology DROP CONSTRAINT FK_FF8363D3C4663E4');
        $this->addSql('ALTER TABLE page_gallery DROP CONSTRAINT FK_BD4B93AFC4663E4');
        $this->addSql('ALTER TABLE post_category DROP CONSTRAINT FK_B9A190604B89032C');
        $this->addSql('ALTER TABLE page_technology DROP CONSTRAINT FK_FF8363D34235D463');
        $this->addSql('DROP SEQUENCE categories_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE files_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE galleries_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE pages_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE posts_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE projects_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tags_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE technologies_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE trainings_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE users_id_seq CASCADE');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE files');
        $this->addSql('DROP TABLE galleries');
        $this->addSql('DROP TABLE gallery_file');
        $this->addSql('DROP TABLE pages');
        $this->addSql('DROP TABLE page_technology');
        $this->addSql('DROP TABLE page_gallery');
        $this->addSql('DROP TABLE posts');
        $this->addSql('DROP TABLE post_category');
        $this->addSql('DROP TABLE projects');
        $this->addSql('DROP TABLE tags');
        $this->addSql('DROP TABLE technologies');
        $this->addSql('DROP TABLE trainings');
        $this->addSql('DROP TABLE users');
    }
}
