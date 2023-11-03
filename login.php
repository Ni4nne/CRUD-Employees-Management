<?php
session_start();

if ($_POST) {
    include("./database.php");

    $sql = $con->prepare("SELECT *, count(*) as num_user FROM users
    WHERE email=:email AND password=:password");

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql->bindParam(":email", $email);
    $sql->bindParam(":password", $password);

    $sql->execute();

    $logged = $sql->fetch(PDO::FETCH_LAZY);

    if($logged['num_user']>0) {
        $_SESSION['user'] = $logged['username'];
        $_SESSION['log'] = true;
        header('Location:index.php');
    }else{
        $message = 'Email or password are incorrect';
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main class="container">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <br /><br /><br />
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">

                        <!-- ALERT message -->
                        <?php if (isset($message)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong> <?= $message; ?> </strong>
                            </div>
                        <?php } ?>

                        <!-- Form -->
                        <form action="" method="POST">

                            <div class="mb-3">
                                <label for="" class="form-label">Email: </label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Password: </label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>

                            <button type="submit" class="btn btn-primary">Sign in</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>