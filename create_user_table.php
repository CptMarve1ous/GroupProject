<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Create a Table</title>
    </head>
    <body>
        <?php
        //This script connects to the MySQL server, selects the database, and creates a table.
        //connect and select:
        if ($dbc = @mysqli_connect('localhost', 'root', '', 'myblog')) {

            //Define the querry
            $query = 'CREATE TABLE users (id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,user_id bigint(20),user_name varchar(100) ,password varchar(100), date DATETIME NOT NULL ) CHARACTER SET utf8 ';

            //Execute the querry:
            if (mysqli_query($dbc, $query)) {
                print '<p>The table has been created!</p>';
            } else {
                print '<p style="color: red;">Could not create the table because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
            }

            mysqli_close($dbc); // Close the connection.
        } else { //Connection failure.
            print '<p style="color: red;">Could not connect to the database:<br>' . mysqli_connect_error() . '.</p>';
        }
        ?>
    </body>
</html>

