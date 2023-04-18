<?php
    error_reporting(E_ERROR);
    require_once "Libs/Helper.php";
    require_once "Libs/DB.php";

    // http://localhost/.../insert.php?fname=Tomas&lname=Mastalir&age=41
    $person = $_POST;
    $sql = "INSERT INTO
                persons
            SET
                fname=?,
                lname=?,
                age=?
    ";
    $stmt = mysqli_prepare($_DB['conn'], $sql);
    mysqli_stmt_bind_param( $stmt, 
                            "ssi", 
                            $person["fname"], $person["lname"], $person["age"]
    );
    
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    
    mysqli_stmt_close($stmt);
    mysqli_close($_DB["conn"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>
<body>
    <?php require_once "Components/HeaderApp.php" ?>
    <h1>Insert</h1>

    <form action="" method="POST">
        <input  type="text" placeholder="Meno" 
                name="fname" value="<?= $person["fname"] ?>"
        >
        <input  type="text" placeholder="Priezvisko" 
                name="lname" value="<?= $person["lname"] ?>"
        >
        <input  type="text" placeholder="Vek" 
                name="age" value="<?= $person["age"] ?>"
        >
        <button>Ulozit</button>
    </form>
</body>
</html>