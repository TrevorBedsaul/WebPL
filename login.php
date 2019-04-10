<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="authors" content="Trevor Bedsaul and Andrew Kepley">
    <title>Login</title>

    <!--bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="styles/login.css" />
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="home.html">CrushRush</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="home.php">Register</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Search</a></li>
        </ul>                
    </div>
    <span class="navbar-text">
        <a class="navbar-brand" href="login.php">Login</a>
    </span>
</nav>

<div id="mainDiv">
	<div id="loginDiv">
		<div id="logoDiv">
			CrushRush
		</div>
		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
			<div class="form-group">
				<input type="text" class="form-control" name="username" placeholder="username" required>			
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="password" placeholder="password" required>
			</div>
			<input type="submit" class="btn btn-primary" value="Login"/>
		</form>
	</div>
</div>

<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST') { 
        $user = trim($_POST['username']);
        if(!ctype_alnum($user)) {
          reject('User Name');
        }
        else{
            setcookie('user', $user, time()+3600);
            header("Location: home.php");
        }
    }

?>

</body>

</html>