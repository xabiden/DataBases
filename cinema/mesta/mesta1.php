<html>
<head>
 <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<title>�����</title>
  <style>
  
   body {
    background: url(bg.jpg) no-repeat;
    -moz-background-size: 100%; /* Firefox 3.6+ */
    -webkit-background-size: 100%; /* Safari 3.1+ � Chrome 4.0+ */
    -o-background-size: 100%; /* Opera 9.6+ */
    background-size: 100%; /* ����������� �������� */
	background-attachment: fixed;
   }
  </style>
<body text="#385866">


<form method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
<?php
	REQUIRE_ONCE('config.php');
	mysql_query("SET NAMES cp1251");
	



if (($_POST['add'])&&($_POST['Ryad']<>'')&&($_POST['Mesto']<>'')&&($_POST['Kategoriya']<>'')&&($_POST['Sostoyanie']<>'')                           )
	{
	mysql_query("INSERT INTO Mesta value('".get_post('Ryad')." ', ' ".get_post('Mesto')."'    ,'".get_post('Kategoriya')." ' ,'".get_post('Sostoyanie')." '                       )") or die
	(mysql_error());
	}



if(($_POST['delete'])&&($_POST['rd']))
	{ 

	mysql_query("DELETE FROM Mesta WHERE Ryad='".$_POST['rd']."'");
	
	}

if(($_POST['edit'])&&($_POST['rd']))
	{ 
	$res=mysql_query("Select * FROM Mesta WHERE Ryad='".$_POST['rd']."' and Mesto='".$_POST['rd']."'"            );
	$row=mysql_fetch_array($res);
	
	
	echo "<center>";

	echo "���   "   ."<input type='text' name='n1' value=".$row['Ryad'].">"."<br>"."<br>";  
	echo "�����   "   ."<input type='text' name='n2' value=".$row['Mesto'].">"."<br>"."<br>";  
	echo "���������                   ;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;            "                   
	.
	"<select name='n3' size='3' multiple >
    <option selected value='".$row['Kategoriya']."'>"."</option>
	<option value='usual'>usual</option>
    <option value='VIP'>VIP</option>
	<option value='place for lovers'>place for lovers</option>
	</select>"
	."<br>"."<br>"; 
	echo "���������                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"      
	.
	"<select name='n4' size='3' multiple >
    <option selected value='".$row['Sostoyanie']."'>"."</option>
	<option value='free'>free</option>
    <option value='reserved'>reserved</option>
	<option value='sold'>sold</option>
	</select>"
	."<br>"."<br>"; 
	
	
	
	
	
	
	echo "<input type='hidden' name='n5' value=".$row['Ryad'].">";
	echo "<input type='hidden' name='n6' value=".$row['Mesto'].">";
	echo "<input type=submit name=save style=background-color:#c1c0c8; value='���������' >";
	echo "</center>";

	
	}
if(($_POST['save']))
	{mysql_query("Update Mesta set Ryad='".get_post('n1')."',Mesto='".get_post('n2')."',Kategoriya='".get_post('n3')."',Sostoyanie='".get_post('n4')."'
	WHERE Ryad=".$_POST['n5']." and Mesto=".$_POST['n6']."  ");}




$q='select * from Mesta';
	$res=@mysql_query($q) or die (mysql_error());

						
?>


<table border=1 bgcolor="#d8e3e5" align="center">
<caption>  <em><font size="9" color="#466b75" face="Sans;  "> �����</font> </em></caption>

<tr>
<th><img src="favicon.ico"</th>
<th>���</th>
<th>�����</th> 
<th>���������</th> 
<th>���������</th> 


</tr>



<?php



while($row=mysql_fetch_array($res))
{
	echo "<tr><td><input type=radio name=rd value=".$row['Ryad']."></td><td>".$row['Ryad']."</td><td>".$row['Mesto']."</td><td>".$row['Kategoriya']."</td><td>".$row['Sostoyanie']."</td></tr>";
	

}



echo "</table>";
mysql_close();
		
?>



<br>

<table border=1 bgcolor="#d8e3e5" align="center">
<tr>><th>���</th><td><input type=text name=Ryad value=''style="background-color: #d8e3e6"></td></tr>
<tr><th>�����</th><td><input type=text name=Mesto value=''style="background-color: #d8e3e6"></td></tr>
<tr><th>���������</th><td>
<select name="Kategoriya" size="2" multiple >
    <option selected value="usual">usual</option>
    <option value="VIP">VIP</option>
	<option value="place for lovers">place for lovers</option>
	</select>

</td></tr>
<tr><th>���������</th><td>
<select name="Sostoyanie" size="2" multiple >
    <option selected value="free">free</option>
    <option value="reserved">reserved</option>
	<option value="sold">sold</option>
	</select>

</td></tr>


</table>
<br>
<table  width="20%" align="center">
<tr>
<td colspan=2><input type=submit name=add value='��������' style="background-color:#c1c0c8;"></td>
<td><input type=submit name=edit value='�������������' style="background-color:#c1c0c8;"></td>
<td><input type=submit name=delete value='�������'style="background-color:#c1c0c8;"></td>


</tr>
</table>

</form>
<p align="right" ><a href="../main/menu.html">�� �������</a><p>
<p align="right" ><a href="../film/film.php">������</a><p>
<p align="right" ><a href="../zal/zal.php">����</a><p>
<p align="right" ><a href="../tickets/tickets.php">������</a><p>
<p align="right" ><a href="../seance/seance.php">������</a><p>

</body>
</html>






<?php
function get_post($var)
{return mysql_real_escape_string($_POST[$var]);
}




?>