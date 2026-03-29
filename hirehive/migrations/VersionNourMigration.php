<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class VersionNourMigration extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Baseline Nour: aucune modification de schéma. Tables gérées: users, recruiter, condidat, face_enrollments, direct_message, conversation_direct, experience, profile_views, password_reset_tokens.';
    }

    public function up(Schema $schema): void
    {
        // Intentionally empty: baseline only.
    }

    public function down(Schema $schema): void
    {
        // Intentionally empty.
    }
}
