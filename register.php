<?php

include_once('config.php');

if (isset($_POST['submit'])) {

    $name = trim($_POST['name'] ?? '');
    $surname = trim($_POST['surname'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $tempPass = $_POST['password'] ?? '';

    if (
        empty($name) ||
        empty($surname) ||
        empty($username) ||
        empty($email) ||
        empty($tempPass)
    ) {
        echo "You need to fill all the fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please enter a valid email address.";
    } else {

        $password = password_hash($tempPass, PASSWORD_DEFAULT);

        $sql = "SELECT username FROM user WHERE username = :username";

        $tempSQL = $conn->prepare($sql);
        $tempSQL->bindParam(':username', $username);
        $tempSQL->execute();

        if ($tempSQL->rowCount() > 0) {

            echo "Username already exists!";
            header("refresh:2;url=signup.php");

        } else {

            $sql = "insert into users(name,surname,username,email,password) values(:name,:surname,:username,:email,:password)";

            $insertSql =$conn->prepare($sql);

            $insertSql->bindparam(':name',$name);
            $insertSql->bindparam(':surname',$surname);
            $insertSql->bindparam(':username',$username);
            $insertSql->bindparam(':email',$email);
            $insertSql->bindparam(':password',$password);
            
            $insertSql->execute();
            echo "data saved sucsessfuly ..."
            header("refresh:2;url=login.php")
            
        }
    }
}
?>