<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Contact |</title>
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="shortcut icon" href="movielogo.png"/>

        <style>

            body{
                background-color: #DCDCDC;
            }

            .container {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 100px;
            }

            input[type=text], select, textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                resize: vertical;
            }

            label {
                padding: 12px 12px 12px 0;
                display: inline-block;
            }

            input[type=submit] {
                background-color: #ccc;
                color: #111;
                padding: 12px 20px;
                float: right;
                border: none;
            }

            input[type=submit]:hover {
                background-color: #585858;
            }

            .col-25 {
                float: left;
                width: 25%;
                margin-top: 6px;
            }

            .col-75 {
                float: left;
                width: 75%;
                margin-top: 6px;
            }

            .row:after {
                content: "";
                display: table;
                clear: both;
            }

        </style>

    </head>
    <body>

        <nav>
            <!corner logo>
            <a href="userporfile.html">
            <img src="images/profilelogo.png" style="height: 50px"/>
        </a>

            <!--menu-->
            <ul class="menu">
            <li><a href="homepage.html">Home</a></li>
            <li><a href="Comedy.html">Comedy</a></li>
            <li><a href="Horror.html">Horror</a></li>
            <li><a href="moviecontact.html">Contact Us</a></li>
            <li><a href="moviebooking.html">Booking</a></li>
            <li><a href="view_bookings.php">View Bookings</a></li>
        </ul>

            <!--searchbar-->
            <div class="search">
                <input type="text" placeholder="Search for Movies"/>
            </div>
        </nav>

        <div class="container">
            <?php
            ini_set('display_errors', 1);
            error_reporting(E_ALL | E_STRICT);

            $okay = TRUE;

            if (empty($_POST['name'])) {
                print '<p class ="error">Name cannot be empty.</p>';
                $okay = FALSE;
            }

            $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
            if (empty($_POST['email'])) {
                print '<p class ="error">Wrong format or empty. Try again.</p>';
                $okay = FALSE;
            }

            if (empty($_POST['subject'])) {
                print '<p class ="error">Please enter a subject.</p>';
                $okay = FALSE;
            }

            if (empty($_POST['message'])) {
                print '<p class ="error">Please enter your message, or have you got nothing to say? :^D.</p>';
                $okay = FALSE;
            }

            if ($okay) {
                print "<center><h3>Thank you, $name, we have received your feedback, and will reply to your email at $email</h3></center> ";
            }
            ?>
        </div>

        <footer>
            <p>Group 3 Project</p>
        </footer>

    </body>
</html>
