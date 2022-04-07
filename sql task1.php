<?php
/*Створити таблички з даними як показано в стовпці дано і написати запит для вибірки даних з цих таблиць таким чином,
щоб в результаті вийшла табличка яка приведена в стовпці результат і записати результат в CSV файл.*/
$host = 'localhost'; // имя хоста
$user = 'root';      // имя пользователя
$pass = '';          // пароль
$name = 'tests';      // имя базы данных

$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
$query = 'SELECT
	categories.c_name as c_name, products.p_name as p_name
FROM
	categories
LEFT JOIN associations ON categories.c_id=associations .c_id
LEFT JOIN products ON associations.p_id=products.p_id';


$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

function arreyCsv($data){
    var_dump($data);
    $list = [];
    foreach ($data as $key=>$value){
        foreach ($value as $key=>$value){
             $list[]=$key.'=>'.$value;
        }
    }
    $list =array_chunk($list, 1);
    $fp = fopen('file.csv', 'w');

    foreach ($list as $fields) {
        fputcsv($fp, $fields);
    }

    fclose($fp);
}
arreyCsv($data);
