<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20110726135928 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("CREATE TABLE club_message_message_event (message_id INT NOT NULL, event_id INT NOT NULL, INDEX IDX_1C78C983537A1329 (message_id), INDEX IDX_1C78C98371F7E88B (event_id), PRIMARY KEY(message_id, event_id)) ENGINE = InnoDB");
        $this->addSql("CREATE TABLE club_message_message_filter (message_id INT NOT NULL, filter_id INT NOT NULL, INDEX IDX_43E06D0F537A1329 (message_id), INDEX IDX_43E06D0FD395B25E (filter_id), PRIMARY KEY(message_id, filter_id)) ENGINE = InnoDB");
        $this->addSql("ALTER TABLE club_message_message_event ADD FOREIGN KEY (message_id) REFERENCES club_message_message(id)");
        $this->addSql("ALTER TABLE club_message_message_event ADD FOREIGN KEY (event_id) REFERENCES club_event_event(id)");
        $this->addSql("ALTER TABLE club_message_message_filter ADD FOREIGN KEY (message_id) REFERENCES club_message_message(id)");
        $this->addSql("ALTER TABLE club_message_message_filter ADD FOREIGN KEY (filter_id) REFERENCES club_user_filter(id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("DROP TABLE club_message_message_event");
        $this->addSql("DROP TABLE club_message_message_filter");
    }
}