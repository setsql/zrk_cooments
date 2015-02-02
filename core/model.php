<?php
/*
	Набор классов, с функциями отвечающими за работу с базой данных
	Для работы с базой данных используем расширение mysqli
*/
// Создаем объект подключения к базе
define ("DB_HOST", "localhost");
define ("DB_USERNAME", "root");
define ("DB_PASSWORD", "");
define ("DB_NAME", "zrk_comment");
define ("DB_TABLE_NAME", "zrk_comments");

// echo $mysqli -> client_info."\n";

/*
	Далее необходимо написать класс для работы с базой
	- чтение
	- запись
	Чтение будет вызываться из ВИДа, запись соответственно из
	КОНТРОЛЛЕРа
*/
class zrk_db{
	// Функция соединения с базой
	function db_connection(){
		$this -> mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
		// Проверка наличия ошибок соединения
		if ($this -> mysqli -> connect_errno){
			echo "Не удалось подключится к MySQL: (".$this -> mysqli -> connect_errno.")".$this -> mysqli -> connect_error;
		}
		// Проверка наличия таблиц в базе
		// В случае отсутствия создается таблица zrk_comments
	}
	// Функция проверки на существование таблицы DB_TABLE_NAME в базе
	function db_create_check(){
		$this -> db_connection();
		if ($this -> mysqli -> query("CREATE TABLE ".DB_TABLE_NAME."(
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			date VARCHAR(30), 
			nick VARCHAR(100), 
			email VARCHAR(100), 
			message TEXT)") === TRUE){
//			echo "Таблица создана только что</br>";
		} else{
			echo $this -> mysqli -> connect_error;
//			echo "Таблица создана ранее</br>";
		} 	
	}
	// Функция чтения из базы
	function db_read(){
		$this -> db_create_check();
		// Извлечение ассоциативного массива
		static $com_counter;
		$com_counter=0;
		if ($result = $this -> mysqli -> query("SELECT * FROM ".DB_TABLE_NAME)){
			while ($column = $result -> fetch_assoc()){
				$column_array[$com_counter] = $column;
				$com_counter++;
			}
			// очищаем выборку
			$result -> free();
		}
		return $column_array;
	}
	// функция записи в таблицу
	// $entered - значение
	// $where - куда пишем
	function db_write($zrk_date, $nick, $email, $message){
		$this -> db_create_check();
		$this -> zrk_date = $zrk_date;
		$this -> nick = $nick;
		$this -> email = $email;
		$this -> message = $message;
		$this -> mysqli -> query("INSERT INTO `".DB_NAME."`.`".DB_TABLE_NAME."` (`id`, `date`, `nick`, `email`, `message`) VALUES (NULL, '".$this -> zrk_date."', '".$this -> nick."', '".$this -> email."', '".$this -> message."')");  		
	}
}
$db = new zrk_db;
//$db -> db_write(1, 2, "sfsd", "32trgdfbfdhbfgnvcncvnx ");
//print_r ($db -> db_read());



?>
























