<?php 

  error_reporting(E_ERROR); // E_ALL, E_NOTICE, E_WARNING
  require_once "DB/books.php";
  require_once "Libs/Helper.php";

  // debug($books, "Books:");
  // debug($books[0]["name"]);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Books</title>

  <style>
    .container{
      border: 2px solid black;
      background-color: grey;
      display: flex;
      flex-direction: column;
      height: 150%;
      gap: 2rem;
      color: white;
    }

    .card{
      border: 5px solid black;
      margin: 2rem;
      padding: 2rem;
      text-align: center;
      background-color: black;
    }

    .bookName{
      font-size: 2rem;
      font-weight: bold;
    }

    .author{
      font-size: 1.2rem;
    }
  </style>
</head>
<body>
  <h1>Books:</h1>

  <div class="container">

  <!-- dynamically generated cards with for-each loop -->
  <!-- generates card for every element from $books array -->
    <?php foreach($books as $book): ?>
      <div class="card">
        
        <div class="bookName"> 
          <!-- this displays "name" element from books array -->
          Name: <?php echo $book["name"] ?> 
        </div>

        <div class="author">
          <!-- this displays "author" element from books array -->
          Author: <?php echo $book["author"] ?>
        </div>

        <div class="releaseDate">
          <!-- this displays "releaseDate" element from books array -->
          Release date: <?php echo $book["releaseDate"] ?>
        </div>

        <div class="price">
          <!-- this displays "price" element from book array -->
          Price: <?php echo $book["price"] ?>
        </div>

      </div>
    <!-- this is where foreach loop ends -->
    <?php endforeach ?>
  </div>
</body>
</html>