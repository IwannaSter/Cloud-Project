<?php
include("connect_db.php");

if (isset($_POST['submit'])){
  $usname = $_POST['uname'];
  $passwd = $_POST ['pwd'];

  if (empty($usname) || empty($passwd) ){
      header('Location: index.php');
  }
  else if (!preg_match("/^[a-zA-Z0-9]*$/",$usname)){
      header('Location: index.php');
  }
  else{
      $sql = "SELECT * FROM Teachers WHERE Teachers.username=? AND Teachers.password=?;";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)){
          header('Location: index.php');
      }
      else{
        mysqli_stmt_bind_param($stmt, "ss", $usname, $passwd);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($result)){
            //grap the password of the user when trying to login
            if($row['password'] == $passwd){
              header('Location: showdata.php');
              session_start();
              $_SESSION['user'] = $usname;
             }
            else if($row['password'] != $passwd){
              header('Location: index.php?error=invalidpassword');}
      }
      else{
        header('Location: index.php');
      }
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}


input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

.borderbox {
  background-image: url("autumn.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  padding: 200px;
}
/* Set a style for all buttons */
button {
  background-color: #2E8B57;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

.loginbox {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

</style>
</head>
<body>
  <div class="borderbox">
   <form method="POST">
    <div class="loginbox">
            <label style="color:black;"><b>Username</b></label>
            <input type="text" name="uname" placeholder="Enter Username" required>
            <label style="color:black;"><b>Password</b></label>
            <input type="password" name="pwd" placeholder="Enter Password" required>
      <button type="submit" name="submit">Submit</button >
    </div>
</form>
</div>
</body>
</html>