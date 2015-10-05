<?php

class Massage_Model extends Model
{

//кількість записів на сторінці
    private $_per_page = 3;

//повертає кількість сторінок
    public function countPage()
    {
        $sql = "SELECT count(*) FROM msgs";
        $result = $this->db->prepare($sql);
        $result->execute();
        $pages = ceil($result->fetchColumn() / $this->_per_page);
        return $pages;
    }

//повертає всі записи
    public function selectAll()
    {
        $start = ($this->id_page - 1) * $this->_per_page;
        $sql = "SELECT * FROM blog.msgs ORDER BY id DESC LIMIT $start, $this->_per_page";
        return $this->db->query($sql);
    }


//видаляє запис
    public function deleteText($id)
    {
        $sql = "DELETE FROM msgs WHERE id=$id";
        $this->db->query($sql);
    }

//створює запис
    public function saveText($name, $shorttext, $text)
    {
        $sql = "INSERT INTO blog.msgs (
            name, shorttext, text
        )VALUES(
            '$name', '$shorttext', '$text'
       )";
        return $this->db->query($sql);
    }

//повертає один запис
    public function selectOne()
    {
        $sql = "SELECT * FROM msgs WHERE id = $this->id_record";
        return $this->db->query($sql);
    }

//редагує запис
    public function editText($id, $name, $shorttext, $text)
    {
        $sql = "UPDATE msgs SET name = '$name', shorttext = '$shorttext', text='$text' WHERE id=$id";
        $this->db->query($sql);
    }

    public function antimat()
    {
        $sql = "SELECT slovo FROM antimat";
        return $this->db->query($sql);
    }

    public function searchText()
    {
        $sql = "select * from msgs where text like '%$this->searchtext%' ORDER BY id DESC";
        return $this->db->query($sql);
    }
}
