<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href= "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- ↑Bootstrapのリンク -->
</head>
<body>
    
   <div class ="container w-50">
        <form action="../actions/register.php" method ="post" class ="border rounded-2 my-5 p-4">
            <!-- form action = "../actions/register.php:"の意味：actionsフォルダのregister.phpへ、以下のフォームに入力されたデータを送る -->
            <h1 class="display-6 text-uppercase">Register</h1>

            <label for="first-name" class ="form-label">First Name</label>
            <input type="text" name="first_name" id="first-name" class="form-control mb-2">

            <label for="last-name" class="form-label">Last Name</label>
            <input type ="text" name ="last_name" id ="last-name" class ="form-control mb-2"></input:type>

            <label for="username" class="form-label fw-bold" >Username</label>
            <input type="text" name="username" id="username" class="form-control mb-4">

            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control mb-4">

            <input type="submit" value="Register" class="btn btn-success w-100">
            <p class="text-center">Registerd already? 
                <a href="index.php">Log in</a>
           </p>
            
        </form>



   </div> 

</body>
</html>