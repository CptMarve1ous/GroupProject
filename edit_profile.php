<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit a Blog</title>
    </head>
    <body>
        <h1>Edit a Blog Entry</h1>
        <?php
        // put your code here
        
        
        //Connect and select:
        $dbc= mysqli_connect('localhost','root','','myblog');
        
        //Set the character set:
        mysqli_set_charset($dbc, 'utf8');
        
        if(isset($_GET['id']) && is_numeric($_GET['id'])) { //Display the entry in a form:
            
            //Define the query.
            $query = "SELECT user_name, password FROM users WHERE id={$_GET['id']}";
            if ($r = mysqli_query($dbc, $query)) { // Run the query.
                $row = mysqli_fetch_array($r); //Retrieve the information
                
                //Make the form:
                print '<form action="edit_profile.php" method="post">'
                . '<p>username: <input type="text" name="user_name" size="40" maxsize="100" value=" ' .
                htmlentities($row['user_name']) . '"></p>
                        <p>Password: <input type="type" name="password" cols="40" rows="5">' . htmlentities($row['password'])
                        . '</p>'
                        . '<input type="hidden" name="id" value="' .$_GET['id'] . '">
                        <input type="submit" name="submit" value="Update this Entry!">
                        </form>';
                
            
            } else { //Couldn't get the information.
                print '<p style="color: red;">Cloud not retrieve the blog entry because:<br>' .
                        mysqli_error($dbc) . '.</p><p>The query being run was: ' .$query . '</p>';
            }
        }elseif (isset($_POST['id']) && is_numeric($_POST['id'])) { //Handle the form.
            
            //Validate and secure the form data:
            $problem = FALSE;
            if (!empty($_POST['user_name']) && !empty($_POST['password'])) {
                $user_name= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['user_name'])));
                $password= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['password'])));
            }else {
                print '<p style="color:red;">Please submit both a title and an entry.</p>';
                $problem =TRUE;
            }
            if (!$problem) {
                
                //Define the query
                $query = "UPDATE entries SET user_name='$user_name', password='$password' WHERE
                    id={$_POST['id'] }";
                    $r = mysqli_query($dbc, $query); //Encute the query.
                    
                    //Report on the result:
                    if(mysqli_affected_rows($dbc) == 1) {
                        print '<p>The blog entry has been update.</p>';
                    }else {
                        print '<p style="color:red; ">Could not update the entey because:</br>' .
                        mysqli_errno($dbc) . '.</p><p>The query being run was: ' . $query. '</p>';
                    }
            }// No problem!
        }else { //No ID set.
            print '<p style="color:red;">This page has been accessed in error.</p>';
        }//End of maun IF.
        
        mysqli_close($dbc); 
        
        ?>
    </body>
</html>
