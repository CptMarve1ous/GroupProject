<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete My Bookings</title>
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

            .container-small {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 50px;
            }

            .row:after {
                content: "";
                display: table;
                clear: both;
            }

            .col-left {
                float: left;
                width: 25%;
                margin-top: 6px;
            }

            .col-middle {
                float: left;
                width: 25%;
                margin-top: 6px;
            }

            .col-right {
                float: left;
                width: 25%;
                margin-top: 6px;
            }

            .col-cancel {
                float: right;
                width: 25%;
                margin-top: 6px;
            }

            input[type=submit] {
                background-color: #ccc;
                color: #111;
                padding: 12px 20px;
                float: left;
                border: none;
            }

            input[type=submit]:hover {
                background-color: #585858;
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
        <h1>Delete Bookings</h1>
        <?php
        $dbc = mysqli_connect('localhost', 'root', '', 'myblog');

        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $query = "SELECT bookingNum, date_and_time, quantity, seatNum FROM bookings WHERE id={$_GET['id']}";
            if ($r = mysqli_query($dbc, $query)) {
                $row = mysqli_fetch_array($r);

                print '<form action="delete_bookings.php" method="post">
		<p>Are you sure you want to delete this booking?</p>
		<p><h3>' . $row['bookingNum'] . '</h3>' .
                $row['date_and_time'] . '<br>
		<input type="hidden" name="id" value="' . $_GET['id'] . '">
		<input type="submit" name="submit" value="Delete this Booking!"></p>
		</form>';
            } else {
                print '<p style="color: red;">Could not retrieve the data because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was:' . $query . '</p>';
            }
        } else if (isset($_POST['id']) && is_numeric($_POST['id'])) {

            $query = "DELETE FROM bookings WHERE id={$_POST['id']} LIMIT 1";
            $r = mysqli_query($dbc, $query);

            if (mysqli_affected_rows($dbc) == 1) {
                print '<p>The blog entry has been deleted.</p>';
            } else {
                print '<p style="color: red;">Could not delete the blog entry because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
            }
        } else {
            print '<p style="color: red;">This page has been accessed in error.</p>';
        }

        mysqli_close($dbc);
        ?>
        </div>
        
        <footer>
            <p>Group 3 Project</p>
        </footer>
        
    </body>
</html>

