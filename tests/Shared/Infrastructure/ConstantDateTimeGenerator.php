<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Shared\Infrastructure;

use CodelyTv\Shared\Domain\DateTimeGenerator;
use DateTimeImmutable;

final class ConstantDateTimeGenerator implements DateTimeGenerator
{
    public function generate(): string
    {
        $date = new DateTimeImmutable('2023-03-29 16:40:00');

        return $date->format('Y-m-d H:i:s');
    }
}
