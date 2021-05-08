<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210508085547 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX user_poll_unique ON products_rating');
        $this->addSql('CREATE UNIQUE INDEX user_poll_unique ON products_rating (product_id, users_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX user_poll_unique ON products_rating');
        $this->addSql('CREATE UNIQUE INDEX user_poll_unique ON products_rating (rating_id, product_id, users_id)');
    }
}
