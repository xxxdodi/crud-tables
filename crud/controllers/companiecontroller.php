<?php


namespace controllers;

use models\companies\companie;

class companiecontroller extends maincontroller
{
    public $templateDir = "companie";
    public $class = \models\companies\companie::class;
    public $fieldsToCheck = ["setCompaniesName"];

}