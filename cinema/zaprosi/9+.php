<?php
	require_once('config.php');
	mysql_query("SET NAMES cp1251");

  
  $sql = MYSQL_QUERY("select ID_s,ID_z,Vremya,Dlitelnost from seance where ID_z<>5 and Vremya<'06:00:00' ") or die ("������ ��� ���������� �������: " .mysql_error ());
  
         echo "<h3 align=center>������� ������, �� ������������, ������ ����� , �� �� � ������ ���� 5</h3>
		<table border=1 width=30% align=center>
                 <tr>
                  <td><b>Id </b></td> 
                  
				  <td><b>���</b></td>				  
                   <td><b>�����</b></td>
				  
                   <td><b>������������</b></td>
				   
                   
				  
				  
               
				  
                 </tr>";
        
         while ($row = mysql_fetch_array($sql)) 
            { 
           
              echo "<tr>
                    <td>".$row['ID_s']."</td>
                    
                    
					<td>".$row['ID_z']."</td>
                    
                    <td>".$row['Vremya']."</td>
					<td>".$row['Dlitelnost']."</td>
                    
                    
					
					
                    
                    
					
                    </tr>";
            }
            
            
         echo "</table>";  
		 ?>
		 <p align="right" ><a href="../main/menu.html">�� �������</a><p>
<p align="right" ><a href="zaprosi.html">�������</a><p>