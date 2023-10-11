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
                    <tr class="">
                        <td scope="row">1</td>
                        <td>Sales assistant</td>
                        <td>
                            <input name="btnupdate" id="btnupdate" class="btn btn-primary" type="button" value="Update">
                            <input name="btndelete" id="btndelete" class="btn btn-danger" type="button" value="Delete">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php include("../../templates/footer.php"); ?>