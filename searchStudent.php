<?php
session_start();
include("connect_db.php");
if(isset($_SESSION['user'])){
  if(isset($_POST['logout'])){
    header('Location: logout.php');
  }
  if(isset($_POST['back'])){
    header('Location: showdata.php');
  }
  if (isset($_POST['search'])){
    $name =  $_POST['name'];
    $surname = $_POST ['surname'];

    $sql = "SELECT * FROM Students WHERE Students.name = '$name' AND surname = '$surname';";
    $result = mysqli_query($conn, $sql);
    $sqlresults = mysqli_num_rows($result);
    if ($sqlresults < 1){
      header('Location: searchStudent.php?error=doentexists');
 }
 }}
?>
<!DOCTYPE html>
<html>
<head>
<style>
#students {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
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
<?php
if($sqlresults > 0){
        while($row = mysqli_fetch_assoc($result)){
          echo "<table id="students">";
          echo "<tr>"."<td>"."Name"."</td>"."<td>"."Surname"."</td>"."<td>"."Fathername"."</td>"."<td>"."Grade"."</td>"."<td>"."Mobile Number"."</td>"."<td>"."Birthday"."</td>"."</tr>";
          echo "<tr>"."<td>".$row['name']."</td>"."<td>".$row['surname']."</td>"."<td>".$row['fathername']."</td>"."<td>".$row['grade']."</td>"."<td>".$row['mobilenumber']."</td>"."<td>".$row['birthday']."</td>"."</tr>";
          echo "</table>";
        }
}
?>
<form method="POST" action="">
    <br>
    <input type="text" name="name" placeholder="Enter Name" required>
    <br>
    <input type="text" name="surname" placeholder="Enter Surname" required>
    <br>
    <button type="text" name="search">Search</button >
</form>
<form method="POST" action=""> 
      <div class="choicebox">
        <button type="back" name="back">Back</button></div></form>
<form method="POST" action=""> 
      <div class="choicebox">
        <button type="logout" name="logout">Logout</button></div></form>
</body>
</html>