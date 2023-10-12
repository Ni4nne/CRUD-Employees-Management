<?php include("../../templates/header.php"); ?>

<br>
<div class="card">
    <div class="card-header">
        User's information
    </div>
    <div class="card-body">
        <form action="" method="POST">

            <div class="mb-3">
                <label for="username" class="form-label">User's Name</label>
                <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">User's Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">User's Password</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId">
            </div>

            <button type="submit" class="btn btn-success"> Submit </button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancel</a>
        </form>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>