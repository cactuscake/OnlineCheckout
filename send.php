<?php 
    
    $db_host = 'localhost';
    $db_name = 'user';
    $db_username = 'root';
    $db_password = 'root';
    $db_table_to_show = 'flight';

    
    $connect_to_db = mysql_connect($db_host, $db_username, $db_password)
    or die("Could not connect: " . mysql_error());

    
    mysql_select_db($db_name, $connect_to_db)
    or die("Could not select DB: " . mysql_error());

    
    $qr_result = mysql_query("select * from " . $db_table_to_show)
    or die(mysql_error());

    
    echo '<table border="1">';
  echo '<thead>';
  echo '<tr>';
  echo '<th>fio</th>';
  echo '<th>grup</th>';
  echo '<th>namenum</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  
   
  while($data = mysql_fetch_array($qr_result)){ 
    echo '<tr>';
    echo '<td>' . $data['id'] . '</td>';
    echo '<td>' . $data['grup'] . '</td>';
    echo '<td>' . $data['namenum'] . '</td>';
    echo '</tr>';
  }
  
    echo '</tbody>';
  echo '</table>';

    
    mysql_close($connect_to_db);
?><code lang="php">