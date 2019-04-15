<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="authors" content="Trevor Bedsaul and Andrew Kepley">
    <title>Logout</title>

    <!--bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="styles/login.css" />
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="home.html">CrushRush</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="profile.php?Harold_Fratstar">Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="home.php">Register</a></li>
            <li class="nav-item"><a class="nav-link" href="search.php">Search</a></li>
        </ul>                
    </div>
    <span class="navbar-text">
        <a class="navbar-brand" href="login.php">Login</a>
    </span>
</nav>

<div>
	You have been logged out
</div>

<?php
    session_start();
	setcookie('user', $user, time()-3600);
    unset($_SESSION['school']);
?>

</body>

</html>