<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stykesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"></link>
  <title>Document</title>
  <style>
  .body {
  font-family: sans-serif;
}

  .table{
	border-collapse: collapse;
	border: 1px solid black;
	text-align: center;
	vertical-align: middle;
  font-size: medium;
}
 
.btn{
  background-color: #008CBA; /* Blue */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 12px;
}
  </style>
</head>
<body>
  <div class ="container my-5">
    <h2>List of bands</h2>
    <a class ="btn btn-primary" href = "/excel-project/create.php" role = "button">New Band</a>
    <br>
    <table class ="table" border="1">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom du grupe</th>
          <th>Origine</th>
          <th>Ville</th>
          <th>Anne debut</th>
          <th>Anne separation</th>
          <th>Fondateurs</th>
          <th>Membres</th>
          <th>Courant musical</th>
          <th>Presentation</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $servername = "localhost:3307";
      $username = "root";
      $password= "";
      $database = "test_tehnic";

      //create connection
      $connection = new mysqli($servername, $username, $password, $database);
      //check connection
      if($connection->connect_error){
        die("Connection failed:" .$connection->connect_error);
      }
      //read all row from database table 
      $sql = "SELECT * FROM test ";
      $result = $connection ->query($sql);

      if(!$result){
        die("Invalid query:" .$connection->error);
      }
      while($row = $result->fetch_assoc()){
        echo "
        <tr>
          <td>$row[ID]</td>
          <td>$row[Nom_du_groupe]</td>
          <td>$row[Origine]</td>
          <td>$row[Ville]</td>
          <td>$row[Anee_debut]</td>
          <td>$row[Anee_separation]</td>
          <td>$row[Fondateurs]</td>
          <td>$row[Members]</td>
          <td>$row[Courant_music]</td>
          <td>$row[Presentation]</td>
          <td>
            <a class ='btn btn-primary btn sm' href='/excel-project/edit.php?id=$row[ID]'>Edit</a>
            <a style = 'background:red'class ='btn btn-danger btn sm' href='/excel-project/delete.php?id=$row[ID]'>Delete</a>
          </td>
      </tr>
        ";
      }
      ?>
      
      </tbody>
    </table>
  </div>
  
</body>
</html>