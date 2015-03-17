<?php include("./inc/connect.inc.php");
session_start();
if (!isset($_SESSION["user_login"])) {
}
else
  {
    $username = $_SESSION["user_login"];
  }
?>
<!doctype html>
<html>
	<head>
		<title>Jaded</title>
		<link rel="stylesheet" type="text/css" href="./css/style.css">
	</head>
	<body>
		<div class="headerMenu">
			<div id="wrapper">
				<div class="logo">
					<h1>Jaded</h1>
				</div>
				<div class="search_box">
					<form action="search.php" method="GET" id="search">
						<input type="text" name="q" size="60" placeholder="Search..." />
					</form>
				</div>
				<div id="menu">
					<a href="#" />Home</a>
					<a href="#" />About</a>
					<a href="#" />Sign Up</a>
					<a href="#" />Sign In</a>
				</div>
			</div>
		</div>