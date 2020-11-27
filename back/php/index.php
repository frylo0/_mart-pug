<?php
$login = $_POST['login'];
$pass = $_POST['pass'];

require './db_info/frity.php';
$mysql = new mysqli($db_host, $db_user, $db_pass, $db_db);

setcookie('something', '', time() + 3600 * 24 * 30, "/");
$mysql->close();
?>