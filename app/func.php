<?php
/**
* Подключаем все функции проекта
*/

global $menu_data;

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
function get_tree_categories($dir = APP_PATH . DIRECTORY_SEPARATOR . 'files', $res = []) {
	$files = array_diff(scandir($dir), ['.', '..', '.htaccess']);
	foreach ($files as $d) {
		$path = $dir . DIRECTORY_SEPARATOR . $d;
		$key_path = str_replace(APP_PATH . DIRECTORY_SEPARATOR . 'files', '', $dir);
		$key_path = $key_path ? $key_path : '/';
		if (is_dir($path)) {
			$res['catalogs'][$key_path][] = $d;			
			$res = get_tree_categories($path, $res);
		} else {
			$res['materials'][$key_path][] = $d;
		}
	}	
	return $res;
}

/**
* Вернёт меню каталогов с файлами
*/
function get_menu_catalogs($catalogs, $parent = '/', $sub_menu = false) {	
	global $menu_data;
	$res = '<ul class="dropdown-menu" role="menu">';	
	foreach ($catalogs[$parent] as $item) {
		$item_key = $parent == '/' ? $parent . $item : $parent . DIRECTORY_SEPARATOR . $item;
		$sub_category = isset($catalogs[$item_key]) ? get_menu_catalogs($catalogs, $item_key, true) : '';
		$materials = '';
		if (isset($menu_data['materials'][$item_key])) {
			foreach ($menu_data['materials'][$item_key] as $file_item) {
				$href_file = '//' . APP_URL . 'files' . $item_key . '/' . $file_item;
				$materials .= '<li class="files"><a class="dropdown-item" href="' . $href_file . '">&nbsp; &nbsp;' . get_title_name_file(APP_PATH . DIRECTORY_SEPARATOR . 'files' . $item_key . DIRECTORY_SEPARATOR . $file_item) . '</a></li>';
			}
		}		
		$res .= '<li' . ($sub_category ? ' class="dropdown-submenu catalogs"' : ' class="catalogs"') . '><a class="dropdown-item" href="#">' . $item . '</a>' . 
		$sub_category . '</li>' . $materials;
	}
	$res .= '</ul>';
	return $res;
}

/**
* Напечатает меню
*/
function print_general_menu() {
	global $menu_data;
	$menu_data = get_tree_categories();
	return get_menu_catalogs($menu_data['catalogs']);
}

/**
* Вернёт человекочитаемый заголовок у материала
*/
function get_title_name_file($file_path) {
	if (!file_exists($file_path)) {
		return 'Ошибка чтения файла!<br/>' . $file_path;
	}
	return str_replace(['{{', '}}'], '', file($file_path)[0]);
}
