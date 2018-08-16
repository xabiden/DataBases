
<html>
<head>
 <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<title>Сеанс</title>
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
	



if (($_POST['add'])&&($_POST['ID_s']<>'')&&($_POST['ID_z']<>'')&&($_POST['ID_f']<>'')&&($_POST['Date']<>'')&&($_POST['Vremya']<>'')&&($_POST['Razmernost']<>'')&&($_POST['Dlitelnost']<>'')                           )
	{
	mysql_query("INSERT INTO seance value('".get_post('ID_s')." ', ' ".get_post('ID_z')."'    ,'".get_post('ID_f')." ' ,'".get_post('Date')." ' ,'".get_post('Vremya')." '  ,'".get_post('Razmernost')." '  ,'".get_post('Dlitelnost')." '                      )") or die
	(mysql_error());
	}


if(($_POST['delete'])&&($_POST['rd']))
	{ 

	mysql_query("DELETE FROM seance WHERE ID_s='".$_POST['rd']."'");
	
	}

if(($_POST['edit'])&&($_POST['rd']))
	{ 
	$res=mysql_query("Select * FROM seance WHERE ID_s='".$_POST['rd']."'");
	$row=mysql_fetch_array($res);
	
	
	echo "<center>";

	echo "ID Сеанса   "."<input type='text' name='n1' value=".$row['ID_s'].">"."<br>"."<br>";  
	echo "Зал           "  .
		"<input type='text' name='n2' value=".$row['ID_z'].">"."<br>"."<br>";  
	
	
	
	
	echo "Размерность   "       
	.
	"<select name='n3' size='2' multiple >
    
	<option value='2d'>2d</option>
    <option value='3d'>3d</option>
	</select>"
	."<br>"."<br>"; 
	echo "Фильм  " ."<input type='text' name='n4' value=".$row['ID_f'].">"."<br>"."<br>";
	echo "Дата          " ."<input type='date' name='n5' value=".$row['Date'].">"."<br>"."<br>";
	echo "Время    " ."<input type='time' name='n6' value=".$row['Vremya'].">"."<br>"."<br>";
	echo "Длительность        "  ."<input type='time' name='n7' value=".$row['Dlitelnost'].">"."<br>"."<br>";
	
	
	
	
	echo "<input type='hidden' name='n8' value=".$row['ID_s'].">";
	echo "<input type=submit name=save style=background-color:#c1c0c8; value='Сохранить' >";
	echo "</center>";

	
	}
if(($_POST['save']))
	{mysql_query("Update seance set ID_s='".get_post('n1')."',ID_z='".get_post('n2')."',Razmernost='".get_post('n3')."',ID_f='".get_post('n4')."',Date='".get_post('n5')."',Vremya='".get_post('n6')."',Dlitelnost='".get_post('n7')."'
	WHERE ID_s='".$_POST['n8']."'");}




$q='select * from seance';
	$res=@mysql_query($q) or die (mysql_error());

						
?>


<table border=1 bgcolor="#d8e3e5" align="center">
<caption>  <em><font size="9" color="#466b75" face="Sans;  "> Сеансы</font> </em></caption>

<tr>
<th><img src="favicon.ico"></th>
<th>ID</th>
<th>Зал</th> 
<th>Фильм</th> 
<th>Дата</th> 
<th>Время</th> 
<th>Размерность</th> 
<th>Длительность</th> 

</tr>



<?php



while($row=mysql_fetch_array($res))
{
	echo "<tr><td><input type=radio name=rd value=".$row['ID_s']."></td><td>".$row['ID_s']."</td><td>".$row['ID_z']."</td><td>".$row['ID_f']."</td><td>".$row['Date']."</td><td>".$row['Vremya']."</td><td>".$row['Razmernost']."</td><td>".$row['Dlitelnost']."</td></tr>";
	
    
}



echo "</table>";

		
?>



<br>

<table border=1 bgcolor="#d8e3e5" align="center">
<tr><th>ID</th><td><input type=text name=ID_s value=''style="background-color: #d8e3e6"></td></tr>
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

</td>
</tr>


<tr><th>Фильм</th><td>

	<select name="ID_f">
	<?php
	$qr="SELECT ID_f,Nazvanie FROM film order by ID_f";
	$rs=mysql_query($qr);
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC))
	{
		echo "  
		<option value='".$row['ID_f']."  '>		".$row['Nazvanie']."		</option>";
		
	}
	
	?>
</select>
</td>


<tr><th>Дата </th><td><input type="date" name=Date value=''style="background-color: #d8e3e6"></td></tr>
<tr><th>Время</th><td><input type="time" name=Vremya value=''style="background-color: #d8e3e6"></td></tr>


<tr><th>Размерность</th><td>

<select name="Razmernost" size="1" multiple >
    <option selected value="2d">2d</option>
    <option value="3d">3d</option>
	</select>

</td></tr>


<tr><th>Длительность</th><td><input type="time" name=Dlitelnost value=''style="background-color: #d8e3e6"></td></tr>


</table>
<br>
<table  width="20%" align="center">
<tr>
<td colspan=2><input type=submit name=add value='Вставить' style="background-color:#c1c0c8;"></td>
<td><input type=submit name=edit value='Редактировать' style="background-color:#c1c0c8;"></td>
<td><input type=submit name=delete value='Удалить' style="background-color:#c1c0c8;"></td>


</tr>
</table>

</form>
<p align="right" ><a href="../main/menu.html">На главную</a><p>
<p align="right" ><a href="../film/film.php">Фильмы</a><p>
<p align="right" ><a href="../zal/zal.php">Залы</a><p>
<p align="right" ><a href="../mesta/mesta.php">Места</a><p>
<p align="right" ><a href="../tickets/tickets.php">Билеты</a><p>

</body>
</html>






<?php
mysql_close();
function get_post($var)
{return mysql_real_escape_string($_POST[$var]);
}




?>
	



