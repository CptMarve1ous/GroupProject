<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Booking |</title>
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
            <form action="Payments.php" method="post">
                
                <div class="col-left">
                    <h3>Select the movie you want to watch</h3>
                    <select name="movieID">
                        <option value="Destiny: The Taken King">Destiny: The Taken King</option>
                        <option value="Curse of Osiris">Curse of Osiris</option>
                        <option value="Destiny: The Dark Below">Destiny: The Dark Below</option>
                        <option value="ShadowKeep">ShadowKeep</option>
                        <option value="Forsaken">Forsaken</option>
                        <option value="Beyond Light">Beyond Light</option>
                        <option value="Destiny: Rise of Iron">Destiny: Rise of Iron</option>
                    </select>
                </div>
                
                <div class="col-left">
                    <h3>Select the Date and Time</h3>
                    <select name="dateandtime">
                        <option value="04/12/2021 - 13:00">04/12/2021 - 13:00</option>
                        <option value="04/12/2021 - 15:45">04/12/2021 - 15:45</option>
                        <option value="04/12/2021 - 19:30">04/12/2021 - 19:30</option>
                    </select>
                </div>

                <div class="col-middle">
                    <h3>How many are watching?</h3>
                    <select name="quantity">
                        <option value="">0</option>
                        <?php
                        $people = 1;
                        while ($people <= 70) {
                            print "<option value=\"$people\">$people</option>\n";
                            $people++;
                        }
                        ?>
                    </select>
                </div>

                <div class="col-right">
                    <h3>Which seat are you taking?</h3>
                    <input type="text" name="seat" placeholder="e.g.: 23, 24, 25"/>
                </div>

        </div>  

        <div class="container-small">
            <div class="col-left">
                <input type="submit" name="submit" value="Comfirm Booking!" />               
            </div>

        </form>

        <div class="col-cancel">
            <form action="moviebooking.html" action="post">
                <input type="submit" name="submit" value="Cancel" />
            </form>
        </div>

    </div>




    <div class="container">
        <div class="row">
            <center><img src="movieseats.jpg" width="800" height="611" alt="movie_seats"/></center>
        </div>
    </div>
        
        
        <footer>
            <p>Group 3 Project</p>
        </footer>
        

</body>
</html>
