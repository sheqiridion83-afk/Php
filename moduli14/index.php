<head>
    <!-- </style> -->
</head>
<body>

<?php
include_once('config.php');
$sql = "SELECT * FROM users";
$getUsers = $conn->prepare($sql);
$getUsers->execute();
$users = $getUsers->fetchAll();
?>

<br><br>

<table>
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
    </thead>
    <tbody>
        <?php
        foreach($users as $user){
        ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<a href="add.php">Add user</a>

</body>
</html>