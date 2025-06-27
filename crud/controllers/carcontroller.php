<?php

namespace controllers;

use models\cars\car;

class carcontroller extends maincontroller
{
    public $templateDir = "car";
    public $class = \models\cars\car::class;
    public $fieldsToCheck = ["setCarName"]; // Исправлено название свойства
}

?>
