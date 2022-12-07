<?php
      include 'connection.php';
      $cid=$_GET['cid'];

if ($cid) {
    $sql = "DELETE FROM `news` WHERE `ID`= $cid";
    mysqli_query($db, $sql);
    header('location: index.php');
  }
?>