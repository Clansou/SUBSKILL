<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230822105449 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cities (id INT AUTO_INCREMENT NOT NULL, city_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE companies (id INT AUTO_INCREMENT NOT NULL, company_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contracts (id INT AUTO_INCREMENT NOT NULL, contract_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_announcements (id INT AUTO_INCREMENT NOT NULL, city_id INT NOT NULL, company_id INT NOT NULL, contract_id INT DEFAULT NULL, job_id INT NOT NULL, publish_date DATE NOT NULL, last_update_date DATE NOT NULL, announcements_title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_A49C74518BAC62AF (city_id), INDEX IDX_A49C7451979B1AD6 (company_id), INDEX IDX_A49C74512576E0FD (contract_id), INDEX IDX_A49C7451BE04EA9 (job_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jobs (id INT AUTO_INCREMENT NOT NULL, job_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE job_announcements ADD CONSTRAINT FK_A49C74518BAC62AF FOREIGN KEY (city_id) REFERENCES cities (id)');
        $this->addSql('ALTER TABLE job_announcements ADD CONSTRAINT FK_A49C7451979B1AD6 FOREIGN KEY (company_id) REFERENCES companies (id)');
        $this->addSql('ALTER TABLE job_announcements ADD CONSTRAINT FK_A49C74512576E0FD FOREIGN KEY (contract_id) REFERENCES contracts (id)');
        $this->addSql('ALTER TABLE job_announcements ADD CONSTRAINT FK_A49C7451BE04EA9 FOREIGN KEY (job_id) REFERENCES jobs (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job_announcements DROP FOREIGN KEY FK_A49C74518BAC62AF');
        $this->addSql('ALTER TABLE job_announcements DROP FOREIGN KEY FK_A49C7451979B1AD6');
        $this->addSql('ALTER TABLE job_announcements DROP FOREIGN KEY FK_A49C74512576E0FD');
        $this->addSql('ALTER TABLE job_announcements DROP FOREIGN KEY FK_A49C7451BE04EA9');
        $this->addSql('DROP TABLE cities');
        $this->addSql('DROP TABLE companies');
        $this->addSql('DROP TABLE contracts');
        $this->addSql('DROP TABLE job_announcements');
        $this->addSql('DROP TABLE jobs');
    }
}
