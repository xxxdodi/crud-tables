<?php

namespace controllers;


use views\view;
use models\cars\car;
use services\db;

class maincontroller
{
    public $view;
    public $templateDir;
    public $array = [];
    public $error = [];
    public $class;  // Добавляем свойство class
    public $entitiesToGet = [];  // Добавляем свойство entitiesToGet
    public $fieldsToCheck = [];  // Добавляем свойство fieldsToCheck

    public function __construct()
    {
        $this->view = new view("/crud/templates");

        // Проверяем существование индекса [2] в explode
        $classParts = explode('\\', $this->class);
        $this->shortClass = isset($classParts[2]) ? $classParts[2] : null; //короткое название класса для редиректов

        // Проверяем, что $entitiesToGet — массив
        if (is_array($this->entitiesToGet)) {
            foreach ($this->entitiesToGet as $var => $class) {
                $this->array[] = ["$var" => $class::getAll()];
            }

        } else {
            echo "Все плохо";
        }

    }

    public function showAll()
    {
        $class = $this->class;
        $allItems = $class::getAll();
        $this->view->renderPage($this->templateDir . "/list.php", ["items" => $allItems]);
    }

    public function validateObject($object)
    {
        foreach ($_POST as $method => $value) {
            // Удаляем лишние пробелы
            $value = trim($value);

            // Преобразуем значение в int, если метод требует целого числа
            if ($method == "setCompanieId" || $method == "setBuyerId") {
                $value = filter_var($value, FILTER_VALIDATE_INT);
                if ($value === false) {
                    $this->error[] = "Неверное значение для ID компании или покупателя.";
                    continue;
                }
            }

            // Проверяем значения в полях, требующих проверки
            if (in_array($method, $this->fieldsToCheck)) {
                if (empty($value)) {
                    $this->error[] = "Поле $method не может быть пустым.";
                } elseif ($method == "setMark" && !is_numeric($value)) {
                    $this->error[] = "Поле оценки должно быть числом.";
                } else {
                    $object->$method($value);
                }
            } else {
                $object->$method($value);
            }
        }
        return $object;
    }


    public function add()
    {
        $object = new $this->class;

        // Получаем список машин и добавляем в массив данных
        $allCars = car::getAll();
        $this->array[] = ["allCars" => $allCars];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $object = $this->validateObject($object);

            if (!empty($this->error)) {
                $this->array[] = ["errors" => $this->error];
                $this->view->renderPage($this->templateDir . "/add.php", ["data" => $this->array]);
            } else {
                try {
                    $object->save();

                    if (!empty($object->getError())) {
                        $this->array[] = ["errors" => $object->getError()];
                        $this->view->renderPage($this->templateDir . "/add.php", ["data" => $this->array]);
                    } else {
                        header("Location: /crud/" . $this->shortClass);
                        exit;
                    }
                } catch (\Exception $e) {
                    $this->array[] = ["errors" => [$e->getMessage()]];
                    $this->view->renderPage($this->templateDir . "/add.php", ["data" => $this->array]);
                }
            }
        } else {
            $this->view->renderPage($this->templateDir . "/add.php", ["data" => $this->array]);
        }
    }


    public function edit(int $id)
    {
        $object = $this->class::getById($id);

        if (!$object) {
            $this->array[] = ["errors" => ["Объект с ID $id не найден."]];
            $this->view->renderPage($this->templateDir . "/edit.php", ["data" => $this->array]);
            return;
        }

        $this->array[] = ["currentItem" => $object];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $object = $this->validateObject($object);

            if (!empty($this->error)) {
                $this->array[] = ["errors" => $this->error];
                $this->view->renderPage($this->templateDir . "/edit.php", ["data" => $this->array]);
            } else {
                try {
                    $object->update();

                    if (!empty($object->getError())) {
                        $this->array[] = ["errors" => $object->getError()];
                        $this->view->renderPage($this->templateDir . "/edit.php", ["data" => $this->array]);
                    } else {
                        header("Location: /crud/" . $this->shortClass);
                        exit;
                    }
                } catch (\Exception $e) {
                    $this->array[] = ["errors" => [$e->getMessage()]];
                    $this->view->renderPage($this->templateDir . "/edit.php", ["data" => $this->array]);
                }
            }
        } else {
            $this->view->renderPage($this->templateDir . "/edit.php", ["data" => $this->array]);
        }
    }

    public function delete(int $id)
    {
        $item = $this->class::getById($id);

        if ($item) {
            try {
                $item->delete();
            } catch (\Exception $e) {
                $this->array[] = ["errors" => [$e->getMessage()]];
                $this->view->renderPage($this->templateDir . "/list.php", ["data" => $this->array]);
                return;
            }
        } else {
            $this->array[] = ["errors" => ["Объект с ID $id не найден."]];
        }

        header("Location: /crud/" . $this->shortClass);
        exit;
    }


    public function showRating()
    {
        $allCars = car::getAll();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $db = db::getInstance();
            $carId = filter_var($_POST["carId"], FILTER_VALIDATE_INT);

            if ($carId === false) {
                $this->view->renderPage("rating/rating.php", [
                    "allCars" => $allCars,
                    "errors" => ["Некорректный ID машины."]
                ]);
                return;
            }

            $value = [":id" => $carId];

            $sql = "SELECT 
                        cars.name AS car_name,
                        cars.release AS car_release,
                        buyers.name AS buyer_name,
                        companies.name AS companie_name,
                        marks.description AS description,
                        marks.mark AS mark
                    FROM cars
                    JOIN buyers ON cars.id = buyers.carId
                    JOIN cclinc ON cclinc.carId = cars.id
                    JOIN companies ON companies.id = cclinc.companieId
                    LEFT JOIN marks ON marks.buyerId = buyers.id AND marks.companieId = companies.id
                    WHERE cars.id = :id
                    ORDER BY companies.name;

                                            ";

            try {
                $statement = $db->pdo->prepare($sql);
                $statement->execute($value);

                $details = [];
                while ($fetch = $statement->fetch()) {
                    $details[] = [
                        'car_name' => $fetch['car_name'] ?? '-',
                        'car_release' => $fetch['car_release'] ?? '-',
                        'buyer_name' => $fetch['buyer_name'] ?? '-',
                        'companie_name' => $fetch['companie_name'] ?? '-',
                        'description' => $fetch['description'] ?? '-', // Проверяем существование ключа
                        'mark' => $fetch['mark'] ?? '-'               // Проверяем существование ключа
                    ];

                }

                $this->view->renderPage("rating/rating.php", [
                    "allCars" => $allCars,
                    "details" => $details
                ]);
            } catch (\PDOException $e) {
                $this->view->renderPage("rating/rating.php", [
                    "allCars" => $allCars,
                    "errors" => ["Ошибка базы данных: " . $e->getMessage()]
                ]);
            }
        } else {
            $this->view->renderPage("rating/rating.php", ["allCars" => $allCars]);
        }
    }

}

?>