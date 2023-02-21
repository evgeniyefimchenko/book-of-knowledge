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

/**
* Вернёт массив, дерево каталогов с файлами
*/
function get_tree_categories($dir = APP_PATH . DIRECTORY_SEPARATOR . 'files', $res = [], $recursion = 0) {
	$files = array_diff(scandir($dir), ['.', '..', '.htaccess']);
	foreach ($files as $d) {
		$path = $dir . DIRECTORY_SEPARATOR . $d;
		$key_path = str_replace(APP_PATH . DIRECTORY_SEPARATOR . 'files', '', $dir);
		$key_path = $key_path ? $key_path : '/';
		if (is_dir($path)) {
			$res['catalogs'][$key_path][] = $d;			
			$res = get_tree_categories($path, $res, $recursion++);
		} else {
			$res['materials'][$key_path][] = $d;
		}
	}	
	return $res;
}

/**
* Вернёт меню каталогов с файлами
*/
function get_menu_catalogs() {
	$res = '<ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
	foreach (get_tree_categories() as $item) {
		foreach ($item['catalogs'] as $cat) {
			$res .= '<li><a class="dropdown-item" href="#">' . $cat . '</a></li>';
		}		
	}
	$res .= '</ul>';
	return $res;
}