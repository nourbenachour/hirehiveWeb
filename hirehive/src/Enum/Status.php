<?php

namespace App\Enum;

/**
 * Statuts possibles pour les utilisateurs (colonne users.status).
 */
enum Status: string
{
    case USER_BANNED = 'USER_BANNED';
    case USER_SUSPEND = 'USER_SUSPEND';
    case USER_VERIFIED = 'USER_VERIFIED';
    case USER_DELETED = 'USER_DELETED';
    case COMPANY_VERIFIED = 'COMPANY_VERIFIED';
}
