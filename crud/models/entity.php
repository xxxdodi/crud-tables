<?php

namespace models;

use services\db;

class entity
{
    public $errorArray;

    public function save()
    {
        $array = $this->constructData();
        $db = db::getInstance();
        // Экранируем названия колонок
        $sql = "INSERT INTO `" . static::getTableName() . "` (" . $array["dbColumns"] . ") VALUES (" . $array["params"] . ")";
        $db->query($sql, $array["values"]);
        $this->errorArray = $db->getErrors();
    }

    public function update()
    {
        $array = $this->constructData();
        $db = db::getInstance();
        // Экранируем названия колонок
        $sql = "UPDATE `" . static::getTableName() . "` SET " . $array["updateColumns"] . " WHERE `id` = :id";
        $db->query($sql, $array["values"]);
        $this->errorArray = $db->getErrors();
    }

    public static function getById(int $id): ?self
    {
        $db = db::getInstance();
        // Экранируем таблицу и колонку
        $sql = "SELECT * FROM `" . static::getTableName() . "` WHERE `id` = :id";
        $values = [":id" => $id];
        $result = $db->query($sql, $values, static::class);
        return $result ? $result[0] : null;
    }

    public static function getAll(): ?array
    {
        $db = db::getInstance();
        $sql = "SELECT * FROM " . static::getTableName();
        $result = $db->query($sql, [], static::class);
        return $result;
    }

    public function delete()
    {
        $db = db::getInstance();
        // Экранируем таблицу и колонку
        $sql = "DELETE FROM `" . static::getTableName() . "` WHERE `id` = :id";
        $values = [":id" => $this->id];
        $db->query($sql, $values);
    }

    public function getError()
    {
        return $this->errorArray;
    }

    public function constructData(): array
    {
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();
        $valuePart = [];
        $dbColumns = [];
        $params = [];
        $updateColumns = [];
        foreach ($properties as $property) {
            if ($property->getName() != "errorArray") {
                $propertyName = $property->getName();
                $propertyValue = $this->$propertyName;
                // Экранируем названия колонок
                $escapedName = "`" . $propertyName . "`";

                // Формируем строки для INSERT
                $params[] = ":" . $propertyName;
                $valuePart[":" . $propertyName] = $propertyValue;
                $dbColumns[] = $escapedName;

                // Формируем строки для UPDATE
                $updateColumns[] = $escapedName . " = :" . $propertyName;
            }
        }
        $builtData["values"] = $valuePart;
        $builtData["dbColumns"] = implode(",", $dbColumns);
        $builtData["params"] = implode(",", $params);
        $builtData["updateColumns"] = implode(",", $updateColumns);
        return $builtData;
    }
}

?>
