<?php
	require_once('config.php');
	mysql_query("SET NAMES cp1251");
  $sql = MYSQL_QUERY("
  
  Select mesta.Ryad,mesta.Mesto,mesta.Sostoyanie,tickets.Price
  From mesta,tickets
  Where mesta.Ryad=tickets.Ryad and mesta.Mesto=tickets.Mesto
  and
  tickets.Price>170
  and
  Sostoyanie='reserved'
  Order by Price DESC
  
  
  
  
  
  
  
  
  ")or die ("Ошибка при выполнении запроса: " .mysql_error ());
		
         echo "<h3 align=center>Вывести забронированные места, билеты на которые стоят больше 170 упорядочив по уменьшению цены </h3>
				
		<table border=1 width=30% align=center>
                 <tr>
                  <td><b>Ряд</b></td> 
                  <td><b>Место</b></td>
				  <td><b>Состояние</b></td>
				  <td><b>Цена</b></td>				  
                 </tr>";
         
         while ($row = mysql_fetch_array($sql)) 
            { 
            
              echo "<tr>
                    <td>".$row[Ryad]."</td>
                    <td>".$row[Mesto]."</td> 
					<td>".$row[Sostoyanie]."</td> 
					<td>".$row[Price]."</td> 
                    </tr>";
            }
            
         echo "</table>";           
      
?>
<p align="right" ><a href="../main/menu.html">На главную</a><p>
<p align="right" ><a href="zaprosi.html">Запросы</a><p>