<?php
/**
* Определит константы проекта
*/

$const['SITE_HASH'] = 1; // Логическая константа
$const['APP_NAME'] = 'Книга знаний'; // Имя приложения
$const['APP_URL'] = str_replace('index.php', '', parse_url($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'], PHP_URL_PATH)); // URL путь к папке приложения

foreach ($const as $name => $val) {
    if (defined($name)) {
		echo 'Невозможно переопределить константу ' . $name . '<br/>';
	} else {
		define($name, $val);
	}
}
