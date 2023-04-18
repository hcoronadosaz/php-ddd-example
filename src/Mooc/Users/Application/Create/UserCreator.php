<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Users\Application\Create;

use CodelyTv\Mooc\Shared\Domain\Users\UserId;
use CodelyTv\Mooc\Users\Domain\User;
use CodelyTv\Mooc\Users\Domain\UserEmail;
use CodelyTv\Mooc\Users\Domain\UserName;
use CodelyTv\Mooc\Users\Domain\UserPassword;
use CodelyTv\Mooc\Users\Domain\UserRepository;
use CodelyTv\Shared\Domain\Bus\Event\EventBus;

final class UserCreator
{
    public function __construct(private readonly UserRepository $repository, private readonly EventBus $bus)
    {
    }

    public function __invoke(UserId $userId, UserName $name, UserEmail $email, UserPassword $password): void
    {
        $user = User::create($userId, $name, $email, $password);

        $this->repository->save($user);

        $this->bus->publish(...$user->pullDomainEvents());
    }
}
