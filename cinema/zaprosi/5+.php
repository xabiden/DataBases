<?php
	require_once('config.php');
	mysql_query("SET NAMES cp1251");
  echo "<h3 align=center>�������, ���� �� ���������� ���������� �����: ".date("Y-n-j")."</h3>";
  
  $sql = MYSQL_QUERY("SELECT * FROM seance WHERE Date>'".date("Y-n-j")."' Order by Date ASC")or die ("������ ��� ���������� �������: " .mysql_error ());
  
         echo "<h3 align=center>������� ������, ������� ����� ����� ������������ ���, ���������� �� �����������</h3>
		<table border=1 width=30% align=center>
                 <tr>
                  <td><b>ID ������</b></td> 
                  <td><b>����</b></td> 
				  <td><b>���</b></td> 
				  <td><b>�����</b></td> 
				  <td><b>�����������</b></td> 
				  <td><b>������������</b></td> 
				
				  
                 </tr>";
         
         while ($row = mysql_fetch_array($sql)) 
            { 
              
              echo "<tr>
                    <td>".$row['ID_s']."</td><td> ".$row['Date']."</td><td> ".$row['ID_z']."</td><td>".$row['Vremya']."</td><td>".$row['Razmernost']."</td><td>".$row['Dlitelnost']."</td>
                     
                    </tr>";
            }
            
         echo "</table>";  
?>

<p align="right" ><a href="../main/menu.html">�� �������</a><p>
<p align="right" ><a href="zaprosi.html">�������</a><p>