<?php

namespace Elevator\Classes\Elevator;

use Elevator\Classes\AbstractClasses\AbstractBuilding;
use Elevator\Classes\AbstractClasses\AbstractPerson;
use Elevator\Classes\Output\Output;

class Elevator extends AbstractBuilding
{
    private $speed = 1;
    private $height = 4;

    private $currentElevatorFloor = 1;

    public function getElevatorSpeed()
    {
        return $this->speed;
    }

    public function getElevatorHeight()
    {
        return $this->height;
    }

    public function getCommandFromControlModule($command, $currentFloor)
    {
        if ( $command == 'open' && $this->currentElevatorFloor == $currentFloor) {
            Output::displayInfo('Elevator\'s door opened');
        }
    }

    public function getCurrentElevatorFloor()
    {
        return $this->currentElevatorFloor;
    }

    public function addPerson(AbstractPerson $person)
    {
        Output::displayInfo($person()  . ' went into Elevator');

        return parent::addPerson($person);
    }
}