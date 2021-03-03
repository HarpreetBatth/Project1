<?php # Script 3.7 - index.php #2

// This function outputs theoretical HTML
// for adding ads to a Web page.
function create_ad() {
  echo '<div class="alert alert-info" role="alert"><p>BookStore!... BookStore!...  BookStore!...  BookStore!...</p></div>';
} // End of the function definition.

$page_title = 'Welcome to bookstore!';
include('includes/header.html');

// Call the function:
create_ad();
?>

<div class="page-header"><h1>Book Store</h1></div>
<h4>Book Store to buy Books and Novels.</h4>

<p>Bookstore - JavaScript, PHP, Sql, Java, C, C++, .Net, Android etc books.</p>

<?php
// Call the function again:
create_ad();

include('includes/footer.html');
?>