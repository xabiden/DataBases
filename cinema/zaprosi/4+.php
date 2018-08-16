<?php
	require_once('config.php');
	mysql_query("SET NAMES cp1251");

  
  $sql = MYSQL_QUERY("Select Proizvodstvo,Nazvanie,count(*) From film Group by Proizvodstvo")or die ("Ошибка при выполнении запроса: " .mysql_error ());
  
         echo "<h3 align=center>Сгруппировать страны, снявшие фильмы , транслирующиеся в нашем кинотеатре  и посчитать сколько каждая страна сняла</h3>
		<table border=1 width=30% align=center>
                 <tr>
                  <td><b>Производство</b></td> 
                  
				  <td><b>Количество</b></td>
               
				  
                 </tr>";
        
         while ($row = mysql_fetch_array($sql)) 
            { 
            
              echo "<tr>
                    <td>".$row['Proizvodstvo']."</td>
                    
                    <td>".$row['count(*)']."</td>
					
                    </tr>";
            }
            
            
         echo "</table>";  
?>
<p align="right" ><a href="../main/menu.html">На главную</a><p>
<p align="right" ><a href="zaprosi.html">Запросы</a><p>