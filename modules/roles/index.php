<?php include("../../database.php");
      include("../../templates/header.php");

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
    $sql = $con->prepare("DELETE FROM roles WHERE id=:id");
    $sql->bindParam(":id", $txtID);
    $sql->execute();
    
    $message="Item deleted";
    header("location: index.php?message=".$message);
}

$sql = $con->prepare("SELECT * FROM roles");
$sql->execute();
$rolelist = $sql->fetchAll(PDO::FETCH_ASSOC); ?>

<br>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="create.php" role="button">Add new role</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table id="tableID" class="table table-hover">
                <thead class="thead-dark">
                    <tr class="table-primary">
                        <th scope="col">Id</th>
                        <th scope="col">Role</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($rolelist as $key) { ?>

                        <tr class="">
                            <td scope="row"><?= $key['id']; ?></td>
                            <td><?= $key['roledescription']; ?></td>
                            <td>
                                <a class="btn btn-primary" href="update.php?txtID=<?= $key['id']; ?>" role="button">Update</a>
                                <a class="btn btn-danger" href="javascript:deleteRole(<?= $key['id']; ?>);" role="button">Delete</a>
                            </td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>