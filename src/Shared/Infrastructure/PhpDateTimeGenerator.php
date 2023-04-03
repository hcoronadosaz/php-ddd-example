<?php

declare(strict_types=1);

namespace CodelyTv\Shared\Infrastructure;

use CodelyTv\Shared\Domain\DateTimeGenerator;
use DateTimeImmutable;

final class PhpDateTimeGenerator implements DateTimeGenerator
{
    public function generate(): string
    {
        $date = new DateTimeImmutable();

        return $date->format('Y-m-d H:i:s');
    }
}
