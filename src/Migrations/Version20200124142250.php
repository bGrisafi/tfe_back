<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200124142250 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE articles (id INT AUTO_INCREMENT NOT NULL, utilisateurs_id INT NOT NULL, titre_fr VARCHAR(255) NOT NULL, titre_en VARCHAR(255) NOT NULL, contenu_fr LONGTEXT NOT NULL, contenu_en LONGTEXT NOT NULL, INDEX IDX_BFDD31681E969C5 (utilisateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artistes (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, bibliographie_fr LONGTEXT DEFAULT NULL, bibliographie_en LONGTEXT DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, categorie_fr VARCHAR(255) NOT NULL, categorie_en VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaires (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, email VARCHAR(255) NOT NULL, commentaire LONGTEXT NOT NULL, INDEX IDX_D9BEC0C47294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expositions (id INT AUTO_INCREMENT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, date_vernissage DATE NOT NULL, nom_fr VARCHAR(255) NOT NULL, nom_en VARCHAR(255) NOT NULL, contenu_fr LONGTEXT NOT NULL, contenu_en LONGTEXT NOT NULL, illustration VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oeuvres (id INT AUTO_INCREMENT NOT NULL, artiste_id INT NOT NULL, categorie_id INT DEFAULT NULL, nom_fr VARCHAR(255) NOT NULL, nom_en VARCHAR(255) NOT NULL, description_fr LONGTEXT DEFAULT NULL, description_en LONGTEXT DEFAULT NULL, illustration VARCHAR(255) NOT NULL, date_ajout DATE NOT NULL, INDEX IDX_413EEE3E21D25844 (artiste_id), INDEX IDX_413EEE3EBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pages (id INT AUTO_INCREMENT NOT NULL, titre_fr VARCHAR(255) NOT NULL, titre_en VARCHAR(255) NOT NULL, contenu_fr LONGTEXT DEFAULT NULL, contenu_en LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sliders (id INT AUTO_INCREMENT NOT NULL, titre_fr VARCHAR(255) NOT NULL, titre_en VARCHAR(255) NOT NULL, contenu_fr LONGTEXT DEFAULT NULL, contenu_en LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, pass VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD31681E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C47294869C FOREIGN KEY (article_id) REFERENCES articles (id)');
        $this->addSql('ALTER TABLE oeuvres ADD CONSTRAINT FK_413EEE3E21D25844 FOREIGN KEY (artiste_id) REFERENCES artistes (id)');
        $this->addSql('ALTER TABLE oeuvres ADD CONSTRAINT FK_413EEE3EBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categories (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C47294869C');
        $this->addSql('ALTER TABLE oeuvres DROP FOREIGN KEY FK_413EEE3E21D25844');
        $this->addSql('ALTER TABLE oeuvres DROP FOREIGN KEY FK_413EEE3EBCF5E72D');
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD31681E969C5');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE artistes');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE commentaires');
        $this->addSql('DROP TABLE expositions');
        $this->addSql('DROP TABLE oeuvres');
        $this->addSql('DROP TABLE pages');
        $this->addSql('DROP TABLE sliders');
        $this->addSql('DROP TABLE utilisateurs');
    }
}
