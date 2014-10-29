<?php
// авторизациія в адміністративній зоні
session_start();

if(isset($_SESSION['users_login']))
$users_login = $_SESSION['users_login'];

if(!$users_login) header('Location:login.php');