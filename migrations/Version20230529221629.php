<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230529221629 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__employee AS SELECT id, firstname, lastname, birthdate, firstday, lastday, toe, level FROM employee');
        $this->addSql('DROP TABLE employee');
        $this->addSql('CREATE TABLE employee (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, firstday DATE DEFAULT NULL, lastday DATE DEFAULT NULL, toe VARCHAR(255) NOT NULL, level VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO employee (id, firstname, lastname, birthdate, firstday, lastday, toe, level) SELECT id, firstname, lastname, birthdate, firstday, lastday, toe, level FROM __temp__employee');
        $this->addSql('DROP TABLE __temp__employee');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__employee AS SELECT id, firstname, lastname, birthdate, firstday, lastday, toe, level FROM employee');
        $this->addSql('DROP TABLE employee');
        $this->addSql('CREATE TABLE employee (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, firstday DATE DEFAULT NULL, lastday DATE DEFAULT NULL, toe CLOB NOT NULL --(DC2Type:json)
        , level INTEGER NOT NULL)');
        $this->addSql('INSERT INTO employee (id, firstname, lastname, birthdate, firstday, lastday, toe, level) SELECT id, firstname, lastname, birthdate, firstday, lastday, toe, level FROM __temp__employee');
        $this->addSql('DROP TABLE __temp__employee');
    }
}
