<?php 

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Ini adalah halaman user</h1>

    <form method="post" action="../helper/auth/logout.php">
        <button type="submit" name="logout" value="logout" class="btn btn-danger">Keluar</button>
    </form>
    
</body>
</html>