<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Users\Infrastructure\Persistence;

use CodelyTv\Mooc\Shared\Domain\Users\UserId;
use CodelyTv\Mooc\Users\Domain\User;
use CodelyTv\Mooc\Users\Domain\UserRepository;
use CodelyTv\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

class DoctrineUserRepository extends DoctrineRepository implements UserRepository
{
    public function save(User $user): void
    {
        $this->persist($user);
    }

    public function search(UserId $userId): ?User
    {
        return $this->repository(User::class)->find($userId);
    }
}
