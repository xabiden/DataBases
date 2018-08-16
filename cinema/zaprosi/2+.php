<?php
	require_once('config.php');
	mysql_query("SET NAMES cp1251");
  $sql = MYSQL_QUERY("SELECT Nazvanie,Zhanr From film Where Zhanr Like '%drama%' or Zhanr Like '%Drama%' or  Zhanr Like '%Драма%' or Zhanr Like '%драма%'")or die ("Ошибка при выполнении запроса: " .mysql_error ());
		
         echo "<h3 align=center>Показать драмы которые были в кинотеатре</h3>
				
		<table border=1 width=30% align=center>
                 <tr>
                  <td><b>Название</b></td> 
                  <td><b>Жанры</b></td> 
                 </tr>";
         
         while ($row = mysql_fetch_array($sql)) 
            { 
             
              echo "<tr>
                    <td>".$row[Nazvanie]."</td>
                    <td>".$row[Zhanr]."</td> 
                    </tr>";
            }
            
         echo "</table>";               
      
?>
<p align="right" ><a href="../main/menu.html">На главную</a><p>
<p align="right" ><a href="zaprosi.html">Запросы</a><p>
