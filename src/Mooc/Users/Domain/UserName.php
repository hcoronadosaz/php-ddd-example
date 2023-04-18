<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Users\Domain;

use CodelyTv\Shared\Domain\ValueObject\StringValueObject;
use InvalidArgumentException;

final class UserName extends StringValueObject
{
    const MIN_LENGTH = 3;

    public function __construct(string $value)
    {
        $this->ensureIsValidName($value);

        parent::__construct($value);
    }

    private function ensureIsValidName(string $name): void
    {
        $hasValidLength = strlen($name) >= self::MIN_LENGTH;

        if (false === $hasValidLength) {
            throw new InvalidArgumentException(
                sprintf('Name must contain at least %s characters', self::MIN_LENGTH)
            );
        }
    }
}
