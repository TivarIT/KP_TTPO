<?php
$mysql = mysqli_connect('localhost', 'root', '', 'test2');
if (!$mysql) {
    die('Error connect to DataBase');
}
