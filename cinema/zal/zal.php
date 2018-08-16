
<html>
<head>
 <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<title>Залы</title>
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
	



if (($_POST['add'])&&($_POST['ID_z']<>'')&&($_POST['Nazvanie']<>'')&&($_POST['Imax']<>'')&&($_POST['Kolvo_ryadov']<>'')&&($_POST['Kolvo_mest_vsego']<>'')                           )
	{
	mysql_query("INSERT INTO zal value('".get_post('ID_z')." ', ' ".get_post('Nazvanie')."'    ,'".get_post('Imax')." ' ,'".get_post('Kolvo_ryadov')." ' ,'".get_post('Kolvo_mest_vsego')." '                       )") or die
	(mysql_error());
	}



if(($_POST['delete'])&&($_POST['rd']))
	{ 

	mysql_query("DELETE FROM zal WHERE ID_z='".$_POST['rd']."'");
	
	}

if(($_POST['edit'])&&($_POST['rd']))
	{ 
	$res=mysql_query("Select * FROM zal WHERE ID_z='".$_POST['rd']."'");
	$row=mysql_fetch_array($res);
	
	
	echo "<center>";

	echo "ID зала              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         "                                                                            ."<input type='text' name='n1' value=".$row['ID_z'].">"."<br>"."<br>";  
	echo "Название               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;            "                                                            
	."<input type='text' name='n2' value=".$row['Nazvanie'].">"."<br>"."<br>";  
	echo "Imax                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;            "                   
	.
	"<select name='n3' size='2' multiple >
    <option selected value='".$row['Imax']."'>".$row['Imax']."</option>
	<option value='yes'>yes</option>
    <option value='no'>no</option>
	</select>"
	."<br>"."<br>"; 
	echo "Количество рядов                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"       ."<input type='text' name='n4' value=".$row['Kolvo_ryadov'].">"."<br>"."<br>";
	echo "Мест всего           &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         "                                                                                                          ."<input type='text' name='n5' value=".$row['Kolvo_mest_vsego'].">"."<br>"."<br>";
	
	
	
	
	
	echo "<input type='hidden' name='n6' value=".$row['ID_z'].">";
	echo "<input type=submit name=save style=background-color:#c1c0c8; value='Сохранить' >";
	echo "</center>";

	
	}
if(($_POST['save']))
	{mysql_query("Update zal set ID_z='".get_post('n1')."',Nazvanie='".get_post('n2')."',Imax='".get_post('n3')."',Kolvo_ryadov='".get_post('n4')."',Kolvo_mest_vsego='".get_post('n5')."'
	WHERE ID_z='".$_POST['n6']."'");}




$q='select * from zal';
	$res=@mysql_query($q) or die (mysql_error());

						
?>


<table border=1 bgcolor="#d8e3e5" align="center">
<caption>  <em><font size="9" color="#466b75" face="Sans;  "> Залы</font> </em></caption>

<tr>
<th><img src="favicon.ico"</th>
<th>ID</th>
<th>Название</th> 
<th>Imax</th> 
<th>Количество рядов</th> 
<th>Всего мест</th> 

</tr>



<?php



while($row=mysql_fetch_array($res))
{
	echo "<tr><td><input type=radio name=rd value=".$row['ID_z']."></td><td>".$row['ID_z']."</td><td>".$row['Nazvanie']."</td><td>".$row['Imax']."</td><td>".$row['Kolvo_ryadov']."</td><td>".$row['Kolvo_mest_vsego']."</td></tr>";
	

}



echo "</table>";

		
?>



<br>

<table border=1 bgcolor="#d8e3e5" align="center">
<tr>><th>ID</th><td><input type=text name=ID_z value=''style="background-color: #d8e3e6"></td></tr>
<tr><th>Название</th><td><input type=text name=Nazvanie value=''style="background-color: #d8e3e6"></td></tr>
<tr><th>Imax</th><td>
<select name="Imax" size="1" multiple >
    <option selected value="yes">Да</option>
    <option value="no">Нет</option>
	</select>

</td></tr>
<tr><th>Количество рядов</th><td><input type=text name=Kolvo_ryadov value=''style="background-color: #d8e3e6"></td></tr>
<tr><th>Количество мест всего</th><td><input type=text name=Kolvo_mest_vsego value=''style="background-color: #d8e3e6"></td></tr>

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
<p align="right" ><a href="../seance/seance.php">Сеансы</a><p>
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
	



