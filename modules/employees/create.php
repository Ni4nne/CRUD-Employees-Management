<?php include("../../templates/header.php"); ?>

<br>
<div class="card">
    <div class="card-header">
        Employee's information
    </div>
    <div class="card-body">
    
    <form action="" method="POST" enctype="multipart/form-data">

    <div class="mb-3">
      <label for="picture" class="form-label">Picture</label>
      <input type="image"
        class="form-control" name="picture" id="picture" aria-describedby="helpId">
    </div>

    <div class="mb-3">
      <label for="lastname" class="form-label">Last Name</label>
      <input type="text"
        class="form-control" name="lastname" id="lastname" aria-describedby="helpId">
    </div>

    <div class="mb-3">
      <label for="firstname" class="form-label">First Name</label>
      <input type="text"
        class="form-control" name="firstname" id="firstname" aria-describedby="helpId">
    </div>

    <div class="mb-3">
      <label for="role" class="form-label">Role</label>
      <input type="text"
        class="form-control" name="role" id="role" aria-describedby="helpId">
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email"
        class="form-control" name="email" id="email" aria-describedby="helpId">
    </div>

    <div class="mb-3">
      <label for="phone" class="form-label">Phone</label>
      <input type="tel"
        class="form-control" name="phone" id="phone" aria-describedby="helpId">
    </div>

    <div class="mb-3">
      <label for="entrydate" class="form-label">Entry Date</label>
      <input type="date"
        class="form-control" name="entrydate" id="entrydate" aria-describedby="helpId">
    </div>

    </form>

    </div>
    <div class="card-footer text-muted"> </div>
</div>


<?php include("../../templates/footer.php"); ?>