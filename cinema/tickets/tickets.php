
<html>
<head>
 <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<title>Билеты</title>
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
	



if (($_POST['add'])&&($_POST['ID_t']<>'')&&($_POST['Date']<>'')&&($_POST['Time']<>'')&&($_POST['ID_z']<>'')&&($_POST['Ryad']<>'') &&($_POST['Mesto']<>'') &&($_POST['Price']<>'') &&($_POST['ID_s']<>'')                         )
	{
	mysql_query("INSERT INTO tickets value('".get_post('ID_t')." ', ' ".get_post('Date')."'    ,'".get_post('Time')." ' ,'".get_post('ID_z')." ' ,'".get_post('Ryad')." ' ,'".get_post('Mesto')." ' ,'".get_post('Price')." ' ,'".get_post('ID_s')." '                                )") or die
	(mysql_error());
	}



if(($_POST['delete'])&&($_POST['rd']))
	{ 

	mysql_query("DELETE FROM tickets WHERE ID_t='".$_POST['rd']."'");
	
	}

if(($_POST['edit'])&&($_POST['rd']))
	{ 
	$res=mysql_query("Select * FROM tickets WHERE ID_t='".$_POST['rd']."'");
	$row=mysql_fetch_array($res);
	
	
	echo "<center>";

	echo "ID билета   "."<input type='text' name='n1' value=".$row['ID_t'].">"."<br>"."<br>";  
	echo "Дата 	"."<input type='text' name='n2' value=".$row['Date'].">"."<br>"."<br>";  
	echo "Время  " ." <input type='text' name='n3' value=".$row['Time'].">"."<br>"."<br>"; 
	echo " Зал "       ."<input type='text' name='n4' value=".$row['ID_z'].">"."<br>"."<br>";
	echo "Ряд  "."<input type='text' name='n5' value=".$row['Ryad'].">"."<br>"."<br>";
	echo "Место  "."<input type='text' name='n6' value=".$row['Mesto'].">"."<br>"."<br>";
	echo "Цена  "."<input type='text' name='n7' value=".$row['Price'].">"."<br>"."<br>";
	echo "Сеанс  "."<input type='text' name='n8' value=".$row['ID_s'].">"."<br>"."<br>";
	
	
	
	echo "<input type='hidden' name='n9' value=".$row['ID_t'].">";
	echo "<input type=submit name=save style=background-color:#c1c0c8; value='Сохранить' >";
	echo "</center>";

	
	}
if(($_POST['save']))
	{mysql_query("Update tickets set ID_t='".get_post('n1')."',Date='".get_post('n2')."',Time='".get_post('n3')."',ID_z='".get_post('n4')."',Ryad='".get_post('n5')."',Mesto='".get_post('n6')."',Price='".get_post('n7')."',ID_s='".get_post('n8')."'
	WHERE ID_z='".$_POST['n9']."'");}




$q='select * from tickets';
	$res=@mysql_query($q) or die (mysql_error());

						
?>


<table border=1 bgcolor="#d8e3e5" align="center">
<caption>  <em><font size="9" color="#466b75" face="Sans;  "> Билеты</font> </em></caption>

<tr>
<th><img src="favicon.ico"</th>
<th>ID</th>
<th>Дата</th> 
<th>Время</th> 
<th>Зал</th> 
<th>Ряд</th> 
<th>Место</th> 
<th>Цена</th> 
<th>Сеанс</th> 

</tr>



<?php



while($row=mysql_fetch_array($res))
{
	echo "<tr><td><input type=radio name=rd value=".$row['ID_t']."></td><td>".$row['ID_t']."</td><td>".$row['Date']."</td><td>".$row['Time']."</td><td>".$row['ID_z']."</td><td>".$row['Ryad']."</td><td>".$row['Mesto']."</td><td>".$row['Price']."</td><td>".$row['ID_s']."</td></tr>";
	

}



echo "</table>";

		
?>



<br>

<table border=1 bgcolor="#d8e3e5" align="center">
<tr>><th>ID</th><td><input type=text name=ID_t value=''style="background-color: #d8e3e6"></td></tr>
<tr><th>Дата</th><td><input type="date" name=Date value=''style="background-color: #d8e3e6"></td></tr>
<tr><th>Время</th><td> <input type="time" name=Time value=''style="background-color: #d8e3e6"> </td></tr>
<tr><th>Зал</th><td>
<select name="ID_z">
	<?php
	$qr="SELECT ID_z,Nazvanie FROM zal order by ID_z";
	$rs=mysql_query($qr);
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC))
	{
		echo "  
		<option value='".$row['ID_z']."  '>		".$row['Nazvanie']."		</option>";
		
	}
	
	?>
</select>


<tr><th>Ряд</th><td>

<select name="Ryad">
	<?php
	$qr="SELECT Ryad FROM mesta order by Ryad";
	$rs=mysql_query($qr);
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC))
	{
		echo "  
		<option value='".$row['Ryad']."  '>		".$row['Ryad']."		</option>";
		
	}
	
	?>
</select>

</td></tr>
<tr><th>Место</th><td>
<select name="Mesto">
	<?php
	$qr="SELECT Mesto FROM mesta order by Mesto";
	$rs=mysql_query($qr);
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC))
	{
		echo "  
		<option value='".$row['Mesto']."  '>		".$row['Mesto']."		</option>";
		
	}
	
	?>
</select>

</td></tr>
<tr><th>Цена</th><td><input type=text name=Price value=''style="background-color: #d8e3e6"></td></tr>
<tr><th>Сеанс</th><td>

<select name="ID_s">
	<?php
	$qr="SELECT ID_s FROM seance order by ID_s";
	$rs=mysql_query($qr);
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC))
	{
		echo "  
		<option value='".$row['ID_s']."  '>		".$row['ID_s']."		</option>";
		
	}
	
	?>
</select>








</td></tr>

</table>
<br>
<table  width="20%" align="center">
<tr>
<td colspan=2><input type=submit name=add value='Вставить' style="background-color:#c1c0c8;"></td>
<td><input type=submit name=edit value='Редактировать' style="background-color:#c1c0c8;"></td>
<td><input type=submit name=delete value='Удалить'style="background-color:#c1c0c8;"></td>


</tr>
</table>

</form>
<p align="right" ><a href="../main/menu.html">На главную</a><p>
<p align="right" ><a href="../film/film.php">Фильмы</a><p>
<p align="right" ><a href="../zal/zal.php">Залы</a><p>
<p align="right" ><a href="../mesta/mesta.php">Места</a><p>
<p align="right" ><a href="../seance/seance.php">Сеансы</a><p>

</body>
</html>






<?php
mysql_close();
function get_post($var)
{return mysql_real_escape_string($_POST[$var]);
}




?>
	



