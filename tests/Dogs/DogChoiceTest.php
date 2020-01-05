<?php

namespace App\Tests\Dogs;

use App\Dogs\Dachshund;
use App\Dogs\DogChoice;
use App\Dogs\Pug;
use App\Dogs\RubberLabrador;
use App\Dogs\ShibaInu;
use Exception;
use PHPUnit\Framework\TestCase;

class DogChoiceTest extends TestCase
{
    /**
     * @expectedException Exception
     */
    public function testExceptionChoice()
    {
        $dog = new DogChoice('something', 'male');
        $dog->getDogWithBreed();
    }

    public function testShibaInuChoice()
    {
        $dog = new DogChoice('ShibaInu', 'male');
        $this->assertEquals(new ShibaInu('male'), $dog->getDogWithBreed());
    }

    public function testPugChoice()
    {
        $dog = new DogChoice('Pug', 'female');
        $this->assertEquals(new Pug('female'), $dog->getDogWithBreed());
    }

    public function testDachshundChoice()
    {
        $dog = new DogChoice('Dachshund', 'female');
        $this->assertEquals(new Dachshund('female'), $dog->getDogWithBreed());
    }

    public function testRubberLabradorChoice()
    {
        $dog = new DogChoice('RubberLabrador', 'male');
        $this->assertEquals(new RubberLabrador('male'), $dog->getDogWithBreed());
    }
}
