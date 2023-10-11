<?php include("../../templates/header.php"); ?>

<br>
<div class="card">
    <div class="card-header">
        Role information
    </div>
    <div class="card-body">
        <form action="" method="POST">

            <div class="mb-3">
                <label for="roledescription" class="form-label">Role Name</label>
                <input type="text" class="form-control" name="roledescription" id="roledescription" aria-describedby="helpId">
            </div>

            <button type="submit" class="btn btn-success"> Submit </button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancel</a>
        </form>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>