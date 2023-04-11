<?php

namespace CodelyTv\Mooc\Users\Infrastructure\Persistence\Doctrine;

use CodelyTv\Mooc\Shared\Domain\Users\UserId;
use CodelyTv\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class UserIdType extends UuidType
{

    protected function typeClassName(): string
    {
        return UserId::class;
    }
}
