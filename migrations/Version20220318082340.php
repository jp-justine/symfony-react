<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220318082340 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users ADD birth_date DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users DROP birth_date, CHANGE name name VARCHAR(40) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE firstname firstname VARCHAR(40) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mail mail VARCHAR(40) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adress adress VARCHAR(40) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE phonenumber phonenumber VARCHAR(40) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
