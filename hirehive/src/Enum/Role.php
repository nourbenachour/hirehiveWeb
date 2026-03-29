<?php

namespace App\Enum;

/**
 * Énumération des rôles utilisateurs (alignée sur la colonne users.role).
 */
enum Role: string
{
    case ADMIN = 'ADMIN';
    case RECRUITER = 'RECRUITER';
    case CANDIDATE = 'CANDIDATE';
}
