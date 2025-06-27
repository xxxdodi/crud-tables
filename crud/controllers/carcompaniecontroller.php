<?php

namespace controllers;

use models\carcompanies\carcompanie;
use models\cars\car;
use models\companies\companie;
class carcompaniecontroller extends maincontroller
{
   public $templateDir = "carcompanie";
    public $class = \models\carcompanies\carcompanie::class; // Исправлено пространство имен
   public $entitiesToGet = ["allCars"=>car::class,"allCompanies"=>companie::class];
}
