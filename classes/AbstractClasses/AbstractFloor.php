<?php

namespace Elevator\Classes\AbstractClasses;

use Elevator\Classes\Output\Output;

abstract class AbstractFloor extends AbstractBuilding
{
    public function removePerson(AbstractPerson $person)
    {
        Output::displayInfo($person() . ' went from ' . $this->getName());

        return parent::removePerson($person);
    }
}