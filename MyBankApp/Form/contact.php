<?php 
$con = mysqli_connect('localhost', 'root', '', 'db_connect');

$name = $_POST['txtName'];
$guardian = $_POST['txtGuardian'];
$adl1 = $_POST['addl1'];
$adl2 = $_POST['addl2'];
$village = $_POST['txtVillage'];
$state = $_POST['txtState'];
$pincode = $_POST['intPin'];
$telephone = $_POST['intTele'];
$mobile = $_POST['intMobile'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$occupation = $_POST['occupation'];
$atmdeb = $_POST['debc'];
$intro_name = $_POST['txtIntro'];
$cust_id = $_POST['intCustID'];
$acc_no = $_POST['intAccNo'];
$known_for = $_POST['knownFor'];
$date = $_POST['date'];
$verify_name = $_POST['BranchOffName'];
$verify_ss = $_POST['BranchOffSS'];
$cust1_id = $_POST['Cust1ID'];
$cust2_id = $_POST['Cust2ID'];
$cust1_name = $_POST['Cust1Name'];
$cust2_name = $_POST['Cust2Name'];
$app_acc_no = $_POST['appAccNo'];
$oper_mode = $_POST['mode_op'];
$pan_no = $_POST['panNo'];
$income = $_POST['income'];
$edu_qual = $_POST['edu_qual'];
$email_id = $_POST['email'];
$branch_name = $_POST['branchName'];
$bank_ifsc = $_POST['bankIFSC'];
$bank_acc_no = $_POST['bankAccNo'];
$sql = "INSERT INTO logindata (txtName, txtGuardian, addl1, addl2, txtVillage, txtState, intPin, intTele, intMobile, gender, dob, occupation, debc, txtIntro, intCustID, intAccNo, knownFor, date, BranchOffName, BranchOffSS, Cust1ID, Cust2ID, Cust1Name, Cust2Name, appAccNo, mode_op, panNo, income, edu_qual, email, branchName, bankIFSC, bankAccNo)
VALUES ('$txtemail', '$txtlname', '$txtfname','Pune','$txtpass')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully " + $txtfname;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("Location: http://localhost/MyBankApp/login/login.php?mes=User Added");
    
    exit;
    $conn->close();
if(mysqli_connect_error()) {
    die('Connect error('.mysqli_connect_error().')'.mysqli_connect_error());
} else {
    $INSERT = "INSERT into tbl_connect (txtName, txtGuardian, addl1, addl2, txtVillage, txtState, intPin, intTele, intMobile, gender, dob, occupation, debc, txtIntro, intCustID, intAccNo, knownFor, date, BranchOffName, BranchOffSS, Cust1ID, Cust2ID, Cust1Name, Cust2Name, appAccNo, mode_op, panNo, income, edu_qual, email, branchName, bankIFSC, bankAccNo) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
}
?>
