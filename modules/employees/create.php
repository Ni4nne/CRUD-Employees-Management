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
        <input type="file" class="form-control" name="picture" id="picture" aria-describedby="helpId">
      </div>

      <div class="mb-3">
        <label for="lastname" class="form-label">Last Name</label>
        <input type="text" class="form-control" name="lastname" id="lastname" aria-describedby="helpId">
      </div>

      <div class="mb-3">
        <label for="firstname" class="form-label">First Name</label>
        <input type="text" class="form-control" name="firstname" id="firstname" aria-describedby="helpId">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Role</label>
        <select class="form-select form-select-sm" name="idrole" id="idrole">
          <option selected>Select one</option>
          <option value="">Marketing</option>
          <option value="">Operations</option>
          <option value="">Finance</option>
          <option value="">Sales</option>
          <option value="">HR</option>
          <option value="">Purchase</option>

        </select>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId">
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="tel" class="form-control" name="phone" id="phone" aria-describedby="helpId">
      </div>

      <div class="mb-3">
        <label for="entrydate" class="form-label">Entry Date</label>
        <input type="date" class="form-control" name="entrydate" id="entrydate" aria-describedby="helpId">
      </div>

      <button type="submit" class="btn btn-success"> Submit </button>
      <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancel</a>
    </form>

  </div>
  <div class="card-footer text-muted"> </div>
</div>


<?php include("../../templates/footer.php"); ?>