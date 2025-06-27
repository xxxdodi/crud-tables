<?php


namespace controllers;


use models\marks\mark;
use models\buyers\buyer;
use models\companies\companie;

class markcontroller extends maincontroller
{
    public $templateDir = "mark";
    public $class = \models\marks\mark::class;
    public $entitiesToGet = ["allBuyers"=>buyer::class,"allCompanies"=>companie::class];
    public $fieldsToCheck = ["setMark"];

}