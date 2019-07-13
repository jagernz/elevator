<?php

require_once 'configs.php';

$control = \Elevator\Classes\Control\Control::getInstance();

$control->init();

$commands = [
    'execute_first_person_command',
    'execute_second_person_command',
    'execute_third_person_command'
];

$control->parseCommands($commands);