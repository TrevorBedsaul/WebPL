<!-- used https://stackoverflow.com/questions/722379/can-html-be-embedded-inside-php-if-statement for php if-statement help -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="authors" content="Trevor Bedsaul and Andrew Kepley">
    <title>Example Register Page</title>

    <!--bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="styles/home.css" />

</head>
<script>
    function setFocus() {
        document.getElementById('name').focus();
    };

    function checkForm() {
        if (document.getElementById('name').value == "" || document.getElementById('hometown').value == "" || document.getElementById('year').value == "" || document.getElementById('major').value == "" || document.getElementById('address').value == "") {
            alert("Please input something for all five fields.");
            setFocus();
            return false;
        }
        setFocus();
        return true;
    };   

</script>

<body onload="setFocus();" style="background-color: orange">

    <?php
        session_start();
    ?>        

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">CrushRush</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="profile.php?Harold_Fratstar">Profile</a></li>
                <li class="nav-item active"><a class="nav-link" href="#">Register</a></li>
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

    <!--Form for adding rushees-->
    <div class="container" style="margin-top: 100px; color: navy; ">
        <h1>Rushees</h1>

        <form name="mainform">

            <div class="form-group" style="float: left; width:30%;">
                <label for="name">Full Name</label>
                <input type="text" id="name" class="form-control" Placeholder="ex: John Doe" name="name" />
                <span class="error" id="name-note"></span>
            </div>

            <div class="form-group" style="float: left; padding-left: 2%; width:70%">
                <label for="hometown">Hometown</label>
                <input type="text" id="hometown" class="form-control" Placeholder="ex: Charlottesville, VA"
                    name="hometown" />
                <span class="error" id="hometown-note"></span>
            </div>

            <div class="form-group" style="float: left; width:70%;">
                <label for="address">UVa Address</label>
                <input type="text" id="address" class="form-control" Placeholder="ex: Hancock 104" name="address" />
                <span class="error" id="address-note"></span>
            </div>

            <div class="form-group" style="float: left; padding-left: 2%; width:20%;">
                <label for="major">Major</label>
                <input type="text" id="major" class="form-control" Placeholder="ex: Economics and CS" name="major" />
                <span class="error" id="major-note"></span>
            </div>

            <div class="form-group" style="float: left; padding-left: 2%; width:10%;">
                <label for="year">Year</label>
                <input type="text" id="year" class="form-control" Placeholder="ex: 1st" name="year" />
                <span class="error" id="year-note"></span>
            </div>

            <input type="button" class="btn my-button" id="add" value="Add Rushee" onclick="addRow()" />
            <div id="name-msg"></div>
        </form>

        <!--Event Listener-->
        <script>
            document.getElementById('name').addEventListener("input", function () {
                if (document.getElementById('name').value.indexOf(' ') == -1) {
                    document.getElementById('name-msg').textContent = "Please type in a full name";
                }
                else {
                    document.getElementById('name-msg').textContent = "";
                }
            });
        </script>

        <br />
        <div id="todo">
            <table id="todoTable" class="table">
                <thead>
                    <!--headers-->
                    <tr>
                        <th style="border-color: navy">Name</th>
                        <th style="border-color: navy">Hometown</th>
                        <th style="border-color: navy">Major</th>
                        <th style="border-color: navy">Year</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <script>
        function addRow() {
            if (checkForm()) {
                var name = document.getElementById("name").value;
                var hometown = document.getElementById("hometown").value;
                var major = document.getElementById("major").value;
                var year = document.getElementById("year").value;
                // var address = document.getElementById("address").value; <-too much stuff

                document.getElementById("name").value = "";
                document.getElementById("hometown").value = "";
                document.getElementById("major").value = "";
                document.getElementById("year").value = "";
                document.getElementById("address").value = "";

                var tableRef = document.getElementById("todoTable");
                var newRow = tableRef.insertRow(tableRef.rows.length);
                var rowdata = [name, hometown, major, year];

                newRow.onmouseover = function () {
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
            }
        };
    </script>
</body>

</html>