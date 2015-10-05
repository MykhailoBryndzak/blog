<?php

class Router
{

    public function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
//видаляє символ слеша з кінця рядка
//та розділяє на частини 
        $url = rtrim($url, '/');
        $url = explode('/', $url);
//якщо пешої частини немає(назви класу) підключає файл та викликає головну сторінку
        if (empty($url[0])) {
            require_once 'controllers/massage.php';
            $controller = new Massage();
            return $controller->index();
        }

//якщо файл існує, підключаємо його, інакше підключаемо файл помилки
        $file = 'controllers/' . $url[0] . '.php';
        if (file_exists($file)) {
            require_once $file;
        } else {
            return $this->error();
        }

        $controller = new $url[0];

//якщо параметри існують викликаємо метод і передаємо параметри

        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->$url[1]($url[2]);
            } else {
                return $this->error();
            }
        } else {
//інакше викликаємо метод без параметрів
            if (isset($url[1])) {
                if (method_exists($controller, $url[1])) {
                    $controller->$url[1]();
                } else {
                    return $this->error();
                }
            } else {
                $controller->index();
            }
        }
    }

//метод підключення помилок
    public function error()
    {
        require_once 'controllers/error.php';
        $controller = new Error();
        return $controller->error();
    }
}