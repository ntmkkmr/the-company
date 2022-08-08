<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- 最新版の5.2.0だとエラーが起きたので古いver.のbootdtrapを使用している。 -->

</head>
<body>
    <!-- login from -->
    <form action="../actions/login.php" class="border rounded-2 p-4 my-5 w-25 mx-auto" method="post">
        <h1 class="display-6 text-uppercase text-center">Login</h1>
         <input type="text" name="username" id="usename" class="from-control mb-3" placeholder="USERNAME">
         <input type="text" name="password" id="password" class="form-control mb-3" placeholder="PASSWORD"> 
         
         <input type="submit" value="log in" class="btn btn-primary w-100 mb-3">
            <p class="text-center">
                    <a href="register.php" class="text-decotraiton-non">Create account</a>
            </p>
    </form>
</body>
</html>