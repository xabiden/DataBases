<?php
$h='localhost';
$l='root';
$p='';
$id=@mysql_connect($h,$l,$p)
	
or die("������ �����������: ");
if(!$id) exit();
if(!@mysql_select_db('cinema'))
	exit("�� ����������: "); 
						?>