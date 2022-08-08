<?php
    
    include '../classes/User.php';

    session_start();

    $u = new User;
    $user = $u->getUser($_SESSION['user_id']);

?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href= "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="dashboard.php">The Company</a>
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="ms-auto" id="navbarText">
      <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
      </ul> -->
      <span class="navbar-text">
       <a href="profile.php" class="text-secondary text-decoration-none me-2"><?= $_SESSION['username'] ?></a>
       <a href="../actions/logout.php" class="text-danger text-decoraiton-none">Log out</a>
      </span>
    </div>
  </div>
</nav>
 

<div class="container my-5">
     <div class="row">
          <div class="col-4"></div>
          <div class="col-4">
             <div class="card">
                 <div class="card-header">
                     <img src="../images.<?= $user['photo'] ?>" alt="">
                 </div>

                 <div class="card-body">    
                     <form action="../actions/uploadPhoto.php" method="post" enctype ="multipart/form-data">
                            <label for="photo" class="form-label">Choose Photo</label>      
                            <input type="file" name="photo"  id="photo" class="form-control mb-3">

                            <input type="submit" value="Upload Photo" class="btn btn-outline-secondary mb-4">
                     </form>   

                     <p class="h4"><?= $user['first_name'].' '.$user['last_name'] ?></p>
                      <!-- .' ' はスペースを追加-->
                     <p class="h6"><?= $user['username'] ?></p>
                 </div> <!-- end of card-body-->
              </div> <!-- end of card -->
         </div><!-- end of col-4  -->
     </div><!-- end of row -->
</div>


</body>
</html>