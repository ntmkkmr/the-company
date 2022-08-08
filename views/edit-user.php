<?php
    
    include '../classes/User.php';

    session_start();

    $u = new User;
    $user = $u->getUser($_GET['id']);
?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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
 
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="../actions/update.php" method="post" class="my-5">
              <h1 class="display-6 text-center text-uppercase">Edit User</h1>

              <label for="first-name" class="form-label">Frist Name</label>      
              <input type="text" name="first_name"  value="<?= $user['first_name'] ?>" id="first-name" class="form-control mb-2">

              <label for="last-name" class="form-label">Last Name</label>      
              <input type="text" name="last_name" value="<?= $user['last_name'] ?>"id="last-name" class="form-control mb-2">

              <label for="user-name" class="form-label fw-bold">Username</label>      
              <input type="text" name="username" value="<?= $user['username'] ?>" id="username" class="form-control mb-3">
              
              <input type="hidden" name="user_id" value = "<?= $user['id'] ?>">

              <input type="submit" value="Save" class="btn btn-warning me-2">
              <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>