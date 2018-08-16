<?php
	require_once('config.php');
	mysql_query("SET NAMES cp1251");

  
  $sql = MYSQL_QUERY("select Nazvanie,Zhanr,Proizvodstvo,Year,Rezhiser,Actors from film where Actors not like '%Питт%' order by Year ") or die ("Ошибка при выполнении запроса: " .mysql_error ());
  
         echo "<h3 align=center>Вывести фильмы упорядочив по году , где не снимался Брэд Питт</h3>
		<table border=1 width=30% align=center>
                 <tr>
                  <td><b>Название </b></td> 
                  
				  <td><b>Жанр</b></td>				  
                   <td><b>Производство</b></td>
				  
                   <td><b>Год</b></td>
				   <td><b>Режисёр </b></td> 
				   <td><b>Актёры </b></td> 
				  
				  
               
				  
                 </tr>";
        
         while ($row = mysql_fetch_array($sql)) 
            { 
           
              echo "<tr>
                    <td>".$row['Nazvanie']."</td>
                    
                    
					<td>".$row['Zhanr']."</td>
                    
                    <td>".$row['Proizvodstvo']."</td>
					<td>".$row['Year']."</td>
                    
                    <td>".$row['Rezhiser']."</td>
					<td>".$row['Actors']."</td>
					
					
                    
                    
					
                    </tr>";
            }
            
            
         echo "</table>";  
		 ?>
		 <p align="right" ><a href="../main/menu.html">На главную</a><p>
<p align="right" ><a href="zaprosi.html">Запросы</a><p>