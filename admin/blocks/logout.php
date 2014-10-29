<?php
// файл выводит из административной зоны сайта
// открываем сессию
session_start();
// уничтожаем сессионную переменную
$_SESSION['users_login'];
session_destroy();

header('Location:../../index.php');