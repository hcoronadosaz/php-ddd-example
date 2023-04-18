<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Users\Domain;

use CodelyTv\Shared\Domain\ValueObject\StringValueObject;
use InvalidArgumentException;

final class UserEmail extends StringValueObject
{
    public function __construct(string $value)
    {
        $this->ensureIsValidEmail($value);

        parent::__construct($value);
    }

    private function ensureIsValidEmail(string $email): void
    {
        $isValidEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

        if (false === $isValidEmail) {
            throw new InvalidArgumentException('Email does not have a valid format');
        }
    }
}
