<?php include("../../database.php");

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
    $sql = $con->prepare("DELETE FROM roles WHERE id=:id");
    $sql->bindParam(":id", $txtID);
    $sql->execute();
    header("location: index.php");
}

$sql = $con->prepare("SELECT * FROM roles");
$sql->execute();
$rolelist = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include("../../templates/header.php"); ?>

<br>
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="create.php" role="button">Add new role</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-hover">
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
                            <td scope="row"><?php echo $key['id']; ?></td>
                            <td><?php echo $key['roledescription']; ?></td>
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