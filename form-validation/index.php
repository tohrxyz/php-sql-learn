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