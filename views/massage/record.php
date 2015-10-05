<?php

$records = $this->select_one;

foreach ($records as $row) {
    ?>
    <hr>
    <p><?php echo $row["name"] ?></p>
    <p><?php echo $row["shorttext"] ?></p>
    <p><?php echo nl2br($row["text"]) ?></p>
    <p><a href="<?php echo URL ?>massage/delete/<?php echo $row["id"] ?>">Видалити</a>
        <a href="<?php echo URL ?>massage/edit/?mail=<?php echo $row["id"] ?>">Редагувати</a></p>
    <p>Дата редагування: <i><?php echo $row["timeupdate"] ?></i></p>
    <p>Дата створення: <i><?php echo $row["timecreate"] ?></i></p>
    <?php
}
?>