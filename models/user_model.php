<?php

class User_Model extends Model
{
//виконує пошук по логіну, та повертає пароль
    public function doLogin($login)
    {
        $sql = "SELECT * FROM users WHERE login='$login' LIMIT 1";
        $result = $this->db->query($sql);
        $data = $result->fetch();
        return $data['password'];
    }

//реєстрація нового кристувача
    public function doRegister($login, $password)
    {
        $sql = "INSERT INTO users SET login='$login', password='$password'";
        $this->db->query($sql);
    }
}
