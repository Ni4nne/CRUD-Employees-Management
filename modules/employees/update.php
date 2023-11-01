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
        "<?= $picture;?>"
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
        "<?= $idrole;?>"
        <select class="form-select form-select-sm" name="idrole" id="idrole">
          <?php foreach ($rolelist as $key) { ?>
            <option <?= ($idrole==$key['id'])?"selected":""?> value="<?= $key['id']?>">
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

      <button type="submit" class="btn btn-success"> Submit </button>
      <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancel</a>
    </form>

  </div>
  <div class="card-footer text-muted"> </div>
</div>

<?php include("../../templates/footer.php"); ?>