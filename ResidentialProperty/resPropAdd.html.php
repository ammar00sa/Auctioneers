<!-- Created by: Joseph Lalor
Date: 26/01/2026
Student Number: c00312883
Title: resPropAdd.html.php
Purpose: A HTML form for entering a new Residential Property-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a New Residential Property</title>  <!--title-->
    <script src="element.js"></script> <!--menu sidebar javascript-->
    <script src="resPropAdd.js"></script> <!--error detecting javascript-->
    <link rel="stylesheet" href="style.css" /> <!--stylesheet connection-->
</head>
<body>
    <div class="card"> <!--class for styling purposes-->
    <header class="content__top"> <!--header css class-->
        <h1>Add a New Residential Property</h1>
    </header>

    <form action="resPropAdd.php" method="Post" onsubmit="return validate()"> <!--post method used to add to database and submission validation using javascript-->

    <div class="layout"> <!--class for styling purposes-->

    <div id="menu"></div> <!--sidebar styling class-->
    <script>document.getElementById('menu').innerHTML = createMenu();</script> <!--calling javascript method to write sidebar html - this avoids repetition of code across all html files-->
    <!--here we connect to database to get a result set of all clients by name and clientid with error handling-->
    <?php
        include 'db.inc.php';
        $sql = mysqli_query($con, "SELECT Name, ClientID FROM Client");
        if (!$sql) {
            die("Query failed: " . mysqli_error($con));
        }
    ?>

    <div class="grid"> <!--sets up styling grid as in css-->
        <div class="panel"> <!--panel class from css-->
            <fieldset> 
              <legend>Residential Property Details</legend> <!--top label of fieldset-->
    <label for="client">Client:</label><br> <!--client select box label-->
        <select name="client" id="client">
            <option value="">-- Select a client --</option> <!--default option-->
            <!--this php section lists out all clients in a drop down select box, using the previous results set-->
            <?php while ($row = mysqli_fetch_assoc($sql)) {?>
                <option value="<?= htmlspecialchars($row['ClientID']) ?>">
                    <?= htmlspecialchars($row['Name']) ?>
                </option>
            <?php } ?>
        </select><br>

        <div class="two-col"> <!--two column css styling tag-->
        <div class="col"> <!--column one-->
        <label for="proptype">Property type: </label><br> <!--a select box giving each property type-->
        <select name="proptype" id="proptype" required>
            <option value="semidetached">Semi Detached</option>
            <option value="terraced">Terraced</option>
            <option value="detached">Detached</option>
            <option value="apartment">Apartment</option>
            <option value="mews">Mews</option>
        </select><br> 

        <label for="address">Address:</label><br> <!--address entry-->
        <input type="text" id="address" name="address" pattern="^[,a-zA-Z\d ]+$"
        required oninvalid="this.setCustomValidity('Please only use alphabetic characters')" 
        oninput="this.setCustomValidity('')"><br> <!--pattern can use any alphabet character, digit, comma or space. Warning message custom made if incorrect input detected-->

        <label for="eircode">Eircode:</label><br> <!--eircode entry-->
        <input type="text" id="eircode" name="eircode" required pattern="^[A-Z]{1}[\d]{2}[ ]?[A-Z\d]{4}$" 
        required oninvalid="this.setCustomValidity('Please enter a valid Eircode')" 
        oninput="this.setCustomValidity('')"><br> <!--pattern allows one capital letter, two digits, then an optional space, then any combination of digits and/or capital letters. Custom error message-->

        <label for="location">Location:</label><br> <!--location entry-->
        <input type="text" id="location" name="location" placeholder="Notes on location"><br> <!--optional extra in case of hard to find location-->

        <label for="levels">Number of Levels:</label><br> <!--number of levels entry-->
        <input type="number" id="levels" name="levels" required pattern="^[\d]+$" min="1" max="100" 
        oninvalid="this.setCustomValidity('Please enter a number between 1 and 100')" 
        oninput="this.setCustomValidity('')"><br> <!--pattern allows any digit to be entered. minimum value is 1 and maximum value is 100. custom error messages-->

        <label for="receptrooms">Number of Reception Rooms:</label><br> <!--number of reception rooms entry-->
        <input type="number" id="receptrooms" name="receptrooms" required pattern="^[\d]+$" min="0" 
        max="100" oninvalid="this.setCustomValidity('Please enter a number between 0 and 100')" 
        oninput="this.setCustomValidity('')"><br> <!--pattern allows any digit to be entered. minimum value is 0 and maximum value is 100. custom error messages-->

        <label for="bedrooms">Number of Bedrooms:</label><br> <!--number of bedrooms entry-->
        <input type="number" id="bedrooms" name="bedrooms" required pattern="^[\d]+$" min="1" 
        max="100" oninvalid="this.setCustomValidity('Please enter a number between 1 and 100')" 
        oninput="this.setCustomValidity('')"><br> <!--pattern allows any digit to be entered. minimum value is 1 and maximum value is 100. custom error messages-->

        <label for="bathrooms">Number of Bathrooms:</label><br> <!--number of bathrooms entry-->
        <input type="number" id="bathrooms" name="bathrooms" required pattern="^[\d]+$" min="0" max="100"
        oninvalid="this.setCustomValidity('Please enter a number between 0 and 100')" 
        oninput="this.setCustomValidity('')"><br> <!--pattern allows any digit to be entered. minimum value is 0 and maximum value is 100. custom error messages-->

        </div>


        <div class="col"> <!--column two of css-->
        <label for="area">Area of house:</label><br> <!--area of house entry-->
        <input type="number" id="area" name="area" required pattern="^[\d]+$" min="10"><br> <!--pattern allows any digit entry. minimum value is 10-->

        <label for="heating">Heating: </label><br> <!--heating label-->
        <select name="heating" id="heating" required> <!--heating select box-->
            <option value="OFCH">OFCH</option>
            <option value="GFCH">GFCH</option>
            <option value="SFCH">SFCH</option>
            <option value="ECH">ECH</option>
            <option value="other">Other</option>
            <option value="none">None</option>
        </select><br>

        <label for="site">Site: </label><br> <!--site textarea label-->
        <textarea name="site" rows="5" cols="30" required placeholder="Size, gardens, driveway, etc">
        </textarea><br> <!--site entry-->

        <label for="notes">Notes: </label><br> <!--notes textarea label-->
        <textarea name="notes" rows="5" cols="30" placeholder="E.G. Exceptional condition, beautiful view, landscaped gardens">
        </textarea><br> <!--notes entry-->

        <label for="askingprice">Asking price:</label><br> <!--asking price entry-->
        <input type="number" id="askingprice" name="askingprice" required pattern="^[\d, ]+$" min="1000"
        oninvalid="this.setCustomValidity('Please enter a number greater than 1000')" 
        oninput="this.setCustomValidity('')"><br> <!--pattern allows any digit, space or comma. minimum value is 1000. custom error values-->

        <label for="vtimes">Viewing Times: </label><br> <!--viewing times label-->
        <select id="vtimes" name="vtimes"> <!--viewing times entry-->
                <option value="">Select viewing time</option>
                <option value="monday">Monday (9am – 5pm)</option>
                <option value="tuesday">Tuesday (9am – 5pm)</option>
                <option value="wednesday">Wednesday (9am – 5pm)</option>
                <option value="thursday">Thursday (9am – 5pm)</option>
                <option value="friday">Friday (9am – 5pm)</option>
                <option value="weekend">Weekends (5pm – 8pm)</option>
        </select>
        <br>
        </div>
        </div>

        <div class="form-actions"> <!--css class for styling-->
            <input type="submit" value="Submit"> <!--submit button-->
            <input type="reset" value="Reset"> <!--reset button-->
        </div>
    </fieldset>
    </div>
    </div>
    </div>
    </div>
    </form>
</body>
</html>