<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Users\Domain;

use CodelyTv\Shared\Domain\Bus\Event\DomainEvent;

class UserCreatedDomainEvent extends DomainEvent
{
    public function __construct(
        string $id,
        private readonly string $name,
        private readonly string $email,
        private readonly string $password,
        string $eventId = null,
        string $occurredOn = null
    ) {
        parent::__construct($id, $eventId, $occurredOn);
    }

    public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): DomainEvent {
        return new self($aggregateId, $body['name'], $body['email'], $body['password'], $eventId, $occurredOn);
    }

    public static function eventName(): string
    {
        return 'user.created';
    }

    public function toPrimitives(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }
}
