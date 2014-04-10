<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20140410115623 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE Badge DROP FOREIGN KEY FK_3F316719F7358FE1");
        $this->addSql("DROP INDEX IDX_3F316719F7358FE1 ON Badge");
        $this->addSql("ALTER TABLE Badge CHANGE soustheme_id reward_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE Badge ADD CONSTRAINT FK_3F316719E466ACA1 FOREIGN KEY (reward_id) REFERENCES Reward (id)");
        $this->addSql("CREATE INDEX IDX_3F316719E466ACA1 ON Badge (reward_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE Badge DROP FOREIGN KEY FK_3F316719E466ACA1");
        $this->addSql("DROP INDEX IDX_3F316719E466ACA1 ON Badge");
        $this->addSql("ALTER TABLE Badge CHANGE reward_id sousTheme_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE Badge ADD CONSTRAINT FK_3F316719F7358FE1 FOREIGN KEY (sousTheme_id) REFERENCES SousTheme (id)");
        $this->addSql("CREATE INDEX IDX_3F316719F7358FE1 ON Badge (sousTheme_id)");
    }
}