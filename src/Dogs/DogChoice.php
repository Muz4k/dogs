<?php

namespace App\Dogs;

use Exception;

class DogChoice
{
    private $breed;
    private $gender;

    public function __construct(string $breed, string $gender)
    {
        $this->gender = $gender;
        $this->breed = $breed;
    }

    /**
     * @return DogInterface
     * @throws Exception
     */
    public function getDogWithBreed(): DogInterface
    {
        $mapping = [
            'ShibaInu' => ShibaInu::class,
            'Dachshund' => Dachshund::class,
            'Pug' => Pug::class,
            'RubberLabrador' => RubberLabrador::class
        ];
        if (array_key_exists($this->breed, $mapping)) {
            return new $mapping[$this->breed]($this->gender);
        }
        throw new Exception('Breed is invalid.');
    }
}