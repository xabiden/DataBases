
<html>
<head>
 <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<title>Фильмы</title>
  <style>
  
   body {
	  
	
    background: url(bg.jpg) no-repeat;
    -moz-background-size: 100%; /* Firefox 3.6+ */
    -webkit-background-size: 100%; /* Safari 3.1+ и Chrome 4.0+ */
    -o-background-size: 100%; /* Opera 9.6+ */
    background-size: 100%; /* Современные браузеры */
	background-attachment: fixed;
   }
  </style>
<body text="#385866">


<form method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
<?php
	REQUIRE_ONCE('config.php');
	mysql_query("SET NAMES cp1251");
	



if (($_POST['add'])&&($_POST['ID_f']<>'')&&($_POST['Nazvanie']<>'')&&($_POST['Zhanr']<>'')&&($_POST['Year']<>'')&&($_POST['Dlitelnost']<>'')&&($_POST['Proizvodstvo']<>'')&&($_POST['Vozrastnie_ogr']<>'')  &&($_POST['Rezhiser']<>'')  &&($_POST['Actors']<>'')                          )
	{
	mysql_query("INSERT INTO film value('".get_post('ID_f')." ', ' ".get_post('Nazvanie')."'    ,'".get_post('Zhanr')." ' ,'".get_post('Year')." ' ,'".get_post('Dlitelnost')." '  ,'".get_post('Proizvodstvo')." '  ,'".get_post('Vozrastnie_ogr')." '  ,'".get_post('Rezhiser')." ' ,'".get_post('Actors')." '                      )") or die
	(mysql_error());
	}



if(($_POST['delete'])&&($_POST['rd']))
	{ 

	mysql_query("DELETE FROM film WHERE ID_f='".$_POST['rd']."'");
	
	}

if(($_POST['edit'])&&($_POST['rd']))
	{ 
	$res=mysql_query("Select * FROM film WHERE ID_f='".$_POST['rd']."'");
	$row=mysql_fetch_array($res);
	
	
	echo "<center>";

	echo "ID фильма              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         "                                                                            ."<input type='text' name='n1' value=".$row['ID_f'].">"."<br>"."<br>";  
	echo "Название               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;            "                                                             ."<input type='text' name='n2' value=".$row['Nazvanie'].">"."<br>"."<br>";  
	echo "Жанр                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;            "                   ."<input type='text' name='n3' value=".$row['Zhanr'].">"."<br>"."<br>"; 
	echo "Год                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"       ."<input type='text' name='n4' value=".$row['Year'].">"."<br>"."<br>";
	echo "Длительность           &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         "                                                                                                          ."<input type='text' name='n5' value=".$row['Dlitelnost'].">"."<br>"."<br>";
	echo "Производство           &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        "                                                                                                           ."<input type='text' name='n6' value=".$row['Proizvodstvo'].">"."<br>"."<br>";
	echo "Возрастные ограничения &nbsp;&nbsp;"                                                                                                                                                                                                                          ."<input type='text' name='n7' value=".$row['Vozrastnie_ogr'].">"."<br>"."<br>";
	echo "Режисёр                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;             "                                                ."<input type='text' name='n8' value=".$row['Rezhiser'].">"."<br>"."<br>";
	echo "Актёры                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;           "                                            ."<input type='text' name='n9' value=".$row['Actors'].">"."<br>"."<br>";
	
	
	
	
	
	echo "<input type='hidden' name='n10' value=".$row['ID_f'].">";
	echo "<input type=submit name=save style=background-color:#c1c0c8; value='Сохранить' >";
	echo "</center>";

	
	}
if(($_POST['save']))
	{mysql_query("Update film set ID_f='".get_post('n1')."',Nazvanie='".get_post('n2')."',Zhanr='".get_post('n3')."',Year='".get_post('n4')."',Dlitelnost='".get_post('n5')."',Proizvodstvo='".get_post('n6')."',Vozrastnie_ogr='".get_post('n7')."',Rezhiser='".get_post('n8')."',Actors='".get_post('n9')."'
	WHERE ID_f='".$_POST['n10']."'");}




$q='select * from film';
	$res=@mysql_query($q) or die (mysql_error());

						
?>


<table border=1 bgcolor="#d8e3e5" align="center">
<caption>  <em><font size="9" color="#466b75" face="Sans;  "> Фильмы</font> </em></caption>

<tr>
<th><img src="favicon.ico"</th>
<th>ID</th>
<th>Название</th> 
<th>Жанр</th> 
<th>Год</th> 
<th>Длительность</th> 
<th>Производство</th> 
<th>Возрастные ограничения</th> 
<th>Режисёр</th> 
<th>Актёры</th> 
</tr>



<?php



while($row=mysql_fetch_array($res))
{
	echo "<tr><td><input type=radio name=rd value=".$row['ID_f']."></td><td>".$row['ID_f']."</td><td>".$row['Nazvanie']."</td><td>".$row['Zhanr']."</td><td>".$row['Year']."</td><td>".$row['Dlitelnost']."</td><td>".$row['Proizvodstvo']."</td><td>".$row['Vozrastnie_ogr']."</td><td>".$row['Rezhiser']."</td><td>".$row['Actors']."</td></tr>";
	

}



echo "</table>";
mysql_close();
		
?>
<br>

<table border=1 bgcolor="#d8e3e5" align="center">
<tr><th>ID</th><td><input type=text name=ID_f value=''style="background-color: #d8e3e6"></td></tr>
<tr><th>Название</th><td><input type=text name=Nazvanie value=''style="background-color: #d8e3e6"></td></tr>
<tr><th>Жанр</th><td><input type=text name=Zhanr value=''style="background-color: #d8e3e6"></td></tr>
<tr><th>Год</th><td><input type=text name=Year value=''style="background-color: #d8e3e6"></td></tr>
<tr><th>Длительность</th><td><input type="time" name=Dlitelnost value=''style="background-color: #d8e3e6"></td></tr>
<tr><th>Производство</th><td><input type=text name=Proizvodstvo value=''style="background-color: #d8e3e6"></td></tr>
<tr><th>Возрастные ограничения</th><td><input type=text name=Vozrastnie_ogr value=''style="background-color: #d8e3e6"></td></tr>
<tr><th>Режисёр</th><td><input type=text name=Rezhiser value='' style="background-color: #d8e3e6"></td></tr>
<tr><th>Актёры</th><td><input type=text name=Actors value=''style="background-color: #d8e3e6"></td></tr>
</table>
<br>
<table  width="20%" align="center">
<tr>
<td colspan=2><input type=submit name=add value='Вставить' style="background-color:#c1c0c8;"></td>
<td><input type=submit name=edit value='Редактировать' style="background-color:#c1c0c8;"></td>
<td><input type=submit name=delete value='Удалить'style="background-color:#c1c0c8;"></td>
<td><input type=submit name=delete value='Удалить'style="background-color:#c1c0c8;"></td>


</tr>
</table>

</form>
<p align="right" ><a href="../main/menu.html">На главную</a><p>
<p align="right" ><a href="../tickets/tickets.php">Билеты</a><p>
<p align="right" ><a href="../zal/zal.php">Залы</a><p>
<p align="right" ><a href="../mesta/mesta.php">Места</a><p>
<p align="right" ><a href="../seance/seance.php">Сеансы</a><p>

</body>
</html>






<?php
function get_post($var)
{return mysql_real_escape_string($_POST[$var]);
}




?>
	



