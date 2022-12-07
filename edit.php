<?php 
  include('connection.php');
  if (isset($_POST['edit'])) {
    $cid = $_SESSION["cid"];
    $topic = $_POST['Topic'];
    $body = $_POST['Body'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;

        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }

        $sql = "UPDATE news SET Topic='$topic' ,Picture='$filename',Body='$body'WHERE ID = '$cid'";
        mysqli_query($db, $sql);
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update News</title>
</head>
<body>
<?php
      $cid=$_GET["cid"];
      $_SESSION["cid"] = $cid;
?>
<form action="edit.php" method="post" enctype="multipart/form-data">
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
  	  <button type="submit" class="btn" name="edit">Edit</button>
  	</div>
  </form>
</body>
</html>