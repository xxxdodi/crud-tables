<?php

namespace services;

class db
{
    private static $instance;
    public $pdo;
    public $errorArray;
    private function __construct()
    {
        $options = (require $_SERVER["DOCUMENT_ROOT"].'/crud/services/settings.php')['db'];
        try {
            $this->pdo = new \PDO('mysql:host='.$options['host'].';dbname='.$options['dbname'],$options['user'],$options['password']);
        }
        catch (\PDOException $e) {
            if ($e->getCode() == 1049)   // если нет базы данных, то создаем сначала её
            {
                $this->pdo = new \PDO('mysql:host='.$options['host'],$options['user'],$options['password']);
                $this->pdo->exec("CREATE DATABASE ".$options['dbname']);
                $this->pdo->exec("USE ".$options['dbname']);
            }
            else 	die('Error: '.$e->getMessage().' Code: '.$e->getCode());
        }
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->checkTableExists();
    }

    public function checkTableExists()
    {
        $tables = [
            "cars" => "CREATE TABLE IF NOT EXISTS `cars` (
                    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    `name` varchar(255) NOT NULL,
                    `release` DATE NOT NULL)",
            "buyers" => "CREATE TABLE IF NOT EXISTS `buyers` (
                    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    `name` varchar(255) NOT NULL,
                    `carId` int(11) NOT NULL)",
            "companies" => "CREATE TABLE IF NOT EXISTS `companies` (
                    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    `email` varchar(15) NOT NULL,
                    `name` varchar(255) NOT NULL)",
            "cclinc" => "CREATE TABLE IF NOT EXISTS `cclinc` (
                    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    `carId` int(11) NOT NULL,
                    `companieId` int(11) NOT NULL,
                    UNIQUE (`carId`,`companieId`))",
            "marks" => "CREATE TABLE IF NOT EXISTS `marks` (
                    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    `buyerId` int(11) NOT NULL,
                    `companieId` int(11) NOT NULL,
                    `description` varchar(255) NOT NULL,
                    `mark` int(11))"
        ];

        foreach ($tables as $table => $createQuery) {
            try {
                $statement = $this->pdo->prepare("DESCRIBE `$table`");
                $statement->execute();
            } catch (\PDOException $e) {
                $this->pdo->exec($createQuery);
            }
        }
    }


    public function query(string $sql, array $params = [], string $className = "stdClass"): ?array
    {
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($params);

            if ($className) {
                return $statement->fetchAll(\PDO::FETCH_CLASS, $className);
            }

            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Ошибка выполнения запроса: " . $e->getMessage();
            return [];
        }
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function getErrors()
    {
        return $this->errorArray;
    }
}
?>