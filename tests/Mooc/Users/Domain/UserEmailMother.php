<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Users\Domain;

use CodelyTv\Mooc\Users\Domain\UserEmail;
use CodelyTv\Tests\Shared\Domain\WordMother;

final class UserEmailMother
{
    public static function create(?string $value = null): UserEmail
    {
        return new UserEmail($value ?? self::generateEmail());
    }

    private static function generateEmail(): string
    {
        return WordMother::create() . '@email.com';
    }
}
