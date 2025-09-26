<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dosis&family=Poppins:wght@400;500;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-size: 15px;
            box-sizing: border-box;
            font-family: 'Dosis', sans-serif;
        }

        #input {
            margin: 0;
            border-left: 0;
            border-top: 0;
            border-right: 0;
            text-decoration: none;
            width: 50%;
            border-bottom: 1px dotted solid #999;
            outline: none;
            background: transparent;
        }

        .main {
            width: 100%;
            background-color: #fff;
            height: 100vh;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        table {
            padding: 0;
            margin: 0;
            width: 40%;
        }

        #tabr {
            margin: 0;
            padding-left: 0;
            text-align: left;
            padding-left: 5px;
        }

        #small-input {
            border-left: 0;
            border-top: 0;
            border-right: 0;
            text-decoration: none;
            border-bottom: 1px dotted solid #999;
            outline: none;
            background: transparent;
            width: 20%;
        }

        fieldset {
            width: 95%;
            margin: 0;
            padding: 20px;
            border-radius: 5px;
            line-height: 35px;
        }

        #sign {
            width: 25%;
            height: 45px;
            border: 1px solid;
        }

        #sec-table {
            width: 60%;
        }

        #row1 {
            width: 20%;
            height: 20px;
        }

        #row2 {
            width: 20%;
        }

        #row3 {
            width: 20%;
        }

        #tab-input {
            width: 90%;
            border-left: 0;
            border-top: 0;
            border-right: 0;
            text-decoration: none;
            border-bottom: 1px dotted solid #999;
            outline: none;
            background: transparent;
        }

        td {
            text-align: center;
        }

        b {
            color: red;
        }

        body {
            height: 100vh;
            width: 100%;
        }

        h1 {
            text-align: center;
            font-size: 30px;
            color: #222;
            padding-top: 35px;
        }

        .navbar {
            width: 100%;
            height: 50px;
            margin: auto;
            background-color: #C02446;
        }

        .icon {
            width: 200px;
            float: left;
            height: 70px;
        }

        .logo {
            color: #FFFFFF;
            font-size: 30px;
            padding-left: 25px;
            float: left;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            padding-left: 0;
            padding-right: 0;
            left: 0;
            position: absolute;
            top: 0;
            width: 100%;
        }

        #navbar li {
            float: right;
            list-style: none;
            padding: 0 20px;
        }

        #navbar li a {
            font-size: 16px;
            font-weight: 600;
            display: block;
            color: #bbb;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            transition: 0.3s ease;
        }

        #navbar li a:hover,
        #navbar li a.active {
            color: #fff;
        }

        #form {
            padding-left: 10px;
            padding-right: 10px;
        }

        legend {
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="icon">
            <h2 class="logo">AXIS BANK</h2>
        </div>

        <ul id="navbar">
            <li><a href="/Mybankapp/Contact/contact.php">Contact</a></li>
            <li><a href="/Mybankapp/Account/account.php">Account</a></li>
            <li><a href="/Mybankapp/Services/services.php">Service</a></li>
            <li><a href="/Mybankapp/About/about.php">About</a></li>
            <li><a href="/Mybankapp/Home/index.php">Home</a></li>
        </ul>

    </div>
    <div class="main">
        <form action="contact.php" method="post">
            <div id="form">
                <h1>Savings bank account opening form</h1>
                <br>
                <table border="1">
                    <tr>
                        <td colspan="2">
                            <p id="tabr">For Bank Use Only</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="tabr">
                                Name of the branch :
                            </p>
                        </td>
                        <td>
                            <input id="tab-input" type="text" name="branchName">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="tabr">
                                IFSC Code :
                            </p>
                        </td>
                        <td>
                            <input id="tab-input" type="text" name="bankIFSC">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="tabr">
                                A/C No. :
                            </p>
                        </td>
                        <td>
                            <input id="tab-input" type="number" name="bankAccNo" required>
                        </td>
                    </tr>
                </table>
                <br>
                <fieldset>
                    <legend class="legend">Customer Information</legend>
                    <p>
                        Name (In Full) Mr./Ms.:
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input id="input" type="text" name="txtName" required>
                    </p>
                    <p>
                        Father/Husband/Guardian's Name : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input id="input" type="text" name="txtGuardian" required>
                    </p>
                    <br>
                    <p>Residential Address :</p>
                    <p>
                        Address Line 1 :
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;
                        &nbsp; &nbsp; &nbsp;
                        <input id="input" type="text" name="addl1" required>
                    </p>
                    <p>
                        Address Line 2 :
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;
                        &nbsp; &nbsp; &nbsp;
                        <input id="input" type="text" name="addl2">
                    </p>
                    <p>
                        Village/City :
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input id="input" type="text" name="txtVillage" required>
                    </p>
                    <p>
                        State :
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input id="input" type="text" name="txtState" required>
                    </p>
                    <p>
                        Pincode :
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input id="input" type="number" name="intPin" required>
                    </p>
                    <br>
                    <p>
                        Telephone/Landline : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input id="input" type="text" name="intTele">
                    </p>
                    <p>
                        Mobile No. : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input id="input" type="text" name="intMobile" required>
                    </p>
                    <br>
                    <p>
                        Sex : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="gender" value="M"> Male &nbsp;&nbsp; <input type="radio" name="gender" value="F"> Female
                    </p>
                    <br>
                    <p>
                        Date of Birth : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input id="small-input" type="date" name="dob" required>
                    </p>
                    <p>
                        Occupation : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input id="input" type="text" name="occupation" required>
                    </p>
                    <br>
                    <p>
                        Request for ATM Debit Card : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="debc" value="debcY"> Yes &nbsp;&nbsp; <input type="radio" name="debc" value="debcN"> No
                    </p>
                </fieldset>
                <br>
                <br>
                <fieldset>
                    <legend>Intorduction (If applicable)</legend>
                    <p>
                        Name of the introducer : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input id="input" type="text" name="txtIntro">
                    </p>
                    <p>
                        Customer ID : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input id="input" type="number" name="intCustID">
                    </p>
                    <p>
                        Account No. : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input id="input" type="number" name="intAccNo">
                    </p>
                    <br>
                    <p>
                        I know Shri./Smt. <input id="small-input" type="text"> for the past <input id="small-input" type="number" name="knownFor">
                        months. <br> He/She is residing at the above address.
                    </p>
                    <br>
                    <p>
                        Date : <input id="small-input" type="date" name="date" required>
                    </p>
                    <br>
                    <p>
                        Please open a savings account in the name of Mr./Ms. <input id="small-input" type="text">
                        (first/sole
                        applicant)
                        and <br> Mr./Ms. <input id="small-input" type="text"> (second applicant)**. The saving bank
                        rules
                        and
                        regulations
                        including <br> those related to small accounts have been explained to me/us and I/we agree to
                        abide
                        by
                        the same.
                    </p>
                    <br>
                    <p>
                        Name (Verifying branch official) : &nbsp;&nbsp;&nbsp;
                        <input id="input" type="text" name="BranchOffName" required>
                    </p>
                    <br>
                    <p>
                        SS No. (Verifying branch official) : &nbsp;&nbsp;
                        <input id="input" type="text" name="BranchOffSS" required>
                    </p>
                    <br>
                </fieldset>
                <br>

                <fieldset>
                    <legend>Additional information</legend>
                    <br>
                    <table id="sec-table" border="1">
                        <tr>
                            <td id="row1"></td>
                            <td id="row2">First applicant</td>
                            <td id="row3">Second applicant</td>
                        </tr>
                        <tr>
                            <td>Customer ID</td>
                            <td><input id="tab-input" type="number" name="Cust1ID" required></td>
                            <td><input id="tab-input" type="number" name="Cust2ID"></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><input id="tab-input" type="text" name="Cust1Name" required></td>
                            <td><input id="tab-input" type="text" name="Cust2Name"></td>
                        </tr>
                        <tr>
                            <td>Account number</td>
                            <td colspan="2"><input id="tab-input" type="number" name="appAccNo" required></td>
                        </tr>
                    </table>
                    <br>
                    <p>
                        Mode of operation :
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="mode_op" value="Self">Self&nbsp;&nbsp;
                        <input type="radio" name="mode_op" value="Jointly by all">Jointly by all&nbsp;&nbsp;
                        <input type="radio" name="mode_op" value="Either/survivor">Either/survivor&nbsp;&nbsp;
                        <input type="radio" name="mode_op" value="Former/survivor">Former/survivor&nbsp;&nbsp;
                    </p>
                    <br>
                    <p>
                        PAN No./GIR No./FORM 60/61 : &nbsp;
                        <input id="input" type="text" name="panNo">
                    </p>
                    <p>
                        Income (Per annum) :
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input id="small-input" type="number" name="income">
                    </p>
                    <br>
                    <p>
                        Education qualification :
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="edu_qual" value="Non - Graduate">Non - Graduate
                        <input type="radio" name="edu_qual" value="Graduate">Graduate
                        <input type="radio" name="edu_qual" value="Post - Graduate">Post - Graduate
                        <input type="radio" name="edu_qual" value="Professional">Professional
                    </p>
                    <br>
                    <p>
                        Email ID :
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input id="input" type="text" name="email">
                    </p>
                    <br>
                    <p>
                        KYC Documents :
                    </p>
                    <p>
                        Identification proof : &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="file">
                    </p>
                    <br>
                    <p>
                        Address proof : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="file">
                    </p>
                    <br>
                </fieldset>
                <button id="submitbutton" type="submit"> Submit </button>
            </div>
        </form>
    </div>
</body>

</html>