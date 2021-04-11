<?php
session_start();
include("connect_db.php");
if(isset($_POST['logout'])){
  header('Location: logout.php');
}

if(isset($_SESSION['user'])){
  if (isset($_POST['delete'])){
    $name =  $_POST['delname'];
    $surname = $_POST ['delsurname'];

    $sql = "DELETE FROM Students WHERE Students.name = '$name' AND surname = '$surname';";
    $result = mysqli_query($conn, $sql);
    if($result){
    header('Location: showdata.php?student_deleted'); }
 }}
?>
<!DOCTYPE html>
<html>
<head>
<style>
#students {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 75%;
}

#students td, #students th {
  border: 1px solid #ddd;
  padding: 8px;
}

#students th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

.choicebox {
  padding: 16px;
}
</style>
<title></title>
</head>
<body>
<form method="POST" action="">
    <br>
    <input type="text" name="delname" placeholder="Enter Name" required>
    <br>
    <input type="text" name="delsurname" placeholder="Enter Surname" required>
    <br>
    <button type="text" name="delete">Delete</button >
</form>
<form method="POST" action=""> 
      <div class="choicebox">
        <button type="logout" name="logout">Logout</button></div></form>
</body>
</html>