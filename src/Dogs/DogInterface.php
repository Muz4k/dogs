<?php

namespace App\Dogs;

interface DogInterface
{
    public function __construct(string $gender);
    public function sound():string;
    public function hunt():string;
}