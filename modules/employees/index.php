<?php include("../../database.php");

$sql = $con->prepare("SELECT * FROM employees");
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
                        <td> <?php echo $key['picture']; ?></td>
                        <td> <?php echo $key['lastname']; ?> </td>
                        <td> <?php echo $key['firstname']; ?> </td>
                        <td> <?php echo $key['idrole']; ?> </td>
                        <td> <?php echo $key['email']; ?> </td>
                        <td> <?php echo $key['phone']; ?> </td>
                        <td> <?php echo $key['entrydate']; ?> </td>
                        <td> 
                            <a name="" id="" class="btn btn-primary" href="#" role="button">Update</a> 
                            <a name="" id="" class="btn btn-danger" href="#" role="button">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    </div>
    
</div>

<?php include("../../templates/footer.php"); ?>