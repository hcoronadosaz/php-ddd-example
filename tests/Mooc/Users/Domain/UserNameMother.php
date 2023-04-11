<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Users\Domain;

use CodelyTv\Mooc\Users\Domain\UserName;
use CodelyTv\Tests\Shared\Domain\WordMother;

final class UserNameMother
{
    public static function create(?string $value = null): UserName
    {
        return new UserName($value ?? WordMother::create());
    }
}
