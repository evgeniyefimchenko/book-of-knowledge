<?php
/**
* Подключаем все функции проекта
*/


/**
* Подключает технические файлы приложения
*/
function include_app_files() {
	$filelist = glob(__DIR__ . DIRECTORY_SEPARATOR . '*.php');
	foreach ($filelist as $item) {
		if ($item != __DIR__ . DIRECTORY_SEPARATOR . 'func.php') {
			require($item);
		}
	}	
}
