<?php include("../../database.php");

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    //Search the picture of the employee
    $sql = $con->prepare("SELECT picture FROM employees where id=:id");
    $sql->bindParam(":id", $txtID);
    $sql->execute();
    $get_picture= $sql->fetch(PDO::FETCH_LAZY);

    if(isset($get_picture["picture"]) && $get_picture["picture"]!=""){
        if(file_exists("./".$get_picture["picture"])){
            unlink("./".$get_picture["picture"]);

        }
    }



    /*
    $sql = $con->prepare("DELETE FROM employees WHERE id=:id");
    $sql->bindParam(":id", $txtID);
    $sql->execute();
    header("location: index.php");
    */
}

$sql = $con->prepare("SELECT *,
(SELECT roledescription 
FROM roles 
WHERE roles.id=employees.idrole LIMIT 1) AS role 
FROM employees");
$sql->execute();
$employeeslist = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include("../../templates/header.php"); ?>

<br>
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="create.php" role="button">Add new employee</a>
    </div>
    <div class="card-body">
       
    <div class="table-responsive-sm">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr class="table-primary">
                    <th scope="col">Id</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Entry date</th>
                    <th scope="col">Manage</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($employeeslist as $key) { ?>

                    <tr class="">
                        <td> <?php echo $key['id']; ?> </td>
                        <td>
                            <img width="70" 
                            src="<?php echo $key['picture']; ?>"
                            class="img-fluid rounded" alt=""/>  
                        </td>
                        <td> <?php echo $key['lastname']; ?> </td>
                        <td> <?php echo $key['firstname']; ?> </td>
                        <td> <?php echo $key['role']; ?> </td>
                        <td> <?php echo $key['email']; ?> </td>
                        <td> <?php echo $key['phone']; ?> </td>
                        <td> <?php echo $key['entrydate']; ?> </td>
                        <td> 
                            <a class="btn btn-primary" href="update.php?txtID=<?php echo $key['id']; ?>" role="button">Update</a>
                            <a class="btn btn-danger" href="index.php?txtID=<?php echo $key['id']; ?>" role="button">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    </div>
    
</div>

<?php include("../../templates/footer.php"); ?>