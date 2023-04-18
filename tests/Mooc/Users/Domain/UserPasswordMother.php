<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Users\Domain;

use CodelyTv\Mooc\Users\Domain\UserPassword;
use CodelyTv\Tests\Shared\Domain\WordMother;

class UserPasswordMother
{
    public static function create(string $value = null): UserPassword
    {
        return new UserPassword($value ?? WordMother::randomUserPassword());
    }
}
