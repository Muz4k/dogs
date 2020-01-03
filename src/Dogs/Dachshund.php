<?php


namespace App\Dogs;


class Dachshund implements DogInterface
{
    private $gender;

    /**
     * Dachshund constructor.
     * @param string $gender
     */
    public function __construct(string $gender)
    {
        $this->gender = $gender;
    }

    public function sound():string
    {
        return '
        Waf-waf!
░░▄▄
░▄█▀░░░░░░░░░░░░░░░░░░▄███████▄░░░▄
▄█░░░░░░░░░░░░░░░░░░▄███████▀▀██▄███
██░░░░░░░░░░░░░░░░░░████▀███▄▄██████
██▄░░░░░░░░░░░░░░░░░████░▀████████▀
░███▄░░░░░░░░░░░░░░░█████▄░▀███▀
░░▀█████▄▄▄▄▄▄▄▄▄▄▄▄░▀████░░██
░░░░█████████████████▄▄░░▄▄██▀
░░░░█████████████████████████
░░░░█████████████████████████
░░░░█████████████████████████
░░░░█████████████████████████
░░░░█████▀░▄░░░░░░░░░░▄▄▄░███
░░░░███▀░▄██░░░░░░░░░░███░░██▄
░░░░██░░░███▄░░░░░░░░░░██░░▀██▄▄
░░░░▀▀▀░░░▀▀▀▀░░░░░░░░░░░░░░░▀▀▀';
    }

    public function hunt():string
    {
        $mapping = [
            'male' => '*very hunt*',
            'female' => "{$this->gender} TOO very hunt!"
        ];
        return $mapping[$this->gender];
    }
}