<?php
if( isset($_GET["id"])){
  $id = $_GET["id"];
  $servername = "localhost:3307";
  $username = "root";
  $password= "";
  $database = "test_tehnic";

  //create connection
  $connection = new mysqli($servername, $username, $password, $database);

  $sql = "DELETE FROM test WHERE ID =$id";
  $connection ->query($sql);

}
header("location: /excel-project/page.php");
exit;
?>