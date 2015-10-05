<?php

//кількість сторінок
$count = $this->count_page;
//теперішня сторінка
$page = $this->page;
//якщо сторінка існує виводимо пагинацію, інакше підключаємо файл помилки
if ((($page <= $count) && ($page > 0)) || $page == 1) {
    if ($page == 1) {
        echo "<span id='next'>[ назад ] </span>";
    }

    if ($page !== 1) {
        echo "<a id='page' href='massage?page=" . ($page - 1) . "'> [ назад ] </a>";
    }

    echo "сторінка", "<a id='page_num'> " . $page . " </a>";

    if ($page < $count) {
        echo "<a id='page' href='massage?page=" . ($page + 1) . "'> [ вперед ]</a>";
    }

    if ($page == $count || $count == 0) {
        echo "<span id='next'>[ вперед ]</span>";
    }
} else {
    require_once 'views/error.php';
}
?>