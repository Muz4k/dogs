<?php

namespace App\Tests\Command;

use App\Command\DogCommand;
use App\Dogs\DogChoice;
use PHPUnit\Framework\TestCase;

class DogCommandTest extends TestCase
{
    public function testChoice()
    {
        $dog = new DogChoice('something', 'male');
        $dog->getBreed();
        self::assertFalse($dog);
    }
}
