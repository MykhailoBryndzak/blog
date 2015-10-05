<!DOCTYPE html>
<html>
<head>
    <title>Blog Bryndzak Mykhailo</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>styles/css/main.css">
</head>
<body>
<section>
    <nav>
        <a href="<?php echo URL; ?>massage">Повідомлення</a>
        <?php
        if (IS_ADMIN) {
            ?>
            <a href="<?php echo URL; ?>massage/add">Написати</a>
            <a href="<?php echo URL; ?>user/logout">Вийти</a>
            <span>(admin)</span>
            <?php
        } else {
            ?>
            <a href="<?php echo URL; ?>user">Вхід</a>
            <?php
        }
        ?>
    </nav>