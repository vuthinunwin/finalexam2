<head>  
            
      </head>  
      <body >  

           <div class="container">  
                <br />  
                <center> <table id="database_table" class="table table-striped table-bordered">  </center>
                          <thead>  
                            <tr>
  <th>Topic </th>
  <th>Comment</th>
  <th>More Detail</th>
   </tr>  
    </thead>  
    <tbody>

<?php
include 'connection.php' ;
$db = mysqli_connect('localhost', 'root', '', 'final2');

$sql_transactions="SELECT * FROM `news`";
$result = $db->query($sql_transactions);
while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo " <td>";
    echo $row["Topic"];
    echo "</td> ";
    echo "<td>";
    echo $row["Comment"];
    echo "</td> ";
    echo '<td><a href="new.php?cid='.$row["ID"].' ">More Detail</a></td>';
}
?>
</tbody>
</table>
</div>
 <script>  
 $(document).ready(function() {
    $('#database_table').DataTable( {
        "order": [[ 1, "desc" ]]
    } );
} ); 
 </script>  