<?php
namespace models\cars;

use models\entity;

class car extends entity
{
    public $name;
    public $id;
    public $release;

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function getCarName(): string
    {
        return $this->name;
    }

    public function setCarName(string $carName)
    {
        $this->name = $carName;
    }

    public function setCarRelease(string $release)
    {
        $this->release = $release; // Используем поле release
    }

    public function getCarRelease(): string
    {
        return $this->release ?? ''; // Возвращаем значение или пустую строку
    }

    static function getTableName(): string
    {
        return "cars";
    }
}
