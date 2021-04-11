<?php
session_start();
include("connect_db.php");
if(isset($_POST['logout'])){
  header('Location: logout.php');
}
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
<table id="students">
<tr>
<th>ID</th>
<th>Name</th>
<th>Surname</th>
<th>Fathername</th>
<th>Grade</th>
<th>MobileNumber</th>
<th>Birthday</th>
</tr>
<?php
 if(isset($_SESSION['user'])){
     //echo "show data from database";
    $sql = "SELECT * FROM Students;";
    $result = mysqli_query($conn, $sql);
    $resultsCheck = mysqli_num_rows($result);

    if($resultsCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>"."<td>".$row['id']."</td>"."<td>".$row['name']."</td>"."<td>".$row['surname']."</td>"."<td>".$row['fathername']."</td>"."<td>".$row['grade']."</td>"."<td>".$row['mobilenumber']."</td>"."<td>".$row['birthday']."</td>"."</tr>";
        }
    }
    //$conn->close();
  }
?>
</table>
<form method="POST" action="searchStudent.php">
      <div class="choicebox">
        <button type="text" name="Search">Search</button></div></form>
<form method="POST" action="insertStudent.php">
      <div class="choicebox">
        <button type="text" name="Insert">Insert</button ></div></form>
<form method="POST" action="deleteStudent.php">        
      <div class="choicebox">
        <button type="text" name="Delete">Delete</button ></div></form>
<form method="POST" action="editStudent.php">        
      <div class="choicebox">
        <button type="text" name="Edit">Edit</button ></div></form>
<form method="POST" action=""> 
      <div class="choicebox">
        <button type="logout" name="logout">Logout</button></div></form>
</body>
</html>