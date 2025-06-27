<?php

namespace controllers;

use models\buyers\buyer;
use models\cars\car;

class buyercontroller extends maincontroller
{

    public $templateDir = "buyer";
    public $class = \models\buyers\buyer::class;

    public $entitiesToGet = ["allCars"=>car::class];

    public $fieldsToCheck = ["setBuyerName"];
}
?>