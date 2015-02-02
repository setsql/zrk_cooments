<?php
/*
	Библиотека с классами для реализации различных 
	визуальных интерактивных моментов
	(решено было создать, когда встала необходимость
	поменять цвет кнопки submit, в случае ошибки)
*/
class view_lib {
	static function btn_view(){
		echo "<button type=\"submit\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-bullhorn\"></span> Комментировать</button>";
	}
	static function comments($comments_array){
		for ($i = 0; $i < count($comments_array); $i++){
			echo "<p><span class=\"label label-default\">".$comments_array[$i]['id']."</span><em> Автор: ".$comments_array[$i]['nick']."</em></p>\n";
			echo "<p>".$comments_array[$i]['message']."</p>\n";
		}
	}
}
?>