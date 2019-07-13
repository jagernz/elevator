<?php

namespace Elevator\Classes\AbstractClasses;

use Elevator\Classes\Output\Output;

abstract class AbstractPerson
{
    protected $floorNumber = 1;

    public function pushUp()
    {

    }

    public function pushDown($currentFloor)
    {
        Output::displayInfo($this->getName() . ' : pushed button \'Down\' on the ' . $currentFloor . ' floor');

        if ($this->floorNumber === $currentFloor) {
            return true;
        }

        return false;
    }

    /**
     * Value must be between [1..4]
     * @param $button
     */
    public function pushButton($button)
    {
        if ( ! is_integer($button)) {
            throw new \UnexpectedValueException('The value entered must be an integer');
        }

        if ($button > $this->floorNumber) {
            Output::displayInfo('close', $this->floorNumber);
        }

        $this->floorNumber = $button;
    }

    public function pushStop()
    {

    }

    public function __invoke()
    {
        return $this->getName();
    }
}