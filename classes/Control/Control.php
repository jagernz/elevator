<?php

namespace Elevator\Classes\Control;

use Elevator\Classes\Elevator\Elevator;
use Elevator\Classes\Floor\Floor1;
use Elevator\Classes\Floor\Floor2;
use Elevator\Classes\Floor\Floor3;
use Elevator\Classes\Floor\Floor4;
use Elevator\Classes\Output\Output;
use Elevator\Classes\Persons\Person1;
use Elevator\Classes\Persons\Person2;
use Elevator\Classes\Persons\Person3;

class Control
{
    private static $instance;

    private $settings;
    private $elevator;
    private $currentFloor = 1;

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

        Output::displayInfo('We have provided default settings, every Person on their Floor');
    }

    private function getSettings()
    {
        return $this->settings;
    }

    private function getElevator()
    {
        return $this->elevator;
    }

    public function parseCommands(array $commands)
    {
        if ( ! is_array($commands) ) {
            throw new \UnexpectedValueException('The value entered must be an integer');
        }

        foreach ($commands as $command) {
            $this->executeCommand($command);
        }
    }

    private function executeCommand($command)
    {
        switch ($command) {

            case 'execute_first_person_command':

                Output::displayInfo(' => First command: ');

                foreach ($this->settings as $floor) {

                    if (get_class($floor) == Floor1::class) {

                        $person = $floor->getPerson();

                        $result = $person[0]
                            ->pushDown($this->currentFloor);

                        if ($result) {
                            $this->getElevator()->getCommandFromControlModule('open', $this->currentFloor);
                        }

                        $floor->reMovePerson($person[0]);

                        $this->getElevator()->addPerson($person[0]);

                        $this->getElevator()->getPerson()[0]->pushButton(4);

                        $this->getElevator()->getCommandFromControlModule('close', 4);

                        $this->getElevator()->getCommandFromControlModule('move', 4);

                        $this->getElevator()->getCommandFromControlModule('open', 4);
                    }

                }

                break;
            case 'execute_second_person_command':
                break;
            case 'execute_third_person_command':
                break;
        }
    }
}