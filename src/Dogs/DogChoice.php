<?php

namespace Dogs;

class DogChoice
{
    public $breed;

    public function __construct(DogsInterface $breed)
    {
        $this->breed = $breed;
    }
}