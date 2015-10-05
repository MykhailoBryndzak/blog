<?php

class User extends Controller {
//звертаємся до батьківського конструктора
    function __construct() {
        parent::__construct();
        $this->model = new User_Model();
    }

    public function index() {
//перевіряє чи прийшли дані POST, якщо так передає їх у метод
        if(!empty($_POST)){
            $login = $_POST['login'];
            $password = $this->model->doLogin($login);
//перевіряє чи паролі співпадають, якщо так запускає сесію
            if($password == md5(md5($_POST['password']))){
                $_SESSION['IS_ADMIN'] = TRUE;
                header('Location: /');
//інакше просимо ввести дані спочатку
            } else {
                header('Location: ../user');
            }
        }
        $this->view->nested('user/login');
    }
    public function register(){
//перевіряє чи прийшли дані POST, якщо так предає їх у метод
//та перенаправляє на сторінку входу
        if(!empty($_POST)){
            $login = $_POST['login'];
//провіряє чи співпадають паролі
            if($_POST['password'] == $_POST['check']){
                $password = md5(md5($_POST['password']));
                $this->model->doRegister($login, $password);
                header('Location: /');
            }
        }
        $this->view->nested('user/register');
    }
    public function logout(){
//закінчує сесію та перанаправляє на головну сторінку
        unset($_SESSION['IS_ADMIN']);
        header('Location: /');
    }
}