<?php
    ini_set('display_errors',"1");
    error_reporting(E_ERROR);
    

    require_once "Libs/Helper.php";
    require_once "Libs/DB.php";
    
    $id = $_GET["id"];
    $message = "";
    $person = array(); // Initialize an empty array for the person variable

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
            # update record
            $sql = "UPDATE
                        persons
                    SET
                        fname=?,
                        lname=?,
                        age=?
                    WHERE
                        id=?
                    ";
            $stmt = mysqli_prepare($_DB['conn'], $sql);
            mysqli_stmt_bind_param($stmt, "ssii", $person["fname"], $person["lname"], $person["age"], $id);
            mysqli_stmt_execute($stmt);
            $message = "Record updated successfully";

        } else {
            # insert new record if id is not set
            $sql = "INSERT INTO persons (fname, lname, age) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($_DB['conn'], $sql);
            mysqli_stmt_bind_param($stmt, "ssi", $person["fname"], $person["lname"], $person["age"]);
            mysqli_stmt_execute($stmt);
            $message = "Record inserted successfully";
        }
    } 
        
    if ($stmt !== null) {
        mysqli_stmt_close($stmt);
    }
    mysqli_close($_DB["conn"]);

    if($_POST){
        header("Location: index.php");
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
        
    <?php if($id): ?>
        <h1>Update person <?php echo $person["fname"] . " ". $person["lname"] ?></h1>
    <?php else: ?>
        <h1>Insert new person</h1>
    <?php endif; ?>


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
