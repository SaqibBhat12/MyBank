<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Dosis&family=Poppins:wght@400;500;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Dosis', sans-serif;
        }

        .main {
            width: 100%;
            background-color: #fff;
            height: 100vh;
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
            position: fixed;
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
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>HOMEPAGE</title>

    </style>
    <script>
            function validate() {
            const params = new URLSearchParams(document.location.search);
            const s = params.get("mes");
            console.log(s);
            document.getElementById('lblMsg').innerHTML
                =s;
		}
           
        </script>
</head>

<body onload="javascript:validate()">
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <a class="logo">AXIS BANK</a>
            </div>

            <ul id="navbar">
                <li><a class="active" href="/login/login.php">Login</a></li>
                <li><a href="/Mybankapp/Contact/contact.php">Contact</a></li>
                <li><a href="/Mybankapp/Account/account.php">Account</a></li>
                <li><a href="/Mybankapp/Services/services.php">Service</a></li>
                <li><a href="/Mybankapp/About/about.php">About</a></li>
                <li><a href="/Mybankapp/Home/index.php">Home</a></li>
            </ul>

        </div>

        <div class="wrapper">
            <div class="modalForm">
                <div class="actionBtns">
                    <button class="actionBtn signupBtn">Signup</button>
                    <button class="actionBtn loginBtn">Login</button>
                    <button class="moveBtn">Singup</button>
                </div>
                <div class="userForm">
                    <form action="loginsubmit.php"  method="post" class="form singup singupForm">
                        <div class="inputGroup">
                            <input type="text" placeholder="First name" name="txtfname" autocomplete="offf">
                        </div>
                        <div class="inputGroup">
                            <input type="text" placeholder="Last name" name="txtlname" autocomplete="offf">
                        </div>
                        <div class="inputGroup">
                            <input type="email" placeholder="Email address" name="txtemail" autocomplete="offf">
                        </div>
                        <div class="inputGroup">
                            <input type="password" placeholder="Create password" name="txtpass" autocomplete="offf">
                        </div>
                        <div class="inputGroup">
                            <input type="password" placeholder="Confirm password" name="txtcpass" autocomplete="offf">
                        </div>
                        <button type="submit" class="submitBtn">Signup</button><br/>
                        <label id="lblMsg"></label>
                    </form>

                    <form action="gologin.php"  method="post" class="form login">
                        <div class="inputGroup">
                            <input type="email" placeholder="Email ID" name="txtLemail" autocomplete="offf">
                        </div>
                        <div class="inputGroup">
                            <input type="password" placeholder="Enter password" name="txtLpass" autocomplete="offf">
                        </div>
                        <button type="submit" class="submitBtn">Login</button>
                    </form>
                </div>
            </div>
        </div>
       
        <script src="login.js"></script>
</body>

</html>