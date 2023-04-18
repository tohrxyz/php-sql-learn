<?php
    error_reporting(E_ERROR);
    require_once "Libs/Helper.php";
    require_once "Libs/DB.php"; // vytvori sa pripojenie do databazy

    // prikazy na pracu s databazou
    // http://localhost/.../select.php?id=1
    $id = $_GET["id"];
    $sql = "SELECT * FROM persons WHERE id=?";
    $stmt = mysqli_prepare($_DB['conn'], $sql); // prikaz posli na konkretnu ciernu obrazovku
    mysqli_stmt_bind_param($stmt, "i", $id); // osetri vstupy
    
    mysqli_stmt_execute($stmt); // stlac enter a prikaz vykonaj
    $res = mysqli_stmt_get_result($stmt); // vysledok/suhrn prikazu uloz do premennej
    
    // $data = mysqli_fetch_all($res, MYSQLI_ASSOC); // ked chcem vybrat viac zaznamov
    $data = mysqli_fetch_assoc($res); // ked chcem vybrat jeden zaznam, napr. detail produktu
    debug($data);
    
    mysqli_stmt_close($stmt); // ako keby som stlacil v ciernej obrazovke CTRL + C
    mysqli_close($_DB["conn"]); // zavriem okno s ciernou obrazovkou
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select</title>
</head>
<body>
    <?php require_once "Components/HeaderApp.php" ?>
    <h1>Select</h1>
    <h1><?= $data["fname"] ?></h1>
</body>
</html>