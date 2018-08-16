

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


<form >

<?php
	require_once('config.php');
  $seansi = MYSQL_QUERY("SELECT * FROM seance")or die ("Ошибка при выполнении запроса: " .mysql_error ());
     
  echo "<h3 align=center>SELECT * FROM seance</h3>";
         echo "<h3 align=center>Показать все сеансы в кинотеатре : их даты, время  </h3>
		<table border=1 width=50% align=center>
                 <tr>
                  <td><b>Id</b></td> 
                  <td><b>Зал</b></td>
				  <td><b>Дата</b></td>
				  <td><b>Время</b></td> 
                  <td><b>Размерность</b></td>
                  <td><b>Длительность</b></td> 
				  
                 </tr>";
         
         while ($row = mysql_fetch_array($seansi)) 
            { 
            
              echo "<tr>
                    <td>".$row['ID_s']."</td>
                    <td>".$row['ID_z']."</td>                     
					<td>".$row['Date']."</td>
                    <td>".$row['Vremya']."</td> 
                    <td>".$row['Razmernost']."</td>
					<td>".$row['Dlitelnost']."</td>
                    </tr>";
            }
            
         echo "</table>";  
         
  echo "<br />";              
      
?>
<p align="right" ><a href="../main/menu.html">На главную</a><p>
<p align="right" ><a href="zaprosi.html">Запросы</a><p>


</form>


</body>
</html>













