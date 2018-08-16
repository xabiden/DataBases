<?php
	require_once('config.php');
	mysql_query("SET NAMES cp1251");
  echo "<h3 align=center>Сегодня, если на компьютере правильное время: ".date("Y-n-j")."</h3>";
  
  $sql = MYSQL_QUERY("SELECT * FROM seance WHERE Date>'".date("Y-n-j")."' Order by Date ASC")or die ("Ошибка при выполнении запроса: " .mysql_error ());
  
         echo "<h3 align=center>Вывести сеансы, которые будут позже сегодняшнего дня, упорядочив по возрастанию</h3>
		<table border=1 width=30% align=center>
                 <tr>
                  <td><b>ID сеанса</b></td> 
                  <td><b>Дата</b></td> 
				  <td><b>Зал</b></td> 
				  <td><b>Время</b></td> 
				  <td><b>Размерность</b></td> 
				  <td><b>Длительность</b></td> 
				
				  
                 </tr>";
         
         while ($row = mysql_fetch_array($sql)) 
            { 
              
              echo "<tr>
                    <td>".$row['ID_s']."</td><td> ".$row['Date']."</td><td> ".$row['ID_z']."</td><td>".$row['Vremya']."</td><td>".$row['Razmernost']."</td><td>".$row['Dlitelnost']."</td>
                     
                    </tr>";
            }
            
         echo "</table>";  
?>

<p align="right" ><a href="../main/menu.html">На главную</a><p>
<p align="right" ><a href="zaprosi.html">Запросы</a><p>