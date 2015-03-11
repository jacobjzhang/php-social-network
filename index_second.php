<?php include ( "./inc/header.inc.php" ); ?>
<?php
$reg = @$_POST['reg'];
// Declaring variables to prevent errors
$fn = ""; //first name
$ln = ""; //last name
$un = ""; //username
$em = ""; //email
$em2 = ""; //email 2
$pswd = ""; //password
$pswd2 = ""; //password 2
$d = ""; //signup date
$u_check = ""; //check if username exists
//registration form
$fn = strip_tags(@$_POST['fname']);
$ln = strip_tags(@$_POST['lname']);
$un = strip_tags(@$_POST['username']);
$em = strip_tags(@$_POST['email']);
$em2 = strip_tags(@$_POST['email2']);
$pswd = strip_tags(@$_POST['password']);
$pswd2 = strip_tags(@$_POST['password2']);
$d = date("Y-m-d"); // Year - Month - Day

if ($reg) {
if ($em=$em2) {
// Check if this username exists in the database
$u_check = mysql_query("SELECT username FROM users WHERE username='$un'");
// C

?>