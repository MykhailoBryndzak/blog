<?php
$records = $this->search;
$result = '';
foreach ($records as $row) {
    $name = nl2br($row['text']);
    $result .= "<hr>" . $name . "<br><a id='page' href='record/?mail=" . $row["id"] . "'> [ ссилка ] </a><br>";
}

if (empty($result)) {
    echo "<hr>нічого не знайдено";
} else {
    echo $result;
}


