<?php
  $page_title = 'Welcome to checkout!';
  include('includes/header.html');
  require('mysqli_connect.php');
  session_start();

if(empty($_SESSION['Book_Id'])){
    if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) {
        $bookId = $_GET['id'];
    }
    elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) {
        $bookId = $_POST['id'];
    }
    else {
        echo '<p class="error">Unexpected Error!</p>';
        exit();
    }
    
    $_SESSION['Book_Id'] = $bookId;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if(empty($_POST['First_Name']) || empty($_POST['Last_Name'] || empty($_POST['Payment_Option'])))
    {
        echo '<p style="font-weight: bold; color: #C00">Please Enter Values in the field...!</p>';
    }
    else
    {
        $firstname = $_POST['First_Name'];
        $lastname =  $_POST['Last_Name'];
        $payment  =  $_POST['Payment_Option'];

        // Make the query:
        $sqlInsert = "INSERT INTO bookinventoryorder(First_Name, Last_Name, Payment_Option, Book_Id) VALUES (?,?,?,?)";
        
        // Prepare the statement:
        $statement = $mysqli->prepare($sqlInsert);
        // Bind the variables:
        $statement->bind_param('sssi', $firstname, $lastname, $payment, $_SESSION['Book_Id']);
        $statement->execute();
        
        // Print a message based upon the result:
        if ($statement->affected_rows == 1){
            echo '<p style="font-weight: bold; color: #D92">Successfully Ordered...!</p>';
        }
        else{
            echo '<p style="font-weight: bold; color: #C00">Not Working...Order Fail!</p>';
        }
        
        $sqlUpdate="UPDATE bookinventory set quantity = (quantity -1) WHERE Book_Id = ?";
        $statement1 = $mysqli->prepare($sqlUpdate);
        $statement1->bind_param('i',$_SESSION['Book_Id']);
        $statement1->execute();
        
        if ($statement->affected_rows == 1){
            echo '<p style="font-weight: bold; color: #C00">Quantity Updated Successfully!</p>';
        }
        else{
            echo "<br>Fail to Update Quantity.";
        }        
    }
}
    include('includes/footer.html');  
   // Display the form:
?>
<html>

<head>
   
</head>

<body>
   <div> 
<form action="checkout.php" method="post">
<p>First Name: <input type="text" name="First_Name" size="15" maxlength="20" value=""></p>
<p>Last Name: <input type="text" name="Last_Name" size="15" maxlength="20" value=""></p>
<input type="radio" name="Payment_Option" size="10" maxlength="20" value="Credit"> 
     <label class="form-check-label" for="inlineRadio1">Credit </label>
<input type="radio" name="Payment_Option" size="10" maxlength="20" value="Debit"> 
     <label class="form-check-label" for="inlineRadio1">Debit </label>
<p><input type="submit" name="submit" value="Submit"></p>
<input type="hidden" name="id" value="' . $id . '">
</form>    
    </div>
</body>

</html>
