<?php 
    include_once("config.php");

    $ID = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id=:id";

    $prep = $conn->prepare($sql);
    $prep->bindParam(':id',$id);
    $prep->execute();
    $data = $prep->fetch();
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <style>
        form>input{
            margin-bottom:10px;
            font=size:20px;
            padding:20px;
        }
        button{
            background:none;
            border:none;
            border:1px solid black;
            padding:10px 40px;
            font-size:20px;
            cursor:pointer;
        }
        </style>
    <body>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $data['id']?>"><br>
            <input type="username" name="username" value="<?php echo $data['username']?>"><br>
            <input type="name" name="name" value="<?php echo $data['name']?>"><br>
            <input type="surname" name="surname" value="<?php echo $data['surname']?>"><br>
            <input type="email" name="email" value="<?php echo $data['email']?>"><br>

            <br><br>
            <button type="submit" name="update">UPDATE</button>
            </form>
            <a href="dashboard.php">DASHBOARD</a>

        
    </body>
    </html>