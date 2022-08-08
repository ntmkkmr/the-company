<?php

  include '../classes/User.php';
  //↑sessionstartより前に（一番トップ）に持ってくる。

  session_start();

  $u = new User;
  $users = $u->getUsers();



?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            <div class="col-2"></div>
            <div class="col-8">
                <h1 class="display-6">User List</h1>

                <table class="table">
                    <thead class="table-secondary">
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>username</th>
                        <th></th>
                    </thead>

                    <tbody>
                      <?php 
                          while($row = $users->fetch_assoc()){
                           ?> 
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['first_name'] ?></td>
                                <td><?= $row['last_name'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td>
                                    <a href="edit-user.php?id=<?= $row['id']   ?>" class="btn btn-outline-warning btn-sm me-1"><i class="fa-solid fa-pencil"></i></a>
                                    <!-- php?:used when you want to pass a variable to the link  -->
                                    <form action="../actions/delete.php" method="post" class="d-inline"><!-- display-inline-->
                                        <input type="hidden" name="user_id" value="<?= $row['id'] ?> ">
                                        <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                        <!-- deleteボタンに関してはlinkも可能だが、フォーム（post)にした方がデータ的に安全で、慣習のようなもの -->
                                    </form>
                                </td>
                            </tr>
                        <?php      
                        }
                        ?> 
                    </tbody>
                </table>
            </div>
    </div>


</div>

<script src="https://kit.fontawesome.com/dbc5b98639.js" crossorigin="anonymous"></script>


</body>
</html>