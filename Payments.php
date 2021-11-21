<!DOCTYPE html>

<html>
    <head>
        <title>Payment</title>
        <link rel="stylesheet" href="css/paymentsstyle.css"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
<body>
    
    
    <?php
        // This script adds a blog entry to the database.
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { //Handle the form.
            
            //Validate the form data:
            $problem = false;
            if (!empty($_POST['movieID']) && !empty($_POST['dateandtime']) && !empty($_POST['quantity']) && !empty($_POST['seat'])) {
                $movieID = trim(strip_tags($_POST['movieID']));
                $dateandtime = trim(strip_tags($_POST['dateandtime']));
                $quantity = trim(strip_tags($_POST['quantity']));
                $seat = trim(strip_tags($_POST['seat']));
            } else {
                print '<p style="color: red;">Error detected, please go back and select movie, date and time, quantity, and seat numebrs.</p>';
                $problem = true;
            }
            
            if (!$problem) {
                //connect and select:
                $dbc = mysqli_connect('localhost', 'root', '', 'myblog');
                
                //define the query:
                $query = "INSERT INTO bookings (id, bookingNum, date_and_time, quantity, seatNum, date_entered) VALUE (0, '$movieID', '$dateandtime', '$quantity', '$seat' , NOW())";
                
                //Execute the query:
                if (mysqli_query($dbc, $query)) {
                    print '<p>Added to list of bookings!</p>';
                } else {
                    print '<p style="color: red;">Could not add the entry because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
                }
                
                mysqli_close($dbc); //Close the connection.
                
            } //No problem!
            
        }//End of form submission IF.
        
        //Display the form:
        ?>
    
    
<h2>Checkout</h2>
<div class="row">
  <div class="holder">
    <div class="container">
      <form action="handle_payments.php" method="post">
      
        <div class="row">
          <div class="information">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Lim">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="LimChianLyt@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="48, Lorong lebuh 45">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Penang">

            <div class="row">
              <div class="information">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="PG">
              </div>
              <div class="information">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="13700">
              </div>
            </div>
          </div>

          <div class="information">
            <h3>Payment</h3>
            
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Lim Chian Lyt">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="information">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2050">
              </div>
              <div class="information">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
        <input type="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>
  
</div>

</body>

</html>
