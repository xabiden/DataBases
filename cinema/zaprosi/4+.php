<?php
	require_once('config.php');
	mysql_query("SET NAMES cp1251");

  
  $sql = MYSQL_QUERY("Select Proizvodstvo,Nazvanie,count(*) From film Group by Proizvodstvo")or die ("������ ��� ���������� �������: " .mysql_error ());
  
         echo "<h3 align=center>������������� ������, ������� ������ , ��������������� � ����� ����������  � ��������� ������� ������ ������ �����</h3>
		<table border=1 width=30% align=center>
                 <tr>
                  <td><b>������������</b></td> 
                  
				  <td><b>����������</b></td>
               
				  
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
<p align="right" ><a href="../main/menu.html">�� �������</a><p>
<p align="right" ><a href="zaprosi.html">�������</a><p>