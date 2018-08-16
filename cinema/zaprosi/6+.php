<?php
	require_once('config.php');
	mysql_query("SET NAMES cp1251");

  
  $sql = MYSQL_QUERY("select ID_s,ID_z,Date,Vremya,Razmernost,Dlitelnost from seance where Razmernost='2d' and Month(Date)=1 and Year(Date)=2017")or die ("Ошибка при выполнении запроса: " .mysql_error ());
  
         echo "<h3 align=center>Вывести 2d сеансы января 2017</h3>
		<table border=1 width=30% align=center>
                 <tr>
                  <td><b>Id сеанса </b></td> 
                  
				  <td><b>Зал</b></td>				  
                   <td><b>Дата</b></td>
				   <td><b>Время </b></td> 
                   <td><b>Размерность</b></td>
				   <td><b>Длительность </b></td> 
                   
				  
				  
               
				  
                 </tr>";
        
         while ($row = mysql_fetch_array($sql)) 
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
?>
<p align="right" ><a href="../main/menu.html">На главную</a><p>
<p align="right" ><a href="zaprosi.html">Запросы</a><p>