<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Users\Domain;

use CodelyTv\Mooc\Shared\Domain\Users\UserId;
use CodelyTv\Shared\Domain\Aggregate\AggregateRoot;

final class User extends AggregateRoot
{
    public function __construct(
        private readonly UserId $id,
        private readonly UserName $name,
        private readonly UserEmail $email,
        private readonly UserPassword $password
    ) {
    }

    public static function create(UserId $userId, UserName $userName, UserEmail $userEmail, UserPassword $password): self
    {
        $user = new self($userId, $userName, $userEmail, $password);

        $user->record(new UserCreatedDomainEvent(
            $userId->value(),
            $userName->value(),
            $userEmail->value(),
            $password->value()
        ));

        return $user;
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }

    public function password(): UserPassword
    {
        return $this->password;
    }

    public function __toString(): string
    {
        return implode(',', [
            $this->id->value(),
            $this->name->value(),
            $this->email->value(),
            $this->password->hashValue(),
        ]);
    }
}
