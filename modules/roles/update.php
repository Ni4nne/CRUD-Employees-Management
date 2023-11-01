<?php include("../../database.php");

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    $sql = $con->prepare("SELECT * FROM roles WHERE id=:id");
    $sql->bindParam(":id", $txtID);
    $sql->execute();

    $roleupdate=$sql->fetch(PDO::FETCH_LAZY);
    $roledescription=$roleupdate["roledescription"];
}

if($_POST){
    $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $roledescription=(isset($_POST["roledescription"])?$_POST["roledescription"]:"");
    $sql=$con->prepare("UPDATE roles SET roledescription=:roledescription WHERE id=:id");
    $sql->bindParam(":roledescription", $roledescription);
    $sql->bindParam(":id", $txtID);
    $sql->execute();
    header("location: index.php");
    
}?>

<?php include("../../templates/header.php"); ?>

<br>
<div class="card">
    <div class="card-header">
        Update Role
    </div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="mb-3">
              <label for="txtID" class="form-label">ID:</label>
              <input type="text" value="<?= $txtID;?>"
                class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="">
            </div>

            <div class="mb-3">
                <label for="roledescription" class="form-label">Role Name</label>
                <input type="text"value="<?= $roledescription;?>" class="form-control" name="roledescription" id="roledescription" aria-describedby="helpId">
            </div>

            <button type="submit" class="btn btn-success"> Save </button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancel</a>
        </form>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>