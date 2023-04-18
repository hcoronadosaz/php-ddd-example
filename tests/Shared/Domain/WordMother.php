<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Shared\Domain;

final class WordMother
{
    public static function create(): string
    {
        return MotherCreator::random()->word;
    }

    public static function randomUserPassword(): string
    {
        $number = (string) MotherCreator::random()->numberBetween(0, 9);
        $lowerCase = strtolower(MotherCreator::random()->randomLetter());
        $upperCase = strtoupper(MotherCreator::random()->randomLetter());
        $specialChar = substr(str_shuffle('`-=~!@#$%^&*()_+,./<>?;:[]{}\|'), 0, 1);

        return str_shuffle(MotherCreator::random()->password(4, 8) . $lowerCase . $upperCase . $specialChar . $number);
    }
}
