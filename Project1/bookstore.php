<?php
$page_title = 'Welcome to bookinventory!';
    require('mysqli_connect.php');
    include('includes/header.html');

    $user = 'SELECT * FROM BookInventory';


    $rows = array();

// Prepare the statement:
$dis = $mysqli->query($user); 
 
// Print a message based upon the result:
if ($dis->num_rows > 0) {
  
    while($row = $dis->fetch_array()) {
    echo '<br><div class="col-md-3"></div><div class="col-md-6"><a href="checkout.php?id=' . $row['Book_Id'] . '">Book Name:- ' . $row['Book_Name'] . '</a></div><div class="col-md-3">In Inventory:- ' . $row['quantity'] . '</div><br>';
  }
} else {
  echo "No Record in the Database";
}

?>


