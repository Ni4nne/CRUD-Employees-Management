<?php
include("templates/header.php");
include("templates/footer.php");

session_destroy();?>

<br>

<div class="p-5 mb-4 bg-light rounded-3">
  <div class="container-fluid py-5">
    
    <p class="col-md-8 fs-4"> Your session has been closed. </p>

    <?php
    
    header("Location: ./login.php");?>

  </div>
</div>



