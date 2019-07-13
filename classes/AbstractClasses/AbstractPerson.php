<?php

namespace Elevator\Classes\AbstractClasses;

abstract class AbstractPerson
{
    private $floorNumber = false;

    public function pushUp()
    {

    }

    public function pushDown()
    {

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

        $this->floorNumber = $button;
    }

    public function pushStop()
    {

    }
}