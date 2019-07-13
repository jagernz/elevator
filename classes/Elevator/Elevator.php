<?php

namespace Elevator\Classes\AbstractClasses;

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