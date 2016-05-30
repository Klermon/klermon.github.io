<?php

$host = 'localhost'; // адрес сервера 
$database = 'mydb'; // имя базы данных
$user = 'root'; // имя пользователя
$password = ''; // пароль

// устанавливаем связь с сервером
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));

$query ="SELECT * FROM `75` WHERE `id`=1";

// делаем выборку из таблицы
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
while ($row=mysqli_fetch_array($result))
{ // выводим данные
	
	$lat = (double)$row['lat'];
	$lon = (double)$row['lon'];

	echo json_encode(array('geometry' =>(array('type' => 'Point', 'coordinates' => array($lat, $lon))), 'type' => 'Feature', 'properties' => array('mnum' => '75', 'tnum' => 'x123xx')));
  
}// /while
?>