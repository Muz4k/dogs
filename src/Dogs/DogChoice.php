<?php

namespace App\Dogs;

use App\Dogs\ShibaInu;
use App\Dogs\Dachshund;
use App\Dogs\PlushLabrador;
use App\Dogs\Pug;
use App\Dogs\DogsInterface;

class DogChoice
{
    public $breed;
    public $gender;

    public function __construct($breed, $gender)
    {
        $this->gender = $gender;
        $this->breed = $breed;
    }

    public function getBreed()
    {
        $mapping = [
            'ShibaInu' => ShibaInu::class,
            'Dachshund' => Dachshund::class,
            'PlushLabrador' => PlushLabrador::class,
            'Pug' => Pug::class
        ];

        return new $mapping[$this->breed]($this->gender);
    }
}