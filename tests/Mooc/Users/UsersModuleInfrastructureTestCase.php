<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Users;

use CodelyTv\Mooc\Users\Domain\UserRepository;
use CodelyTv\Tests\Mooc\Shared\Infrastructure\PhpUnit\MoocContextInfrastructureTestCase;

abstract class UsersModuleInfrastructureTestCase extends MoocContextInfrastructureTestCase
{
    protected function repository(): UserRepository
    {
        return $this->service(UserRepository::class);
    }
}
