<?php

namespace Elevator\Classes\Traits;

trait ClassDetector
{
    public function getName()
    {
        $path = explode('\\', __CLASS__);
        return array_pop($path);
    }
}