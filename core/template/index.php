<?php
/*
	Шаблон системы комментирования zrk_comment
*/
require_once("./core/template/tpl_view.php");
?>
<!DOCTYPE html>
<html>
<!--
  Использован фреймворк bootstrap
  http://getbootstrap.com/
  Страничка вывода статьи с возможностью 
  поставить оценку и прокомментировать её
 -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Шаблон страницы со статьей</title>
    <!-- Bootstrap -->
    <link href="./core/template/css/bootstrap.min.css" rel="stylesheet">
 </head>
  <body>
    <h1>Эксперимент. Система комментирования</h1>
    <h2>Начало разработки системы комментирования</h2>
    <p>Взялся я делать систему добавления комментариев к статье. Первым делом решил сверстать быстренько шаблон. Для пущей красоты и юзабельности - использую фреймворк Bootstrap, (<a href="http://getbootstrap.com/"> http://getbootstrap.com/</a>).</p>
    <p>Скачал и взялся за дело. HTML, благо, не забыл. Пишу статью, немного шуточную и полную "воды", дабы скрасить пустое пространство и придать объема. Рыбу было брать впадлу.</p>
    <h3>По ходу придумываю себе задания</h3>
    <p>Вывести в табличку, любую базу данных SQL, по примеру:</p>
    <table class="table">
		<tr>
			<td><strong>#</strong></td>
			<td><strong>Fisrt column name</strong></td>
			<td><strong>Second column name</strong></td>
			<td><strong>Third column name</strong></td>
		</tr>
		<tr>
			<td><strong>1</strong></td>
			<td>Value</td>
			<td>Value</td>
			<td>Value</td>
		</tr>
	</table>
	<!--Форма ввода-->
	<form action="index.php" method="post">
		<div class="form-group">
			<label for="nickname">Имя</label>
			<input class="form-control" type="text" name="nickname" placeholder="Ваше имя">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input class="form-control" type="text" name="email" placeholder="Ваш email">
		</div>
		<div class="form-group">
			<label for="comment">Комментарий</label>
			<textarea class="form-control" name="comment" placeholder="Впишите Комментарий!" rows="3"></textarea>
		</div>	
		<? view_lib :: btn_view() ?>
	</form> 
	<!--Форма ввода конец-->
	<p><h3>Комментарии</h3></p>
	<!--начало вывода комментариев-->
	<? view_lib :: comments($db -> db_read()) ?>
	<!--Конец вывода комментариев-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./core/template/js/bootstrap.min.js"></script>
  </body>
</html>