<?php

namespace models\carcompanies;

use models\entity;
use models\cars\car;
use models\companies\companie;

class carcompanie extends entity
{
    public $id;
    public $carId;
    public $companieId;

    // Getter для carId
    public function getCarId()
    {
        return $this->carId; //
    }

    // Getter для companieId
    public function getCompanieId()
    {
        return $this->companieId;
    }

    // Setter для carId
    public function setCarId($carId)
    {
        $this->carId = $carId;
    }

    // Setter для companieId
    public function setCompanieId($companieId)
    {
        $this->companieId = $companieId;
    }

    // Метод для получения имени машины
    public function getCarName()
    {
        $car = car::getById($this->carId);
        if ($car != null) {
            return $car->getCarName();
        } else {
            return null;
        }
    }

    // Метод для получения имени компании
    public function getCompanieName()
    {
        $companie = companie::getById($this->companieId);
        if ($companie != null) {
            return $companie->getCompanieName();
        } else {
            return null;
        }
    }

    // Метод для получения имени таблицы
    static function getTableName(): string
    {
        return "cclinc";
    }
}
