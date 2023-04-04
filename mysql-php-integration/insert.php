<?php
    error_reporting(E_ERROR);
    require_once "Libs/Helper.php";
    require_once "Libs/DB.php";

    // http://localhost/php-sql-learn/mysql-php-integration/insert.php?fname=Tomas&lname=Mastalir&age=39
    $person = $_GET;

    $sql = "INSERT INTO
                persons
            SET
                fname=?,
                lname=?,
                age=?
    ";

    $stmt = mysqli_prepare($_DB['conn'], $sql); // prikaz posli na konkretnu ciernu obrazovku
    
    // bind parameters for markers
    // and cleans the data from the user input (SQL Injection)
    mysqli_stmt_bind_param(
        $stmt, "ssi",  // string, string, integer
        $person["fname"], 
        $person["lname"],
        $person["age"]
    );
    
    mysqli_stmt_execute($stmt); // stlac enter a prikaz vykonaj
    $res = mysqli_stmt_get_result($stmt); // vysledok/suhrn prikazu uloz do premennej
    
    mysqli_stmt_close($stmt); // ako keby som stlacil v ciernej obrazovke CTRL + C
    mysqli_close($_DB["conn"]); // zavriem okno s ciernou obrazovkou
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

    <form action="">
        <input type="text" name="fname" placeholder="First name">
        <input type="text" name="lname" placeholder="Last name">
        <input type="number" name="age" placeholder="Age">
        <input type="submit" value="Insert">
    </form>
</body>
</html>