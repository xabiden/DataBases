<?php
	require_once('config.php');
	mysql_query("SET NAMES cp1251");

  
  $sql = MYSQL_QUERY("select Nazvanie,Year from film where 2017-year>10 Order by Nazvanie ")or die ("������ ��� ���������� �������: " .mysql_error ());
  
          echo "<h3 align=center>������� ������ �������, ������� ������ 10 ��� ��������������� � ���������� �������</h3>
		<table border=1 width=30% align=center>
                 <tr>
                  <td><b>��������</b></td> 
                  
				  <td><b>���</b></td>
               
				  
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
<p align="right" ><a href="../main/menu.html">�� �������</a><p>
<p align="right" ><a href="zaprosi.html">�������</a><p>