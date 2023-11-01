<?php 
include("../../database.php");
include("../../templates/header.php"); 

if (isset($_GET['txtID'])) {
  $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

  $sql = $con->prepare("SELECT * FROM employees WHERE id=:id");
  $sql->bindParam(":id", $txtID);
  $sql->execute();
  $employeeupdate=$sql->fetch(PDO::FETCH_LAZY);

  $lastname=$employeeupdate["lastname"];
  $firstname=$employeeupdate["firstname"];
  $idrole=$employeeupdate["idrole"];
  $email=$employeeupdate["email"];
  $phone=$employeeupdate["phone"];
  $entrydate=$employeeupdate["entrydate"];
  $picture=$employeeupdate["picture"];

  $sql = $con->prepare("SELECT * FROM roles");
  $sql->execute();
  $rolelist = $sql->fetchAll(PDO::FETCH_ASSOC);
}


if($_POST){
  $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
  $lastname=(isset($_POST["lastname"])?$_POST["lastname"]:"");
  $firstname=(isset($_POST["firstname"])?$_POST["firstname"]:"");
  $idrole=(isset($_POST["idrole"])?$_POST["idrole"]:"");
  $email=(isset($_POST["email"])?$_POST["email"]:"");
  $phone=(isset($_POST["phone"])?$_POST["phone"]:"");
  $entrydate=(isset($_POST["entrydate"])?$_POST["entrydate"]:"");
  
  $sql=$con->prepare("UPDATE employees SET 
  lastname=:lastname,
  firstname=:firstname,
  idrole=:idrole,
  email=:email,
  phone=:phone,
  entrydate=:entrydate
  WHERE id=:id");

  $sql->bindParam(":lastname", $lastname);
  $sql->bindParam(":firstname", $firstname);
  $sql->bindParam(":idrole", $idrole);
  $sql->bindParam(":email", $email);
  $sql->bindParam(":phone", $phone);
  $sql->bindParam(":entrydate", $entrydate);
  $sql->bindParam(":id", $txtID);
  $sql->execute();

  $picture=(isset($_FILES["picture"]["name"])?$_FILES["picture"]["name"]:"");

  $date_picture = new DateTime(); //Get current time
  $filePictureName=($picture!='')?$date_picture->getTimestamp()."_".$_FILES["picture"]['name']:""; //Create new file name with the current time
  $tmp_picture=$_FILES["picture"]["tmp_name"]; //Use a temporary file

  if($tmp_picture!=''){ //If the temporary picture is not empty
    move_uploaded_file($tmp_picture, "./".$filePictureName); //Moves the temporary file to new location

        //Search older picture
        $sql = $con->prepare("SELECT picture FROM employees where id=:id");
        $sql->bindParam(":id", $txtID);
        $sql->execute();
        $get_picture= $sql->fetch(PDO::FETCH_LAZY);
    
        //Delete older picture
        if(isset($get_picture["picture"]) && $get_picture["picture"]!=""){
            if(file_exists("./".$get_picture["picture"])){
                unlink("./".$get_picture["picture"]);
            }
        }
  
    $sql=$con->prepare("UPDATE employees SET picture=:picture WHERE id=:id");//Replace the uploaded picture
    $sql->bindParam(":picture", $filePictureName);
    $sql->bindParam(":id", $txtID);
    $sql->execute();
  }

  header("location: index.php");
}
?>


<br>
<div class="card">
  <div class="card-header">
    Update employee
  </div>
  <div class="card-body">

    <form action="" method="POST" enctype="multipart/form-data">

    <div class="mb-3">
        <label for="txtID" class="form-label">ID: </label>
        <input type="text" value="<?= $txtID;?>"
        class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId">
      </div>

      <div class="mb-3">
        <label for="picture" class="form-label">Picture: </label>
        <br/>
        <img width="100" src="<?= $picture; ?>" class="rounded" alt=""/>
        <br/><br/>

        <input type="file" class="form-control" name="picture" id="picture" aria-describedby="helpId">
      </div>

      <div class="mb-3">
        <label for="lastname" class="form-label">Last Name: </label>
        <input type="text" value="<?= $lastname;?>" class="form-control" name="lastname" id="lastname" aria-describedby="helpId">
      </div>

      <div class="mb-3">
        <label for="firstname" class="form-label">First Name: </label>
        <input type="text" value="<?= $firstname;?>" class="form-control" name="firstname" id="firstname" aria-describedby="helpId">
      </div>

      <div class="mb-3">
        <label for="idrole" class="form-label">Role: </label>
        <select class="form-select form-select-sm" name="idrole" id="idrole">
          <?php foreach ($rolelist as $key) { ?>
            <option <?= ($idrole==$key['id'])?"selected":"";?> value="<?= $key['id']?>">
              <?= $key['roledescription']?></option>
              <?php } ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email: </label>
        <input type="email" value="<?= $email;?>" class="form-control" name="email" id="email" aria-describedby="helpId">
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">Phone: </label>
        <input type="tel" value="<?= $phone;?>" class="form-control" name="phone" id="phone" aria-describedby="helpId">
      </div>

      <div class="mb-3">
        <label for="entrydate" class="form-label">Entry Date: </label>
        <input type="date" value="<?= $entrydate;?>" class="form-control" name="entrydate" id="entrydate" aria-describedby="helpId">
      </div>

      <button type="submit" class="btn btn-success"> Save </button>
      <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancel</a>
    </form>

  </div>
  <div class="card-footer text-muted"> </div>
</div>

<?php include("../../templates/footer.php"); ?>