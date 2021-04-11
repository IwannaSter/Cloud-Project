<?php
session_start();
include("connect_db.php");
if(isset($_POST['update'])){
    //header('Location: update.php');
    $query = "UPDATE Students SET Students.name='$_POST[stname]',
    surname='$_POST[surname]',fathername='$_POST[fathername]',
    grade='$_POST[grade]',mobilenumber='$_POST[mobilenumber]',
    birthday='$_POST[birthday]' WHERE id='$_POST[id]'";
    if(mysqli_query($conn,$query)){
        header('Location: showdata.php');}
    else{
        header('Location: showdata.php?error=multiplefieldsUpdated');
    }
  }
  ?>
  