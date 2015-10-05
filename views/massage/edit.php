<?php
$records = $this->select_one;

foreach ($records as $row) {
    ?>
    <hr>
    <form action="../edit" method="post">
        <p>Змінити запис: <br><input type="hidden" name="id" size="8" value="<?php echo $this->mail ?>"</p>

        <p><input type="text" name="name" size="35" value="<?php echo $row["name"] ?>"</p>

        <p><input type="text" name="shorttext" size="35" value="<?php echo $row["shorttext"] ?>"</p>

        <p><textarea style="resize:none" name="text" cols="60"
                     rows="15"><?php echo $row["text"] ?></textarea></p>

        <p><input type="submit" value="Зберегти"></p>
    </form>
    <?php
}
?>