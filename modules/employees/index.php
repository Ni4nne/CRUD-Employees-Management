<?php include("../../database.php");

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    //Search employee's picture
    $sql = $con->prepare("SELECT picture FROM employees where id=:id");
    $sql->bindParam(":id", $txtID);
    $sql->execute();
    $get_picture= $sql->fetch(PDO::FETCH_LAZY);

    //Delete employee's picture
    if(isset($get_picture["picture"]) && $get_picture["picture"]!=""){
        if(file_exists("./".$get_picture["picture"])){
            unlink("./".$get_picture["picture"]);
        }
    }

    $sql = $con->prepare("DELETE FROM employees WHERE id=:id");
    $sql->bindParam(":id", $txtID);
    $sql->execute();

    $message="Item deleted";
    header("location: index.php?message=".$message);
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
        <table id="tableID" class="table table-hover">
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
                        <td> <?= $key['id']; ?> </td>
                        <td>
                            <img width="70" 
                            src="<?= $key['picture']; ?>"
                            class="img-fluid rounded" alt=""/>  
                        </td>
                        <td> <?= $key['lastname']; ?> </td>
                        <td> <?= $key['firstname']; ?> </td>
                        <td> <?= $key['role']; ?> </td>
                        <td> <?= $key['email']; ?> </td>
                        <td> <?= $key['phone']; ?> </td>
                        <td> <?= $key['entrydate']; ?> </td>
                        <td> 
                            <a class="btn btn-primary" href="update.php?txtID=<?= $key['id']; ?>" role="button">Update</a>
                            <a class="btn btn-danger" href="javascript:deleteitem(<?= $key['id']; ?>);" role="button">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    </div>
    
</div>

<?php include("../../templates/footer.php"); ?>