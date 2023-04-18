<?php
    error_reporting(E_ERROR);
    require_once "Libs/Helper.php";

    require_once "Libs/DB.php"; // vytvori sa pripojenie do databazy

    // prikazy na pracu s databazou
    // http://localhost/.../select.php?id=1
    $id = $_GET["id"];
    $sql = "DELETE FROM persons where id=?";
    $stmt = mysqli_prepare($_DB['conn'], $sql); // prikaz posli na konkretnu ciernu obrazovku
    mysqli_stmt_bind_param($stmt, "i", $id); // osetri vstupy
    
    mysqli_stmt_execute($stmt); // stlac enter a prikaz vykonaj
    
    mysqli_stmt_close($stmt); // ako keby som stlacil v ciernej obrazovke CTRL + C
    mysqli_close($_DB["conn"]); // zavriem okno s ciernou obrazovkou

    header("Location: index.php");
?>