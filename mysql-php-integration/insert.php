<?php
    error_reporting(E_ERROR);
    require_once "Libs/Helper.php";
    require_once "Libs/DB.php";

    $person = $_POST;

    $error = [
        "fname" => false,
        "lname" => false,
        "age" => false,
    ];

    if(count($_POST) != 0){
        if(trim($_POST["fname"]) == ""){
            $error["fname"] = true;
        }
        if(trim($_POST["lname"]) == ""){
            $error["lname"] = true;
        }
        if(trim($_POST["age"]) == ""){
            $error["age"] = true;
        }
        if(!$error["fname"] && !$error["lname"] && !$error["age"]){
            $sql = "INSERT INTO persons SET fname=?, lname=?, age=?";
            $stmt = mysqli_prepare($_DB['conn'], $sql); 
            mysqli_stmt_bind_param($stmt, "ssi", $person["fname"], $person["lname"], $person["age"]); 
            
            mysqli_stmt_execute($stmt); 
            $res = mysqli_stmt_get_result($stmt); 
            
            mysqli_stmt_close($stmt); 
            mysqli_close($_DB["conn"]); 
        }
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <style>
        .error-border{
            border-color: red;
        }
    </style>
</head>
<body>
    <?php require_once "Components/HeaderApp.php" ?>
    <h1>Insert</h1>

    <?php if($error["fname"] || $error["lname"] || $error["age"]):?>
        <div class="alert">Formular je zle vyplneny!</div>
    <?php endif ?>

    <form action="" method="POST">
        <input type="text" name="fname" placeholder="Meno" value="<?= $person["fname"]?>" 
        class="<?php if($error["fname"]): ?> error-border <?php endif ?>">
        <input type="text" name="lname" placeholder="Priezvisko" value="<?= $person["lname"]?>"
        class="<?php if($error["lname"]): ?> error-border <?php endif ?>">
        <input type="text" name="age" placeholder="Vek" value="<?= $person["age"]?>"
        class="<?php if($error["age"]): ?> error-border <?php endif ?>">
        <button>Ulozit</button>
    </form>
</body>
</html>