<?php

namespace CodelyTv\Tests\Mooc\Users\Domain;

use CodelyTv\Mooc\Shared\Domain\Users\UserId;
use CodelyTv\Mooc\Users\Application\Create\CreateUserCommand;
use CodelyTv\Mooc\Users\Domain\User;
use CodelyTv\Mooc\Users\Domain\UserEmail;
use CodelyTv\Mooc\Users\Domain\UserName;

final class UserMother
{
    public static function create(
        ?UserId $id = null,
        ?UserName $name = null,
        ?UserEmail $email = null
    ): User {
        return new User(
            $id ?? UserIdMother::create(),
            $name ?? UserNameMother::create(),
            $email ?? UserEmailMother::create()
        );
    }

    public static function fromRequest(CreateUserCommand $request): User
    {
        return self::create(
            UserIdMother::create($request->id()),
            UserNameMother::create($request->name()),
            UserEmailMother::create($request->email())
        );
    }
}
