<?php include('connection.php');
if (isset($_POST['add'])) {
    $topic = $_POST['Topic'];
    $body = $_POST['Body'];
    $comment = 0;
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;

        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }

        $sql = "INSERT INTO news SET Topic='$topic' ,Picture='$filename',Body='$body',Comment=$comment";
        mysqli_query($db, $sql);
        header('location: index.php');
    }
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Add </title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
<h2>Add</h2>
 </div>

 <form action="add.php" method="post" enctype="multipart/form-data">
      <div> 
      <label for="Topic" >Topic</label>
          	<input type="text" name="Topic">
      </div>
      <div> 
      <label for="Body" >Body</label>
          	<input type="text" name="Body">
      </div>
      <div class="input-group"> 
      <label for="Picture" >Picture</label>
            <input type="file" name="uploadfile" value="">
      </div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="add">Add</button>
  	</div>
  </form>
</body>
</html>