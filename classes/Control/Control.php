<?php

namespace Elevator\Classes\Control;

use Elevator\Classes\Elevator\Elevator;
use Elevator\Classes\Floor\Floor1;
use Elevator\Classes\Floor\Floor2;
use Elevator\Classes\Floor\Floor3;
use Elevator\Classes\Floor\Floor4;
use Elevator\Classes\Persons\Person1;
use Elevator\Classes\Persons\Person2;
use Elevator\Classes\Persons\Person3;

class Control
{
    private static $instance;

    private $settings;
    private $elevator;

    private function __construct(){}

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new Control();
        }
        return self::$instance;
    }

    public function init()
    {
        $this->provideDefaultSettings();
    }

    private function provideDefaultSettings()
    {
        $elevator = new Elevator();
        $this->elevator = $elevator;

        $person1 = new Person1();
        $person2 = new Person2();
        $person3 = new Person3();

        $floor1 = new Floor1();
        $floor2 = new Floor2();
        $floor3 = new Floor3();
        $floor4 = new Floor4();

        //provide default settings
        $floor1->addPerson($person1);
        $floor3->addPerson($person2);
        $floor4->addPerson($person3);

        $this->settings = [
            $floor1,
            $floor2,
            $floor3,
            $floor4
        ];
    }

    public function getSettings()
    {
        return $this->settings;
    }

    public function getElevator()
    {
        return $this->elevator;
    }
}