<?php

declare(strict_types=1);

namespace CodelyTv\Apps\Mooc\Backend\Controller\HealthCheck;

use CodelyTv\Shared\Domain\DateTimeGenerator;
use CodelyTv\Shared\Domain\RandomNumberGenerator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class HealthCheckGetController
{
    public function __construct(
        private readonly RandomNumberGenerator $generator,
        private readonly DateTimeGenerator $dateTimeGenerator
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        return new JsonResponse(
            [
                'mooc-backend' => 'ok',
                'rand'         => $this->generator->generate(),
                'time'         => $this->dateTimeGenerator->generate(),
            ]
        );
    }
}
