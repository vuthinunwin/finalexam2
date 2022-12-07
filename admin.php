<head>  
            
      </head>  
      <body >  

           <div class="container">  
                <br />  
                <center> <table id="database_table" class="table table-striped table-bordered">  </center>
                          <thead>  
                            <tr>
  <th>Topic </th>
  <th>Body </th>
  <th>Picture</th>
  <th>Edit News</th>
  <th>Delete News</th>
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
    echo " <td>";
    echo $row["Body"];
    echo "</td> ";
    echo "<td>"; ?> <img src="./image/<?php echo $row['Picture']; ?>" height="100" width="100"> <?php echo "</td>";
    echo '<td><a href="edit.php?cid='.$row["ID"].' ">Edit</a></td>
        <td><a href="delete.php?cid='.$row["ID"].' ">Delete</a></td>';
}
?>
<div class="content">
        <p> <a href="add.php" style="color: blue;"> Add News </a></p><br>
</div>
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