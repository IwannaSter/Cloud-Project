<?php
session_start();
include("connect_db.php");
if(isset($_POST['logout'])){
  header('Location: logout.php');
}
if(isset($_POST['back'])){
  header('Location: showdata.php');
}
if(isset($_SESSION['user'])){
  if (isset($_POST['insert'])){
    $name =  $_POST['name'];
    $surname = $_POST ['surname'];
    $fathername = $_POST ['fathername'];
    $grade = $_POST ['grade'];
    $mobilenumber = $_POST ['mobilenumber'];
    $birthday = $_POST ['birthday'];

    $sql = "INSERT INTO Students (Students.name, surname, fathername, grade, mobilenumber, birthday)
         VALUES ('$name', '$surname', '$fathername', '$grade', '$mobilenumber', '$birthday');";

    mysqli_query($conn, $sql);
    header('Location: showdata.php');
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
.choicebox {
  padding: 16px;
}
</style>
<title></title>
</head>
<body>
<form method="POST" action="">
    <br>
    <input type="text" name="name" placeholder="Name" required>
    <br>
    <input type="text" name="surname" placeholder="Surname" required>
    <br>
    <input type="text" name="fathername" placeholder="Fathername" required>
    <br>
    <input type="text" name="grade" placeholder="Grade" required>
    <br>
    <input type="text" name="mobilenumber" placeholder="Mobile Number" required>
    <br>
    <input type="text" name="birthday" placeholder="Birthday" required>
    <br>
    <button type="insert" name="insert">Insert</button >
</form>
<form method="POST" action=""> 
      <div class="choicebox">
        <button type="back" name="back">Back</button></div></form>
<form method="POST" action=""> 
      <div class="choicebox">
        <button type="logout" name="logout">Logout</button></div></form>
</body>
</html>