<?php 
  include('connection.php');
 
// If upload button is clicked ...
if (isset($_POST['add_com'])) {
    $cid = '';
    $cid=$_GET["cid"];
    $_SESSION["cid"] = $cid;
    $context = $_POST["comment"];
    $sql_transactions="SELECT * FROM `news` WHERE ID=$cid";
    $result = $db->query($sql_transactions);
    $row = $result->fetch_assoc();
    $remain = $row['Comment']+1;
    $db = mysqli_connect('localhost', 'root', '', 'final2');
    $sql = "INSERT INTO `comment`SET NID='$cid' ,context='$context'";
    $sql2 = "UPDATE `news` SET `Comment`=$remain WHERE ID=$cid";
    mysqli_query($db, $sql);
    mysqli_query($db, $sql2);
    header('location: main.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>News </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
      $cid = '';
      $cid=$_GET["cid"];
      $_SESSION["cid"] = $cid;
      $sql="SELECT * FROM `news` WHERE ID=$cid";
      $result = $db->query($sql);
      while($row = mysqli_fetch_array($result))
      {
        echo $row["Topic"];
        echo "<br>";
        echo $row["Body"];
        echo "<br>";
 ?> 
 <img src="./image/<?php 
 echo $row['Picture'];
 ?>" height="100" width="100"> 
 <?php
        echo "<br>";
        echo $row["Comment"];
        echo "<br>";
    $sql2 = "SELECT * FROM `comment` WHERE NID = $cid";
    $result = $db->query($sql2);
    while ($row = mysqli_fetch_array($result)) {
        echo $row["context"];
    }
      } 
?>

<form action="" method="post">
      <div> 
      <label for="comment" >Comment</label>
          	<input type="text" name="comment">
      </div>
  	<div>
  	  <button type="submit" class="btn" name="add_com">Send Comment</button>
  	</div>
  </form>