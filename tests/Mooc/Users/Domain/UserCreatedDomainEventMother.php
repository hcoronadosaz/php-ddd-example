<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Users\Domain;

use CodelyTv\Mooc\Shared\Domain\Users\UserId;
use CodelyTv\Mooc\Users\Domain\User;
use CodelyTv\Mooc\Users\Domain\UserCreatedDomainEvent;
use CodelyTv\Mooc\Users\Domain\UserEmail;
use CodelyTv\Mooc\Users\Domain\UserName;
use CodelyTv\Mooc\Users\Domain\UserPassword;

final class UserCreatedDomainEventMother
{
    public static function create(
        ?UserId $id = null,
        ?UserName $name = null,
        ?UserEmail $email = null,
        ?UserPassword $password = null
    ): UserCreatedDomainEvent {
        return new UserCreatedDomainEvent(
           $id?->value() ?? UserIdMother::create()->value(),
            $name?->value() ?? UserNameMother::create()->value(),
            $email?->value() ?? UserEmailMother::create()->value(),
            $password?->value() ?? UserPasswordMother::create()->value()
        );
    }

    public static function fromUser(User $user): UserCreatedDomainEvent
    {
        return self::create($user->id(), $user->name(), $user->email(), $user->password());
    }
}
