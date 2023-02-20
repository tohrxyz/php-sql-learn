<?php

  error_reporting(E_ERROR); // E_ALL, E_NOTICE, E_WARNING

  //import helper for debug
  require_once "Libs/Helper.php";

  //import "databases"
  require_once "DB/sizes.php";
  require_once "DB/genders.php";
  require_once "DB/colors.php";

  //print data from $_POST method
  debug($_POST, "Form [data]");

  //helper variable for errors
  $error = [
    "name" => false,
    "size" => false,
    "gender" => false,
    "colors" => false,
    "note" => false,
  ];

  //form validation
  //if form vas submitted
  if(count($_POST) != 0){

    //"name" field validation
    //if "name" in $_POST after its trimmed is empty
    if(trim($_POST["name"]) == ""){
      $error["name"] = true;
    }

    //note validation
    //if "note" in $_POST after its trimmed is empty
    if(trim($_POST["note"]) == ""){
      $error["note"] = true;
    }
  }
?>

<!-- html side of things -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="styles/persons.css">

    <!-- css styling -->
    <style>
        body {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        input, button, select, textarea {
            padding: 12px;
        }

        /* these are alerts */
        /* will apply red border when error */
        .alert {
            background: red;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .error-border {
            border-color: red;
        }
    </style>

    <!-- title for website -->
    <title>Form elements</title>
</head>
<body>
  
  <!-- form validation checking -->
  <?php if($error["name"] || $error["note"]): ?>
    <!-- alert -->
    <div class="alert">Form isn't filled up correctly!!!</div>
  <?php endif ?>

  <!-- form container -->
  <form action="" method="POST">

    <!-- name input field -->
    <input
      type="text"
      placeholder="Name"
      name="name"
      value="<?= $_POST["name"] ?>"
      class="<?php if($error["name"]): ?> error-border <?php endif ?>"
    >

    <!-- note input field -->
    <textarea 
      name="note" 
      placeholder="Note"
      class="<?php if($error["note"]): ?> error-border <?php endif ?>"
    ></textarea>
    
    <!-- button to submit form -->
    <button>Submit</button>
  </form>

</body>
</html>