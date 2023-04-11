<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Users;

use CodelyTv\Mooc\Shared\Domain\Users\UserId;
use CodelyTv\Mooc\Users\Domain\User;
use CodelyTv\Mooc\Users\Domain\UserRepository;
use CodelyTv\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class UsersModuleUnitTestCase extends UnitTestCase
{
    private UserRepository|MockInterface|null $repository;

    protected function shouldHave(User $user): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->with($this->similarTo($user))
            ->once()
            ->andReturnNull()
        ;
    }

    protected function shouldSearch(UserId $id, ?User $user): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($user)
        ;
    }

    protected function repository(): UserRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(UserRepository::class);
    }
}
