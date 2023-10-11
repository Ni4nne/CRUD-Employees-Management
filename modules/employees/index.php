<?php include("../../templates/header.php"); ?>

<br>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="create.php" role="button">Add</a>
    </div>
    <div class="card-body">
       
    <div class="table-responsive-sm">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr class="table-primary">
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
                <tr class="">
                    <td> image.jpg </td>
                    <td> Doe </td>
                    <td> John </td>
                    <td> Marketing Assistant </td>
                    <td> johndoe@johndoe.com </td>
                    <td> 123456789 </td>
                    <td> 01/01/2023 </td>
                    <td> <a name="" id="" class="btn btn-primary" href="#" role="button">Update</a> 
                        <a name="" id="" class="btn btn-danger" href="#" role="button">Delete</a>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>

    </div>
    
</div>

<?php include("../../templates/footer.php"); ?>