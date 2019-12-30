<?php

namespace App\Dogs;

interface DogsInterface
{
    public function __construct($gender);
    public function sound();
    public function hunt();
}