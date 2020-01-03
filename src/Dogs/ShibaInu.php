<?php

namespace App\Dogs;


class ShibaInu implements DogsInterface
{
    public $gender;

    public function __construct($gender)
    {
        $this->gender = $gender;
    }

    public function sound()
    {
        $mapping = [
            'male' => '
                Wof-wof!
            ░░██▄░░░░░░░░░░▄██░░
            ░▄▀░█▄░░░░░░░░▄█░░█░
            ░█░▄░█▄░░░░░░▄█░▄░█░
            ░█░██████████████▄█░
            ░█████▀▀████▀▀█████░
            ▄█▀█▀░░░████░░░▀▀███
            ██░░▀████▀▀████▀░░██
            ██░░░░█▀░░░░▀█░░░░██
            ███▄░░░░░░░░░░░░▄███
            ░▀███▄░░████░░▄███▀░
            ░░░▀██▄░▀██▀░▄██▀░░░
            ░░░░░░▀██████▀░░░░░░',
            'female' => '
                Are you love me?
                ╭━━━╮╱▔▔▔▔╲╭━━━╮ 
                 ┃┈┈┈╱╭━╮╭━╮╲┈┈┈┃ 
                 ┃┈┈╭▏┃▉┃┃▉┃▕╮┈┈┃  
                ┃┈┈┃▏╰━╯╰━┻╮┃┈┈┃
                 ┃┈┈┃▏┈┳╯▇▇┈┃┃┈┈┃ 
                 ┃┈┈┃▏┈╰━┳┳┳╯┃┈┈┃  
                ╰━━╯╲▂▂▂╰━╯╱╰━━╯'
        ];

        return $mapping[$this->gender];
    }

    public function hunt()
    {
        return '_________________ 
            _______¶¶¶¶¶¶¶¶¶ 
            _____¶¶¶__¶¶¶¶¶¶ 
            ___¶¶____¶¶______________¶¶¶¶¶¶ 
            ___¶___¶¶_____________¶¶¶¶_¶¶¶¶¶¶¶¶¶¶ 
            __¶¶___¶¶¶¶¶¶¶¶______¶¶___¶¶_______¶¶¶¶¶¶ 
            __¶¶_¶¶¶¶_____¶¶¶¶¶¶¶______¶_________¶¶_¶¶ 
            ___¶¶¶____________¶¶_______¶¶_________¶__¶ 
            __¶¶_____________¶¶_________¶_________¶¶_¶¶ 
            _¶¶______________¶¶_________¶__________¶_¶¶ 
            _¶_________________¶¶¶¶____¶¶_¶¶____¶¶¶¶__¶ 
            _¶_________________¶¶¶¶¶¶¶¶¶__¶0¶__¶0¶_¶_¶¶ 
            _¶________________¶¶¶¶___¶¶_________¶¶__¶¶ 
            _¶¶________________¶_¶¶____________¶_¶¶ 
            _¶_________________¶¶_¶¶¶¶¶¶_¶_____¶¶¶¶ 
            ¶________¶__________¶¶¶¶¶_¶¶¶¶_____¶¶¶ 
            ¶______¶¶¶¶¶___________¶¶¶¶¶¶¶¶¶¶¶¶¶¶ 
            ¶_____¶¶_¶_¶¶¶_____________¶__¶¶¶___¶¶ 
            ¶_____¶__¶¶__¶¶¶______¶¶¶_¶___¶¶¶¶_¶¶¶¶¶ 
            ¶______¶__¶¶___¶______¶_¶¶¶____¶_¶¶¶¶¶¶¶¶ 
            ¶¶__¶¶¶¶___¶¶¶¶¶¶_____¶¶_¶_¶____¶¶¶¶¶¶¶¶¶¶ 
            _¶¶¶¶¶¶¶______¶¶¶______¶¶¶__¶_____¶¶¶¶¶¶¶¶ 
            _________________¶_____¶¶__¶¶¶_______¶__¶¶ 
            _________________¶¶_____¶¶¶_¶¶¶_________¶¶ 
            __________________¶¶______¶¶_¶¶¶¶¶_____¶¶ 
            ___________________¶¶¶¶_¶¶¶_____¶¶¶¶¶¶¶ 
            _____________________¶¶¶¶¶ 
            _______________ ';
    }

}