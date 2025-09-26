<?php 
$conn = mysqli_connect('localhost', 'root', '', 'db_connect');

$txtfname = $_POST['txtfname'];
$txtlname = $_POST['txtlname'];
$txtemail = $_POST['txtemail'];
$txtpass = $_POST['txtpass'];
$sql = "INSERT INTO logindata (Email, LastName, FirstName, Address, Password)
VALUES ('$txtemail', '$txtlname', '$txtfname','Pune','$txtpass')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully " + $txtfname;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("Location: http://localhost/MyBankApp/login/login.php?mes=User Added");
    
    exit;
    $conn->close();
?>