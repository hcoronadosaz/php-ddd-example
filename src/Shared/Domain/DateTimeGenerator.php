<?php

declare(strict_types=1);

namespace CodelyTv\Shared\Domain;

interface DateTimeGenerator
{
    public function generate(): string;
}
