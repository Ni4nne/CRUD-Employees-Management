<?php include("../../database.php");

if($_POST){

  $lastname=(isset($_POST["lastname"])?$_POST["lastname"]:"");
  $firstname=(isset($_POST["firstname"])?$_POST["firstname"]:"");
  $idrole=(isset($_POST["idrole"])?$_POST["idrole"]:"");
  $email=(isset($_POST["email"])?$_POST["email"]:"");
  $phone=(isset($_POST["phone"])?$_POST["phone"]:"");
  $entrydate=(isset($_POST["entrydate"])?$_POST["entrydate"]:"");
  $picture=(isset($_FILES["picture"]["name"])?$_FILES["picture"]["name"]:"");

  $sql=$con->prepare("INSERT INTO 
  `employees` (`id`, `picture`, `lastname`, `firstname`, `idrole`, `email`, `phone`, `entrydate`) 
  VALUES (NULL, :picture, :lastname, :firstname, :idrole, :email, :phone, :entrydate);");

  $sql->bindParam(":lastname", $lastname);
  $sql->bindParam(":firstname", $firstname);
  $sql->bindParam(":idrole", $idrole);
  $sql->bindParam(":email", $email);
  $sql->bindParam(":phone", $phone);
  $sql->bindParam(":entrydate", $entrydate);
  
  $date_picture = new DateTime(); //Get current time
  $filePictureName=($picture!='')?$date_picture->getTimestamp()."_".$_FILES["picture"]['name']:""; //Create new file name with the current time
  $tmp_picture=$_FILES["picture"]["tmp_name"]; //Use a temporary file

  if($tmp_picture!=''){ //If the temporary picture is not empty
    move_uploaded_file($tmp_picture, "./".$filePictureName); //Moves the temporary file to a new location
  }

  $sql->bindParam(":picture", $filePictureName);//Update the name in the database
  $sql->execute();

  header("location: index.php");
}

$sql = $con->prepare("SELECT * FROM roles");
$sql->execute();
$rolelist = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include("../../templates/header.php"); ?>

<br>
<div class="card">
  <div class="card-header">
    Employee's information
  </div>
  <div class="card-body">

    <form action="" method="POST" enctype="multipart/form-data">

      <div class="mb-3">
        <label for="picture" class="form-label">Picture</label>
        <input type="file" class="form-control" name="picture" id="picture" aria-describedby="helpId">
      </div>

      <div class="mb-3">
        <label for="lastname" class="form-label">Last Name</label>
        <input type="text" class="form-control" name="lastname" id="lastname" aria-describedby="helpId">
      </div>

      <div class="mb-3">
        <label for="firstname" class="form-label">First Name</label>
        <input type="text" class="form-control" name="firstname" id="firstname" aria-describedby="helpId">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Role</label>
        <select class="form-select form-select-sm" name="idrole" id="idrole">
          <?php foreach ($rolelist as $key) { ?>
            <option value="<?= $key['id']?>">
              <?= $key['roledescription']?></option>
              <?php } ?>
        </select>

      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId">
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="tel" class="form-control" name="phone" id="phone" aria-describedby="helpId">
      </div>

      <div class="mb-3">
        <label for="entrydate" class="form-label">Entry Date</label>
        <input type="date" class="form-control" name="entrydate" id="entrydate" aria-describedby="helpId">
      </div>

      <button type="submit" class="btn btn-success"> Submit </button>
      <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancel</a>
    </form>

  </div>
  <div class="card-footer text-muted"> </div>
</div>

<?php include("../../templates/footer.php"); ?>