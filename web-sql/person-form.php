<?php
    error_reporting(E_ERROR);
    require_once "Libs/Helper.php";
    require_once "Libs/DB.php";
    
    $id = $_GET["id"];
    $message = "";
    $person = array(); // Initialize an empty array for the person variable

    if (!isset($_DB['conn'])) {
        $message = "Error: Unable to establish a database connection.";
    } else { 
        if ($id) {
            $sql = "SELECT * FROM persons WHERE id=?";
            $stmt = mysqli_prepare($_DB['conn'], $sql);
            mysqli_stmt_bind_param($stmt, "i", $id);
            
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            
            $person = mysqli_fetch_assoc($res);
            debug($person);
        } 
        
        if(count($_POST) > 0) {
            $person = $_POST;
            if($id) {
                $sql = "UPDATE persons SET fname=?, lname=?, age=? WHERE id=?";
                $stmt = mysqli_prepare($_DB['conn'], $sql);
                mysqli_stmt_bind_param($stmt, "ssii", $person["fname"], $person["lname"], $person["age"], $id);
                mysqli_stmt_execute($stmt);
                $message = "Record updated successfully";
            } else {
                $sql = "INSERT INTO
                            persons
                        SET
                            fname=?,
                            lname=?,
                            age=?"
                ;
                $stmt = mysqli_prepare($_DB['conn'], $sql);
                mysqli_stmt_bind_param($stmt, "ssi", $person["fname"], $person["lname"], $person["age"]);
                mysqli_stmt_execute($stmt);
                $message = "Record inserted successfully";
            }
        } 
            
        mysqli_stmt_close($stmt);
        mysqli_close($_DB["conn"]);
    }

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
    <?php if($message): ?>
        <p><?= $message ?></p>
    <?php endif; ?>

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
