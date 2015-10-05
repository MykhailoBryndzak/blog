<?php

//підключаємся до сервера БД
class DataBase extends PDO
{
    public function __construct()
    {
        try {
            parent::__construct("mysql:host=" . DB_HOST . ";
                dbname=" . DB_NAME, DB_LOG, DB_PASS);
        } catch (PDOException $e) {
            die("Не вдалось підключитися до бази даних");
        }
    }
}