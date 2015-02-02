<?php
/*
	Контроллер - прием и обработка данных от пользователя,
	классы связывающие модель и вид, (отсыл данных в базу)
*/
	if ($_POST['email'] != null){
		$db -> db_write(date(m), $_POST['nickname'], $_POST['email'], $_POST['comment']);
	}
?>