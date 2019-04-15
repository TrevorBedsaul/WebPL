<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="authors" content="Trevor Bedsaul and Andrew Kepley">
    <title>Example Profile Page</title>

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="styles/profile.css" />

    <script>

        function addPrivNote() {
            var node = document.createElement("LI");     
            var field = document.getElementById('privateField');       
            var data = document.createTextNode(field.value);
            node.appendChild(data);            
            if(field.value != "") {
                document.getElementById("privateList").appendChild(node);
                field.value = "";
            }            
        }

        function addPubNote() {
            var node = document.createElement("LI");     
            var field = document.getElementById('publicField');       
            var data = document.createTextNode(field.value);
            node.appendChild(data);            
            if(field.value != "") {
                document.getElementById("publicList").appendChild(node);
                field.value = "";
            }     
        }


    </script>
    
</head>

<body>

    <?php
        session_start();
    ?> 

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="home.html">CrushRush</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="#">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="home.php">Register</a></li>
                <li class="nav-item"><a class="nav-link" href="search.php">Search</a></li>
            </ul>    
        </div>
        <span class="navbar-text">
            <?php if(isset($_COOKIE['user'])) : echo $_COOKIE['user'] . " @ " . $_SESSION['school'];?>
                <a class="navbar-brand" href="logout.php">, Logout</a>
            <?php else : ?>
                <a class="navbar-brand" href="login.php">Login</a>
            <?php endif; ?>        
        </span>

    </nav>

    <div class="row">

        <img src="resources/images/harold.jpg" class="rounded-circle" id="profilePhoto">

        <div id="profileInfo" class="card text-white bg-dark mb-3">
            <ul>
                <li>Name: Harold Fratstar</li>
                <li>Hometown: NYC, New York</li>
                <li>Year: first</li>
                <li>Major: Computer Science</li>
                <li>Address: 1234 Wallaby Drive</li>
            </ul>
        </div>

        <div id="privNotes" class="card text-white bg-dark mb-3">        

            <div class="card-header">Private Notes</div>

            <ul id="privateList"></ul>        

            <form>
                <textarea class="form-control" rows="2" id="privateField"></textarea>
                <button class="btn btn-primary mb-2" type="button" onclick="addPrivNote()" id="privBtn">Add Note</button>
            </form>

        </div>

    <div class="row">

        <div id="events" class="card text-white bg-dark mb-3">
            <div class="card-header">Events Attended</div>
        </div>

        <div id="pubNotes" class="card text-white bg-dark mb-3">

            <div class="card-header">Public Notes</div>        

            <ul id="publicList"></ul>                

            <form>            
                <textarea class="form-control" rows="2" id="publicField"></textarea>           
                <button class="btn btn-primary mb-2" type="button" onclick="addPubNote()">Add Note</button>
            </form>

        </div>

    </div>

</body>

</html>