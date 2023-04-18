<?php
    error_reporting(E_ERROR);
    require_once "Libs/Helper.php";
    require_once "Libs/DB.php"; // vytvori sa pripojenie do databazy

    // prikazy na pracu s databazou
    // http://localhost/.../select.php?id=1
    $sql = "SELECT * FROM persons";
    $stmt = mysqli_prepare($_DB['conn'], $sql); // prikaz posli na konkretnu ciernu obrazovku

    mysqli_stmt_execute($stmt); // stlac enter a prikaz vykonaj
    $res = mysqli_stmt_get_result($stmt); // vysledok/suhrn prikazu uloz do premennej
    
    $data = mysqli_fetch_all($res, MYSQLI_ASSOC); // ked chcem vybrat viac zaznamov
    // $data = mysqli_fetch_assoc($res); // ked chcem vybrat jeden zaznam, napr. detail produktu
    // debug($data);
    
    mysqli_stmt_close($stmt); // ako keby som stlacil v ciernej obrazovke CTRL + C
    mysqli_close($_DB["conn"]); // zavriem okno s ciernou obrazovkou
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $data["fname"] . " " . $data["lname"] ?>
    </title>

    <style>
        .card-container {
            display: grid;
            justify-content: center;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }
        .card {
            border: 1px solid black;
            padding: 10px;
            margin: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            max-width: 300px;
        }
    </style>
</head>
<body>
    <?php require_once "Components/HeaderApp.php" ?>
    <h1>List of everyone</h1>

    <!-- generate card for every element in $data -->
    <section class="card-container">
        <?php foreach($data as $person): ?>
            <section class="card">
                <div>Name: <?= $person["fname"] ?></div>
                <div>Surname: <?= $person["lname"] ?></div>
                <div>Age: <?= $person["age"] ?></div>
                <a href="detail.php?id=<?= $person["id"] ?>">Detail</a>
            </section>
        <?php endforeach; ?>
    </section>
</body>
</html>