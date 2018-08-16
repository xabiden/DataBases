<?php
$h='localhost';
$l='root';
$p='';
$id=@mysql_connect($h,$l,$p)
	
or die("Ошибка подключения: ");
if(!$id) exit();
if(!@mysql_select_db('cinema'))
	exit("Бд недоступна: "); 
						?>