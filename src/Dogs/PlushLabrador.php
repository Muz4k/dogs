<?php


namespace App\Dogs;


class PlushLabrador implements DogsInterface
{
    public $gender;

    public function __construct($gender)
    {
    $this->gender = $gender;
    }

    public function sound()
    {
       return 'Peow - Peow!';
    }

    public function hunt()
    {
        return 'are you seriosly?? 
        ╭╮┈╱▔╲▂▂▂╱▔╲┈┈┈┈
        ┃┃▕▕╲╭┈╮╭┈╱▏▏┈┈┈
        ┃┃▕╱▕┊▋┊┊▋▏╲▏┈┈┈
        ┃▔▔▔▔╰━╯╰━▇╮┈┈┈┈
        ┃┊┊┊┊┊╰┳┳┳━╯┈┈┈┈
        ┃┣━┫┣┫┃╰━╯┈┈┈┈┈┈
        ╰╯┈╰╯╰╯┈┈┈┈┈┈┈┈┈';
    }
}