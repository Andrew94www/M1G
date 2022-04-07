<?php
/*Написати запит або набір запитів в результаті виконання яких дані з таблички приведеної в
стовпці дано будуть лише з унікальними значеннями keysss,
наприклад як у стовпці результат */
$host = 'localhost'; // имя хоста
$user = 'root';      // имя пользователя
$pass = '';          // пароль
$name = 'tests';      // имя базы данных

$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
$query = 'SELECT min(id) as id ,keysss FROM test_table GROUP BY keysss';

$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

var_dump($data);

