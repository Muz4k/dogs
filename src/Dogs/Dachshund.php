<?php


namespace Dogs;


class Dachshund implements DogsInterface
{
    public $gender;

    public function __construct($gender)
    {
        $this->gender = $gender;
    }

    public function getBark()
    {
       ('Waf-waf!');
    }

    public function toHunt()
    {
        $mapping = [
            'male' => function () {
           ('*very hunt*');
            },
            'female' => function () {
            ("{$this->gender} TOO very hunt!");
            }
        ];
        return $mapping[$this->gender];
    }
}