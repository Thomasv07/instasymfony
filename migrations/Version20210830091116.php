<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210830091116 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, id_users_id INT DEFAULT NULL, id_post_id INT DEFAULT NULL, comments VARCHAR(255) NOT NULL, date DATE NOT NULL, INDEX IDX_5F9E962A376858A8 (id_users_id), INDEX IDX_5F9E962A9514AA5C (id_post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `like` (id INT AUTO_INCREMENT NOT NULL, id_users_id INT NOT NULL, id_comments_id INT DEFAULT NULL, id_post_id INT DEFAULT NULL, INDEX IDX_AC6340B3376858A8 (id_users_id), INDEX IDX_AC6340B37B255871 (id_comments_id), INDEX IDX_AC6340B39514AA5C (id_post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, id_users_id INT DEFAULT NULL, tags_post_id INT DEFAULT NULL, locations VARCHAR(255) DEFAULT NULL, url_post VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_5A8A6C8D376858A8 (id_users_id), INDEX IDX_5A8A6C8D6D35E83D (tags_post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE save (id INT AUTO_INCREMENT NOT NULL, id_post_id INT DEFAULT NULL, id_users_id INT DEFAULT NULL, INDEX IDX_55663ADE9514AA5C (id_post_id), INDEX IDX_55663ADE376858A8 (id_users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tags (id INT AUTO_INCREMENT NOT NULL, tags_post_id INT NOT NULL, tags VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_6FBC94266D35E83D (tags_post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tags_post (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, pictures VARCHAR(255) DEFAULT NULL, bio VARCHAR(255) DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A376858A8 FOREIGN KEY (id_users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A9514AA5C FOREIGN KEY (id_post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B3376858A8 FOREIGN KEY (id_users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B37B255871 FOREIGN KEY (id_comments_id) REFERENCES comments (id)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B39514AA5C FOREIGN KEY (id_post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D376858A8 FOREIGN KEY (id_users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D6D35E83D FOREIGN KEY (tags_post_id) REFERENCES tags_post (id)');
        $this->addSql('ALTER TABLE save ADD CONSTRAINT FK_55663ADE9514AA5C FOREIGN KEY (id_post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE save ADD CONSTRAINT FK_55663ADE376858A8 FOREIGN KEY (id_users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE tags ADD CONSTRAINT FK_6FBC94266D35E83D FOREIGN KEY (tags_post_id) REFERENCES tags_post (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B37B255871');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A9514AA5C');
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B39514AA5C');
        $this->addSql('ALTER TABLE save DROP FOREIGN KEY FK_55663ADE9514AA5C');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D6D35E83D');
        $this->addSql('ALTER TABLE tags DROP FOREIGN KEY FK_6FBC94266D35E83D');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A376858A8');
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B3376858A8');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D376858A8');
        $this->addSql('ALTER TABLE save DROP FOREIGN KEY FK_55663ADE376858A8');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE `like`');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE save');
        $this->addSql('DROP TABLE tags');
        $this->addSql('DROP TABLE tags_post');
        $this->addSql('DROP TABLE users');
    }
}
