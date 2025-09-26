<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_connect');

$txtLemail = $_POST['txtLemail'];
$txtLpass = $_POST['txtLpass'];
echo"SELECT * FROM logindata WHERE Email='"+$txtLemail+"' AND Password='"+$txtLpass+"'";
echo $txtLpass;
//$query=mysqli_connect("SELECT * FROM logindata WHERE Email='".$user."' AND Password='".$pass."'");  
//$query=mysqli_connect("SELECT * FROM logindata WHERE Email='suvi@gmail.com' AND Password='Morse'");  
//$sql = "SELECT * FROM logindata WHERE Email='suvi@gmail.com' AND Password='Morse'";
$sql = "SELECT * FROM logindata WHERE Email='$txtLemail' AND Password='$txtLpass'";
echo $sql;
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $dbusername = $row['Email'];
    $dbpassword = $row['Password'];
  }
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       
    }
  } else {
    echo "0 results";
  }


if ($txtLemail == $dbusername && $txtLpass == $dbpassword) {
    session_start();
    $_SESSION['sess_user'] = $user;
    echo "Correct User";
    /* Redirect browser */
    header("Location: http://localhost/Mybankapp/Home/home.php");  
    exit;
} else {
    echo "Invalid username or password!";
    header("Location: http://localhost/MyBankApp/login/login.php?mes=Invalid User");
    
    exit;
}

$conn->close();
