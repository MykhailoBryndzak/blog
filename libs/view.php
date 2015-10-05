<?php

class View
{
//приймаємо параметр та підключаемо в`юшки
    public function nested($name)
    {
        require_once 'views/header.php';
        require_once 'views/' . $name . '.php';
        require_once 'views/footer.php';
    }
}
