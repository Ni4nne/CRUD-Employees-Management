<?php include("../../database.php");

$sql=$con->prepare("SELECT * FROM roles");
$sql->execute();
$rolelist=$sql->fetchAll(PDO::FETCH_ASSOC);

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

                <?php foreach($rolelist as $key) { ?>

                    <tr class="">
                        <td scope="row"><?php echo $key['id']?></td>
                        <td><?php echo $key['roledescription']?></td>
                        <td>
                            <input name="btnupdate" id="btnupdate" class="btn btn-primary" type="button" value="Update">
                            <input name="btndelete" id="btndelete" class="btn btn-danger" type="button" value="Delete">
                        </td>
                    </tr>

                <?php } ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>