<?php

class Massage extends Controller
{

//звертаємся до батьківського конструктора
    public function __construct()
    {
        parent::__construct();
        $this->model = new Massage_Model();
    }

    public function index()
    {
        $this->view->page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
        $this->model->id_page = $this->view->page;


        $this->view->select_all = $this->model->selectAll();
        $this->view->count_page = $this->model->countPage();

        $this->view->nested('index');
    }

    public function add()
    {
//приймає та фільтрує параметри і передає їх метод saveText()
        if (!empty($_POST)) {
            $name = $this->antimat(strip_tags($_POST["name"]));
            $shorttext = $this->antimat(strip_tags($_POST["shorttext"]));
            $text = $this->antimat(strip_tags($_POST["text"]));
            $this->model->saveText($name, $shorttext, $text);
            header('Location: /');
        }
        $this->view->nested('massage/add');
    }

    public function delete($id)
    {
//приймає параметр і передає його в метод deleteText()
        $this->model->deleteText($id);
        header('Location: /');
    }

    public function record()
    {
        $mail = (int)$_GET['mail'];
        $this->model->id_record = $mail;

        $this->view->select_one = $this->model->selectOne();

        $this->view->nested('massage/record');
    }

    public function edit()
    {
        if (!empty($_POST)) {
            $id = $_POST["id"];
            $name = $this->antimat(strip_tags($_POST["name"]));
            $shorttext = $this->antimat(strip_tags($_POST["shorttext"]));
            $text = $this->antimat(strip_tags($_POST["text"]));
            $this->model->editText($id, $name, $shorttext, $text);
            header('Location: /');
        }
        $this->view->mail = (int)$_GET['mail'];
        $this->model->id_record = $this->view->mail;

        $this->view->select_one = $this->model->selectOne();

        $this->view->nested('massage/edit');
    }

    public function antimat($text)
    {
        $result = $this->model->antimat();
        foreach ($result as $value) {
            $mat = $value['slovo'];
            $text = preg_replace("/$mat/i", "[censore]", $text);
        }
        return $text;
    }

    public function search()
    {
        if (!empty($_POST['search'])) {
            $searchtext = $_POST['search'];
            $searchtext = preg_replace("/[^0-9a-zа-я]/i", "", $searchtext);

            $this->model->searchtext = $searchtext;
            $this->view->search = $this->model->searchText();

            $this->view->nested('search');
        } else {
            header('Location: /');
        }
    }

}