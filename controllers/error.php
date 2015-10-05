<?php

class Error extends Controller
{

//звертаємся до батьківського конструктора    
    function __construct()
    {
        parent::__construct();
    }

//предаємо параметр у в`юшку
    function error()
    {
        $this->view->nested('error');
    }

}
