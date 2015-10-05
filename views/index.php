<hr>
<form action="massage/search" method="post">
    <p>
        Пошук <input type="text" name="search" placeholder="search..">
        <input type="submit" value="Знайти">
    </p>
</form>
<hr>
<?php
$records = $this->select_all;
foreach ($records as $row) {
    if (mb_strlen($row['text']) > 500) {
        $row['text'] = mb_substr(strip_tags($row['text']), 0, 450) .
            '...' . "<a href='massage/record/?mail=" . $row["id"] . "'> [ продовжити ] </a>";
    }
    ?>
    <p><a href="massage/record/?mail=<?php echo $row["id"] ?>">
            <?php echo $row["name"] ?></a></p>
    <p><?php echo $row["shorttext"] ?></p>
    <p><?php echo nl2br($row["text"]) ?></p>
    <p><a href="massage/delete/<?php echo $row["id"] ?>">Видалити</a>
        <a href="massage/edit/?mail=<?php echo $row["id"] ?>">Редагувати</a></p>
    <p><?php echo $row["timecreate"] ?></p>
    <hr>
    <?php
}

require_once 'massage/pagination.php';
?>