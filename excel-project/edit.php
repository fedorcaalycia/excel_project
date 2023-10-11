<?php
  $servername = "localhost:3307";
  $username = "root";
  $password= "";
  $database = "test_tehnic";

  //create connection
  $connection = new mysqli($servername, $username, $password, $database);

$id = "";
$name = "";
$origine = "";
$ville = "";
$debut = "";
$separation = "";
$fondateurs = "";
$members = "";
$courant  = "";
$presentation = "";

$errorMessage = "";
$successMessage = "";

if( $_SERVER['REQUEST_METHOD'] == 'GET'){
  //GET:show band data

  if( !isset($_GET["id"])){
    header("location: /excel-project/page.php");
    exit;
  }
  $id = $_GET["id"];

  //read row of the selected client from database
  $sql = "SELECT * FROM test WHERE ID =$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if(!$row){
      header("location: /excel-project/page.php");
      exit;
    }
    $name = $row["Nom_du_groupe"];
    $origine = $row["Origine"];
    $ville = $row["Ville"];
    $debut = $row["Anee_debut"];
    $separation = $row["Anee_separation"];
    $fondateurs = $row["Fondateurs"];
    $members = $row["Members"];
    $courant  = $row["Courant_music"];
    $presentation = $row["Presentation"];
}
else{
  //POST:update band data
  $id = $_POST["id"];
  $name = $_POST["name"];
  $origine = $_POST["origine"];
  $ville = $_POST["ville"];
  $debut = $_POST["debut"];
  $separation = $_POST["separation"];
  $fondateurs = $_POST["fondateurs"];
  $members = $_POST["members"];
  $courant  = $_POST["courant"];
  $presentation = $_POST["presentation"];

  do{

    if( empty($name)|| empty($origine) || empty($ville) || empty($debut) || empty($separation)|| empty($fondateurs) ||empty($members) ||empty($courant) || empty($presentation)) {
      $errorMessage ="All the fiels are required";
      break;
    }

    $sql = "UPDATE test ".
    "SET Nom_du_groupe = '$name',
    Origine = '$origine',
    Ville = '$ville',
    Anee_debut ='$debut',
    Anee_separation ='$separation',
    Fondateurs ='$fondateurs',
    Members ='$members',
    Courant_music ='$courant',
    Presentation = '$presentation'" .
    "WHERE ID = '$id'";
    $result =$connection->query($sql);

    if(!$result){
      $errorMessage ="Invalid query: " . $connection->error;
      break;
    }
    $successMessage = "Band updated correctly";

    header("location: /excel-project/page.php");
    exit;
  }
  while(false);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stykesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"></link>
  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <title>BANDS</title>
  <style>
  .body {
  font-family: sans-serif;
}
 .form{
  width:200px;
  padding:20px;
  box-sizing: border-box;
 }
 .form-control{
  font-family: 'Courier New', Courier, monospace;
  font-size: larger;
  padding: 7px;
  margin: 5px;
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
  <div class="container my-5">
    <h2>New Band</h2>

    <?php
     if(!empty($errorMessage)){
      echo"
      <div class='alert alert-warning alert-dismissible fade show' role = 'alert'>
      <strong>$errorMessage</strong>
      <button type ='button' class ='btn-close' data-bs-dismiss ='alert' aria-label ='Close'></button>      
      </div>
      ";
     }
    
    ?>

    <form method ="post">
      <input type="hidden" name ="id" value="<?php echo $id;?>">
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Nom du groupe</label>
        <div class="col-sm-6">
          <input type ="text" class ="form-control" name ="name" value="<?php echo $name;?>">
        </input>
        </div>
        </div>

        <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Origine</label>
        <div class="col-sm-6">
          <input type ="text" class ="form-control" name ="origine" value="<?php echo $origine;?>">
        </input>
        </div>
        </div>


        <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Ville</label>
        <div class="col-sm-6">
          <input type ="text" class ="form-control" name ="ville" value="<?php echo $ville;?>">
        </input>
        </div>
        </div>

        <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Anee Debut</label>
        <div class="col-sm-6">
          <input type ="text" class ="form-control" name ="debut" value="<?php echo $debut;?>">
        </input>
        </div>
        </div>

        <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Anee Separation</label>
        <div class="col-sm-6">
          <input type ="text" class ="form-control" name ="separation" value="<?php echo $separation;?>">
        </input>
        </div>
        </div>

        <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Fondateurs</label>
        <div class="col-sm-6">
          <input type ="text" class ="form-control" name ="fondateurs" value="<?php echo $fondateurs;?>">
        </input>
        </div>
        </div>

        <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Members</label>
        <div class="col-sm-6">
          <input type ="text" class ="form-control" name ="members" value="<?php echo $members;?>">
        </input>
        </div>
        </div>

        <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Courant Musical</label>
        <div class="col-sm-6">
          <input type ="text" class ="form-control" name ="courant" value="<?php echo $courant;?>">
        </input>
        </div>
        </div>

        <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Presentation</label>
        <div class="col-sm-6">
          <input type ="text" class ="form-control" name ="presentation" value="<?php echo $presentation;?>">
        </input>
        </div>
        </div>

        <?php
        if(!empty($successMessage)){
          echo"
          <div class='row mb-3'>
          <div class='offset-sm-3 col-sm-6'>
          <div class='alert alert-warning alert-dismissible fade show' role = 'alert'>
          <strong>$successMessage</strong>
          <button type ='button' class ='btn-close' data-bs-dismiss ='alert' aria-label ='Close'></button>      
          </div>
          </div>
          </div>
          ";
        }
        ?>
        <div class="row mb-3">
          <div class="offset-sm-3 col-sm-3 d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          <div class="col-sm-3 d-grid">
          <a style="background-color: red;" class="btn btn-outline primary" href=" /excel-project/page.php" role="button">Cancel</a>
          </div>

        </div>
    </form>
  </div>
  
</body>
</html>