<?php


namespace models\companies;

use models\entity;

class companie extends entity
{
    public $id;
    public $name;
    public $email; // Добавляем email

    public function setCompanieName(string $companieName)
    {
        $this->name = $companieName;
    }

    public function getCompanieName(): string
    {
        return $this->name;
    }

    public function setEmail(string $email)
    {
        $this->email = $email; // Используем правильное свойство
    }

    public function getEmail(): string
    {
        return $this->email; // Возвращаем правильное свойство
    }

    static function getTableName(): string
    {
        return "companies";
    }
}

