<?php

namespace Elevator\Classes\Elevator;

use Elevator\Classes\AbstractClasses\AbstractBuilding;

class Elevator extends AbstractBuilding
{
    private $speed = 1;
    private $height = 4;

    public function getElevatorSpeed()
    {
        return $this->speed;
    }

    public function getElevatorHeight()
    {
        return $this->height;
    }
}