<?php include("../../database.php");

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
    $sql = $con->prepare("SELECT * FROM users WHERE id=:id");
    $sql->bindParam(":id", $txtID);
    $sql->execute();

    $userupdate=$sql->fetch(PDO::FETCH_LAZY);
    $username=$userupdate["username"];
    $email=$userupdate["email"];
    $password=$userupdate["password"];
}

if($_POST){
    $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $username=(isset($_POST["username"])?$_POST["username"]:"");
    $email=(isset($_POST["email"])?$_POST["email"]:"");
    $password=(isset($_POST["password"])?$_POST["password"]:"");

    $sql=$con->prepare("UPDATE users SET username=:username, email=:email, password=:password WHERE id=:id");
    $sql->bindParam(":username", $username);
    $sql->bindParam(":email", $email);
    $sql->bindParam(":password", $password);
    $sql->bindParam(":id", $txtID);
    $sql->execute();
    header("location: index.php");
}?>

<?php include("../../templates/header.php"); ?>

<br>
<div class="card">
    <div class="card-header">
        Role information
    </div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="mb-3">
              <label for="txtID" class="form-label">ID:</label>
              <input type="text" value="<?php echo $txtID;?>"
                class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="">
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text"value="<?php echo $username;?>" class="form-control" name="username" id="username" aria-describedby="helpId">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email"value="<?php echo $email;?>" class="form-control" name="email" id="email" aria-describedby="helpId">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password"value="<?php echo $password;?>" class="form-control" name="password" id="password" aria-describedby="helpId">
            </div>

            <button type="submit" class="btn btn-success"> Save </button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancel</a>
        </form>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>