<?php
session_start();
include("connect_db.php");
if(isset($_POST['logout'])){
  header('Location: logout.php');
}
if(isset($_POST['back'])){
  header('Location: showdata.php');
}
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
  padding-top: 8px;
  padding-bottom: 8px;
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
  if (isset($_POST['Edit'])){
    $sql = "SELECT * FROM Students;";
    $results = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($results)){
            echo "<tr><form action ='update.php'; method=post>";
            echo "<td><input type=text name=stname value='".$row['name']."'></td>";
            echo "<td><input type=text name=surname value='".$row['surname']."'></td>";
            echo "<td><input type=text name=fathername value='".$row['fathername']."'></td>";
            echo "<td><input type=text name=grade value='".$row['grade']."'></td>";
            echo "<td><input type=text name=mobilenumber value='".$row['mobilenumber']."'></td>";
            echo "<td><input type=text name=birthday value='".$row['birthday']."'></td>";
            echo "<input type=hidden name=id value='".$row['id']."'>";
            echo "<td><button type=update name='update'>Update</button>";
            echo "</form></tr>"; 
        }
    }
  }
?>
</table>
<form method="POST" action=""> 
      <div class="choicebox">
        <button type="back" name="back">Back</button></div></form>
<form method="POST" action=""> 
      <div class="choicebox">
        <button type="logout" name="logout">Logout</button></div></form>
</body>
</html>