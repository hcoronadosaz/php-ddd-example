<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Users\Application\Create;

use CodelyTv\Mooc\Shared\Domain\Users\UserId;
use CodelyTv\Mooc\Users\Application\Create\CreateUserCommand;
use CodelyTv\Mooc\Users\Domain\UserEmail;
use CodelyTv\Mooc\Users\Domain\UserName;
use CodelyTv\Mooc\Users\Domain\UserPassword;
use CodelyTv\Tests\Mooc\Users\Domain\UserEmailMother;
use CodelyTv\Tests\Mooc\Users\Domain\UserIdMother;
use CodelyTv\Tests\Mooc\Users\Domain\UserNameMother;
use CodelyTv\Tests\Mooc\Users\Domain\UserPasswordMother;

final class CreateUserCommandMother
{
    public static function create(
        ?UserId $id = null,
        ?UserName $name = null,
        ?UserEmail $email = null,
        ?UserPassword $password = null
    ): CreateUserCommand {
        return new CreateUserCommand(
            $id?->value() ?? UserIdMother::create()->value(),
            $name?->value() ?? UserNameMother::create()->value(),
            $email?->value() ?? UserEmailMother::create()->value(),
            $password?->value() ?? UserPasswordMother::create()->value()
        );
    }
}
