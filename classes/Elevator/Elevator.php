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
        if ( $command == 'open' && $this->getCurrentElevatorFloor() == $currentFloor) {
            Output::displayInfo('Elevator\'s door opened');
        }
        
        if ( $command == 'move' && $this->getCurrentElevatorFloor() == $currentFloor && $this->getPerson() !== null) {
            Output::displayInfo('Elevator has delivered ' . $this->getPerson()[0]() . ' to ' . $currentFloor . ' floor');
        }

        if ($command == 'close' && $this->getCurrentElevatorFloor() < $currentFloor) {
            Output::displayInfo('Elevator\'s door closed and Elevator moves up to ' . $currentFloor . ' floor');
            $this->currentElevatorFloor = $currentFloor;
            return true;
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