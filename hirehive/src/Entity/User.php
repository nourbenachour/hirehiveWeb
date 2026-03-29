<?php

namespace App\Entity;

/**
 * Bridge class kept for backward compatibility after moving entities under App\Entity\Nour.
 * It simply extends the new namespace to avoid autoload errors from legacy references/sessions.
 */
class User extends \App\Entity\Nour\User
{
}
