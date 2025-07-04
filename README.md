# 🚗 CRUD-приложение на PHP по шаблону MVC

## 📌 Описание

Данный проект реализует CRUD-интерфейс (создание, просмотр, редактирование, удаление) для нескольких сущностей: **покупатели, автомобили, марки, компании, автокомпании** и т.д.  
Логика приложения разделена по паттерну **MVC (Model-View-Controller)** с применением нативного PHP и HTML.

---

## ⚙️ Возможности

- ✅ Создание новых записей
- ✏️ Редактирование записей
- 🗑️ Удаление записей
- 🔍 Просмотр списка и детальной информации по каждой сущности

---

## 🧱 Архитектура проекта (MVC)

📂 `controllers/` — Контроллеры, управляющие логикой обработки запросов  
📂 `models/` — Модели, описывающие работу с данными и БД  
📂 `views/` — Представления (отображение данных пользователю)  
📂 `templates/` — Шаблоны HTML для каждой сущности  
📂 `services/` — Работа с базой данных (подключение, настройки)  
📂 `vendor/` — Сторонние библиотеки (Bootstrap, jQuery)  
📂 `js/` — JS-скрипты (например, удаление записей без перезагрузки)  
📂 `inc/` — Статичные ресурсы  
📄 `index.php` — Главная точка входа в приложение  
📄 `base.sql` — SQL базы данных

---
---

## 🛠 Используемые технологии

Проект построен с использованием следующих технологий и инструментов:

- 🐘 **PHP** — нативный PHP без использования фреймворков  
- 🌐 **HTML / CSS / JavaScript** — для построения пользовательского интерфейса  
- 🎨 **Bootstrap** — стилизация и адаптивная вёрстка  
- 💡 **jQuery** — для упрощения работы с DOM и AJAX  
- 🛢️ **MySQL** — реляционная база данных  
- 🖥️ **Apache (через XAMPP)** — локальный сервер для запуска проекта

---

## 🧭 Архитектура MVC

Ниже представлена uml диаграмма **Model-View-Controller**:

![MVC схема](https://github.com/user-attachments/assets/205ae103-eabb-4489-87f9-b04b99550c1c)

---

