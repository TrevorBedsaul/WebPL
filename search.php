<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="authors" content="Trevor Bedsaul and Andrew Kepley">
    <title>Example Search Page</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="styles/search.css" />

    <script>
        var setfocus = () => document.getElementById('searchBar').focus();

        function checkForm() {
        if (document.getElementById('searchBar').value == "") {
            alert("Please input something to search it.");
            setfocus();
            return false;
        }
        return true;
    };

    </script>
    
</head>

<body onload="setfocus()"">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="home.html">CrushRush</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="profile.php?Harold_Fratstar">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="home.php">Register</a></li>
                <li class="nav-item active"><a class="nav-link" href="#">Search</a></li>
            </ul>                
        </div>
        <span class="navbar-text">
            <?php if(isset($_COOKIE['user'])) : echo $_COOKIE['user'];?>
                <a class="navbar-brand" href="logout.php">, Logout</a>
            <?php else : ?>
                <a class="navbar-brand" href="login.php">Login</a>
            <?php endif; ?>        
        </span>
    </nav>

    <div id="searchContainer">
        <div id="searchDiv">
            <form>
                <div class="form-group">
                    <label for="searchBar">Rushee Name</label>
                    <input type="text" id="searchBar" class="form-control" />
                    <button class="btn btn-primary mb-2" type="button" style="margin-top: 10px;" onclick="checkForm()">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div>
        <table class="table">
            <thead>                    
                <tr>
                    <th>Name</th>
                    <th>Hometown</th>
                    <th>Major</th> 
                    <th>Year</th>                        
                </tr>
            </thead>
        </table>
    </div>    

</body>

</html>