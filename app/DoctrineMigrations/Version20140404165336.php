<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20140404165336 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("CREATE TABLE Classe (id INT AUTO_INCREMENT NOT NULL, etablissement_id INT DEFAULT NULL, enseignant_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, niveau VARCHAR(255) NOT NULL, INDEX IDX_882BBAA0FF631228 (etablissement_id), INDEX IDX_882BBAA0E455FCC0 (enseignant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE Etablissement (id INT AUTO_INCREMENT NOT NULL, numero_national INT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal INT NOT NULL, ville VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE Seance (id INT AUTO_INCREMENT NOT NULL, classe_id INT DEFAULT NULL, theme_id INT DEFAULT NULL, enseignant_id INT DEFAULT NULL, date DATE NOT NULL, heure TIME NOT NULL, intro VARCHAR(255) NOT NULL, test TINYINT(1) NOT NULL, INDEX IDX_D8D1F8388F5EA509 (classe_id), INDEX IDX_D8D1F83859027487 (theme_id), INDEX IDX_D8D1F838E455FCC0 (enseignant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE SousTheme (id INT AUTO_INCREMENT NOT NULL, theme_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_76D64F859027487 (theme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE Student (id INT AUTO_INCREMENT NOT NULL, classe_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, firstName VARCHAR(255) NOT NULL, age INT NOT NULL, avatar INT NOT NULL, INDEX IDX_789E96AF8F5EA509 (classe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE Theme (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE User (id INT AUTO_INCREMENT NOT NULL, etablissement_id INT DEFAULT NULL, username VARCHAR(255) NOT NULL, username_canonical VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, email_canonical VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expired TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT '(DC2Type:array)', credentials_expired TINYINT(1) NOT NULL, credentials_expire_at DATETIME DEFAULT NULL, last_name VARCHAR(100) NOT NULL, name VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_2DA1797792FC23A8 (username_canonical), UNIQUE INDEX UNIQ_2DA17977A0D96FBF (email_canonical), INDEX IDX_2DA17977FF631228 (etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE Classe ADD CONSTRAINT FK_882BBAA0FF631228 FOREIGN KEY (etablissement_id) REFERENCES Etablissement (id)");
        $this->addSql("ALTER TABLE Classe ADD CONSTRAINT FK_882BBAA0E455FCC0 FOREIGN KEY (enseignant_id) REFERENCES User (id)");
        $this->addSql("ALTER TABLE Seance ADD CONSTRAINT FK_D8D1F8388F5EA509 FOREIGN KEY (classe_id) REFERENCES Classe (id)");
        $this->addSql("ALTER TABLE Seance ADD CONSTRAINT FK_D8D1F83859027487 FOREIGN KEY (theme_id) REFERENCES Theme (id)");
        $this->addSql("ALTER TABLE Seance ADD CONSTRAINT FK_D8D1F838E455FCC0 FOREIGN KEY (enseignant_id) REFERENCES User (id)");
        $this->addSql("ALTER TABLE SousTheme ADD CONSTRAINT FK_76D64F859027487 FOREIGN KEY (theme_id) REFERENCES Theme (id)");
        $this->addSql("ALTER TABLE Student ADD CONSTRAINT FK_789E96AF8F5EA509 FOREIGN KEY (classe_id) REFERENCES Classe (id)");
        $this->addSql("ALTER TABLE User ADD CONSTRAINT FK_2DA17977FF631228 FOREIGN KEY (etablissement_id) REFERENCES Etablissement (id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE Seance DROP FOREIGN KEY FK_D8D1F8388F5EA509");
        $this->addSql("ALTER TABLE Student DROP FOREIGN KEY FK_789E96AF8F5EA509");
        $this->addSql("ALTER TABLE Classe DROP FOREIGN KEY FK_882BBAA0FF631228");
        $this->addSql("ALTER TABLE User DROP FOREIGN KEY FK_2DA17977FF631228");
        $this->addSql("ALTER TABLE Seance DROP FOREIGN KEY FK_D8D1F83859027487");
        $this->addSql("ALTER TABLE SousTheme DROP FOREIGN KEY FK_76D64F859027487");
        $this->addSql("ALTER TABLE Classe DROP FOREIGN KEY FK_882BBAA0E455FCC0");
        $this->addSql("ALTER TABLE Seance DROP FOREIGN KEY FK_D8D1F838E455FCC0");
        $this->addSql("DROP TABLE Classe");
        $this->addSql("DROP TABLE Etablissement");
        $this->addSql("DROP TABLE Seance");
        $this->addSql("DROP TABLE SousTheme");
        $this->addSql("DROP TABLE Student");
        $this->addSql("DROP TABLE Theme");
        $this->addSql("DROP TABLE User");
    }
}
