<?php


namespace App\Dogs;


class RubberLabrador implements DogInterface
{
    private $gender;

    /**
     * RubberLabrador constructor.
     * @param string $gender
     */
    public function __construct(string $gender)
    {
    $this->gender = $gender;
    }

    public function sound():string
    {
       return 'Peow - Peow!';
    }

    public function hunt():string
    {
        return '
        are you seriously?? 
        ╭╮┈╱▔╲▂▂▂╱▔╲┈┈┈┈
        ┃┃▕▕╲╭┈╮╭┈╱▏▏┈┈┈
        ┃┃▕╱▕┊▋┊┊▋▏╲▏┈┈┈
        ┃▔▔▔▔╰━╯╰━▇╮┈┈┈┈
        ┃┊┊┊┊┊╰┳┳┳━╯┈┈┈┈
        ┃┣━┫┣┫┃╰━╯┈┈┈┈┈┈
        ╰╯┈╰╯╰╯┈┈┈┈┈┈┈┈┈';
    }
}