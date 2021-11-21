<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>View My Bookings</title>
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
        <h1>My Bookings</h1>
        <?php
        $dbc = mysqli_connect('localhost', 'root', '', 'myblog');

        //dfine the query
        $query = 'SELECT * FROM bookings ORDER BY date_entered ASC';

        if ($r = mysqli_query($dbc, $query)) {

            while ($row = mysqli_fetch_array($r)) {
                print "<p><h3>{$row['id']}#</h3>
                       <h3>{$row['bookingNum']}</h3><br>
                       Time of Screening: {$row['date_and_time']}<br>
                       No. of people watching: {$row['quantity']}<br>
                       Seats booked: {$row['seatNum']}<br><br>
                       <a href=\"delete_bookings.php?id={$row['id']}\">Cancel Booking</a>
                       </p><hr>\n";
            }
        } else {
            print'<pstyle="color:red;">Couldnotretrievethedatabecause:<br>' . mysqli_error($dbc) . '.</p><p>Thequerybeingrunwas:' . $query . '</p>';
        }

        mysqli_close($dbc);
        ?>
        </div>
        
        <footer>
            <p>Group 3 Project</p>
        </footer>
        
    </body>
</html>
