<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220321114437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users_owned (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, value DOUBLE PRECISION NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_DCC3F764A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE users_owned ADD CONSTRAINT FK_DCC3F764A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users ADD first_name VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, ADD address VARCHAR(255) NOT NULL, ADD phone_number VARCHAR(255) NOT NULL, DROP name, DROP firstname, DROP adress, DROP phonenumber, CHANGE mail mail VARCHAR(255) NOT NULL, CHANGE birth_date birth_date DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE users_owned');
        $this->addSql('ALTER TABLE users ADD name VARCHAR(40) NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD firstname VARCHAR(40) NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD adress VARCHAR(40) NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD phonenumber VARCHAR(40) NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP first_name, DROP last_name, DROP address, DROP phone_number, CHANGE mail mail VARCHAR(40) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE birth_date birth_date DATE NOT NULL');
    }
}
