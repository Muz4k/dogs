<?php

namespace Dogs;

use function cli\line;

class ShibaInu implements DogsInterface
{
    public $gender;

    public function __construct($gender)
    {
        $this->gender = $gender;
    }
    public function getBark()
    {
        $mapping = [
            'male' => function () {
            line('Wof-wof!');
            },
            'female' => function () {
            line('Are you love me?');
            }
        ];
        return $mapping[$this->gender];
    }
    
    public function toHunt()
    {
        line('*hunt*');
    }
}