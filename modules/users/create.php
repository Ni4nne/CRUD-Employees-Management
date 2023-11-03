<?php include("../../database.php");

if ($_POST) {

    $username = (isset($_POST["username"]) ? $_POST["username"] : "");
    $email = (isset($_POST["email"]) ? $_POST["email"] : "");
    $password = (isset($_POST["password"]) ? $_POST["password"] : "");

    $sql = $con->prepare("INSERT INTO users(id,username, email, password) 
        VALUES (null, :username, :email, :password)");

    $sql->bindParam(":username", $username);
    $sql->bindParam(":email", $email);
    $sql->bindParam(":password", $password);
    $sql->execute();
    
    $message = "Item added";
    header("location: index.php?message=" . $message);
} ?>

<?php include("../../templates/header.php"); ?>

<br>
<div class="card">
    <div class="card-header">
        User's information
    </div>
    <div class="card-body">
        <form action="" method="POST">

            <div class="mb-3">
                <label for="username" class="form-label">Name</label>
                <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId">
            </div>

            <button type="submit" class="btn btn-success"> Submit </button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancel</a>
        </form>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>