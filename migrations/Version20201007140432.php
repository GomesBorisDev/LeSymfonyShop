<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201007140432 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sneakers_stock (id INT AUTO_INCREMENT NOT NULL, sneaker_id INT NOT NULL, size DOUBLE PRECISION NOT NULL, price DOUBLE PRECISION NOT NULL, quantity INT DEFAULT NULL, added_at DATETIME NOT NULL, INDEX IDX_EEC1173FB44896C4 (sneaker_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sneakers_stock ADD CONSTRAINT FK_EEC1173FB44896C4 FOREIGN KEY (sneaker_id) REFERENCES sneakers (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE sneakers_stock');
    }
}
