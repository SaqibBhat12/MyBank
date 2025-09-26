<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
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

        .content {
            width: 1200px;
            height: auto;
            margin: auto;
            color: #000;
            position: relative;
        }

        .content .par {
            padding-left: 20px;
            padding-bottom: 25px;
            letter-spacing: 1.2px;
            line-height: 30px;
        }

        .content h1 {
            font-size: 50px;
            padding-left: 20px;
            margin-top: 9%;
            letter-spacing: 2px;
        }

        .content .cn {
            width: 160px;
            height: 40px;
            background: #C02446;
            border: none;
            margin-bottom: 10px;
            margin-left: 20px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            transition: .4s ease;

        }

        .content .cn a {
            text-decoration: none;
            color: #fff;
            transition: .3s ease;
        }

        .cn:hover {
            background-color: #000;
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
    <title>Home</title>

    </style>
</head>

<body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <a class="logo">AXIS BANK</a>
            </div>

            <ul id="navbar">
                <li><a href="/Mybankapp/Contact/contact.php">Contact</a></li>
                <li><a href="/Mybankapp/Account/account.php">Account</a></li>
                <li><a href="/Mybankapp/Services/services.php">Service</a></li>
                <li><a href="/Mybankapp/About/about.php">About</a></li>
                <li><a class="active" href="/Mybankapp/Home/index.php">Home</a></li>
            </ul>

        </div>

        <div class="content">
            <h1>SAVINGS <br><span>ACCOUNT</span></h1>
            <br>
            <p class="par">Axis Bank provides its customers with the option of choosing
                from a wide range of Savings Accounts<br> with different features and benefits.
                The Savings Accounts are designed to meet the banking needs of people from <br>
                all walks of life.<br><br>
                Each Savings Account offers unique features such as high transaction limit,
                free cheque books, etc. The offers <br> and discounts range from discounted movie
                tickets, Axis eDGE rewards to emergency travel allowances and a lot more.<br>
                Apply for savings account to enjoy all these features, offers and discounts.
            </p>

            <button class="cn"><a href="/Mybankapp/Form/form.php">REGISTER NOW</a></button>
        </div>
</body>

</html>