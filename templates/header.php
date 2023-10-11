<?php $url_base="http://localhost/crudemployees/"; ?>

<!doctype html>
<html lang="es">
<head>
  <title>CRUD Employees</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
  <header>
    <!-- place navbar here -->
  </header>
  <nav class="navbar navbar-expand navbar-light bg-light">
    <ul class="nav navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="#" aria-current="page">System <span class="visually-hidden">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_base;?>modules/employees">Employees</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_base;?>modules/roles">Roles</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_base;?>modules/users">Users</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
        </li>
    </ul>
</nav>

  <main class="container">