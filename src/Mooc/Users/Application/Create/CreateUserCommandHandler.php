<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Users\Application\Create;

use CodelyTv\Mooc\Shared\Domain\Users\UserId;
use CodelyTv\Mooc\Users\Domain\UserEmail;
use CodelyTv\Mooc\Users\Domain\UserName;
use CodelyTv\Mooc\Users\Domain\UserPassword;
use CodelyTv\Shared\Domain\Bus\Command\CommandHandler;

final class CreateUserCommandHandler implements CommandHandler
{
    public function __construct(private readonly UserCreator $creator)
    {
    }

    public function __invoke(CreateUserCommand $command): void
    {
        $this->creator->__invoke(
            new UserId($command->id()),
            new UserName($command->name()),
            new UserEmail($command->email()),
            new UserPassword($command->password())
        );
    }
}
