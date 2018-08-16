<?php
	require_once('config.php');
	mysql_query("SET NAMES cp1251");

  
  $sql = MYSQL_QUERY("select Nazvanie,Year from film where 2017-year>10 Order by Nazvanie ")or die ("Ошибка при выполнении запроса: " .mysql_error ());
  
          echo "<h3 align=center>Вывести список фильмов, которым больше 10 лет отсортированных в Алфавитном порядке</h3>
		<table border=1 width=30% align=center>
                 <tr>
                  <td><b>Название</b></td> 
                  
				  <td><b>Год</b></td>
               
				  
                 </tr>";
         
         while ($row = mysql_fetch_array($sql)) 
            { 
             
              echo "<tr>
                    <td>".$row['Nazvanie']."</td>
                    
                    <td>".$row['Year']."</td>
					
                    </tr>";
            }
            
            
         echo "</table>"; 
		 
		 
		
?>
<p align="right" ><a href="../main/menu.html">На главную</a><p>
<p align="right" ><a href="zaprosi.html">Запросы</a><p>