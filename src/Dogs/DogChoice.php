<?php

namespace App\Dogs;

use App\Dogs\Dachshund;
use App\Dogs\Pug;
use App\Dogs\RubberLabrador;
use App\Dogs\ShibaInu;
use phpDocumentor\Reflection\Types\Object_;

class DogChoice
{
    private $breed;
    private $gender;

    public function __construct(string $breed, string $gender)
    {
        $this->gender = $gender;
        $this->breed = $breed;
    }

    public function getBreed():DogInterface
    {
        $mapping = [
            'ShibaInu' => ShibaInu::class,
            'Dachshund' => Dachshund::class,
            'RubberLabrador' => RubberLabrador::class,
            'Pug' => Pug::class
        ];

        return new $mapping[$this->breed]($this->gender);
    }
}