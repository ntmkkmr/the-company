<?php

    include '../classes/User.php';
    //viewsフォルダのregisterで作成したフォームに入力された情報を読み込む。
    //ファイルを別にしているので、issetは不要。
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    //パスワードのencryption


    $user = new User;
    $user->createUser($first_name, $last_name, $username, $password);
?>