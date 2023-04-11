<?php

namespace CodelyTv\Tests\Mooc\Users\Application\Create;

use CodelyTv\Mooc\Courses\Application\Create\CreateCourseCommandHandler;
use CodelyTv\Mooc\Users\Application\Create\CreateUserCommandHandler;
use CodelyTv\Mooc\Users\Application\Create\UserCreator;
use CodelyTv\Mooc\Users\Domain\UserCreatedDomainEvent;
use CodelyTv\Tests\Mooc\Courses\Application\Create\CreateCourseCommandMother;
use CodelyTv\Tests\Mooc\Courses\Infrastructure\Persistence\CourseRepositoryTest;
use CodelyTv\Tests\Mooc\Users\Domain\UserCreatedDomainEventMother;
use CodelyTv\Tests\Mooc\Users\Domain\UserMother;
use CodelyTv\Tests\Mooc\Users\UsersModuleUnitTestCase;

class CreateUserCommandHandlerTest extends UsersModuleUnitTestCase
{
    private CreateUserCommandHandler|null $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new CreateUserCommandHandler(new UserCreator($this->repository(), $this->eventBus()));
    }

    public function it_should_create_a_valid_user(): void
    {
        $command = CreateUserCommandMother::create();

        $user = UserMother::fromRequest($command);
        $domainEvent = UserCreatedDomainEventMother::fromUser($user);

        $this->shouldHave($user);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->dispatch($command, $this->handler);
    }
}
