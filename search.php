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
            addRowFromXML();
            return true;
        };
    </script>

</head>

<body onload="setfocus()"">

    <?php
    session_start();
    ?> 

    <nav class=" navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="home.php">CrushRush</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="profile.php?Harold_Fratstar">Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="home.php">Register</a></li>
            <li class="nav-item active"><a class="nav-link" href="#">Search</a></li>
        </ul>
    </div>
    <span class="navbar-text">
        <?php if (isset($_COOKIE['user'])) : echo $_COOKIE['user'] . " @ " . $_SESSION['school']; ?>
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
                    <input type="text" id="searchBar" class="form-control" placeholder="ex: Charlottesville, VA" />
                    <button class="btn btn-primary mb-2" type="button" style="margin-top: 10px;" onclick="checkForm()">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div>
        <table id="todoTable" class="table">
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
    <script>
        // function search() {
        //     var tableRef = document.getElementById("todoTable");
        //     for(int i = 0; i < )
        // }
        function addRowFromXML(n, h, a, m, y) {
            var name = n;
            var hometown = h;
            var major = m;
            var year = y;


            // var address = document.getElementById("address").value; <-too much stuff

            var tableRef = document.getElementById("todoTable");
            var newRow = tableRef.insertRow(tableRef.rows.length);
            var rowdata = [name, hometown, major, year];

            newRow.onmouseover = function() {
                tableRef.clickedRowIndex = this.rowIndex;
            };
            var newCell = "";
            var i = 0;
            while (i < 4) {
                newCell = newRow.insertCell(i);
                newCell.innerHTML = rowdata[i];
                newCell.onmouseover = this.rowIndex;
                i++;
            }
        };
    </script>

    <?php


    //XML WORK
    // retrieve all XML errors when loading the document, result in an array of errors
    libxml_use_internal_errors(true);

    $xml = simplexml_load_file("rushees.xml") or die("Error: Cannot create object");

    ///////////////////////
    // error handling
    if ($xml === false) {  // failed loading XML, display error messages
        foreach (libxml_get_errors() as $error) {
            echo "$error->message <br/>";
        }
    }
    /////////////////////
    $array = array();
    foreach ($xml->children() as $rushees) {
        array_push($array, array($rushees->name, $rushees->hometown, $rushees->address, $rushees->major, $rushees->year));
        // $array[0]['name'] = $rushees->name;
        // $array[0]['hometown'] = $rushees->hometown;
        // $array[0]['address'] = $rushees->address;
        // $array[0]['major'] = $rushees->major;
        // $array[0]['year'] = $rushees->year;
        echo "<script type='text/javascript'>addRowFromXML('$rushees->name', '$rushees->hometown', '$rushees->address', '$rushees->major', '$rushees->year');</script>";
    }

    ?>
</body>

</html>