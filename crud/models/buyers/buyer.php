<?php


namespace models\buyers;


use models\entity;
use models\cars\car;

class buyer extends entity
{
    public $id;
    public $name;
    public $carId;

    public function setBuyerCar($carId): void
    {
        $this->carId = $carId;
    }
    public function setBuyerName($buyerName): void
    {
        $this->name = $buyerName;
    }
    public function getBuyerName ()
    {
        return $this->name;
    }
    public function getCarName()
    {
        $car = car::getById($this->carId);
        if ($car!=null)
        {
            return $car->getCarName();
        }
        else return NULL;
    }
    static function getTableName() :string
    {
        return "buyers";
    }

}