<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Users\Domain;

use CodelyTv\Shared\Domain\ValueObject\StringValueObject;
use InvalidArgumentException;

class UserPassword extends StringValueObject
{
    const MIN_LENGTH = 8;

    public function __construct(string $value)
    {
        $this->ensureValidity($value);

        parent::__construct($value);
    }

    private function ensureValidity(string $password): void
    {
        if (strlen($password) < self::MIN_LENGTH) {
            throw new InvalidArgumentException(
                sprintf('Password must have at least %d characters', self::MIN_LENGTH)
            );
        }

        if (false === (bool) preg_match('/[a-z]/', $password)) {
            throw new InvalidArgumentException('Password must contain at least a lowercase character');
        }

        if (false === (bool) preg_match('/[A-Z]/', $password)) {
            throw new InvalidArgumentException('Password must contain at least an uppercase character');
        }

        if (false === (bool) preg_match('/[0-9]/', $password)) {
            throw new InvalidArgumentException('Password must contain at least a number');
        }

        if (false === (bool) preg_match('/[^a-zA-Z0-9]/', $password)) {
            throw new InvalidArgumentException('Password must contain at least one special character');
        }
    }

    public function hashValue(): string
    {
        return password_hash($this->value(), PASSWORD_DEFAULT);
    }
}
