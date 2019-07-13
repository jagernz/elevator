<?php

namespace Elevator\Classes\AbstractClasses;

abstract class AbstractBuilding
{
    protected $persons = [];

    public function addPerson(AbstractPerson $person)
    {
        $this->persons[] = $person;

        return $this;
    }

    public function removePerson(AbstractPerson $person)
    {
        $idx = array_search($person, $this->persons, true);
        if (is_int($idx)) {
            array_splice($this->persons, $idx, 1, []);
        }

        return $this;
    }

    public function getNumberOfPersons()
    {
        if (empty($this->persons)) {
            return 0;
        }

        return count($this->persons);
    }

    public function getPerson()
    {
        return $this->persons;
    }
}