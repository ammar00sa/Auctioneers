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
    <title>Add a New Residential Property</title>
    <script src="element.js"></script>
    <script src="resPropAdd.js"></script>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="card">
    <header class="content__top">
        <h1>Add a New Residential Property</h1>
    </header>

    <form action="resPropAdd.php" method="Post" onsubmit="return validate()">

    <div class="layout">

    <div id="menu"></div>
    <script>document.getElementById('menu').innerHTML = createMenu();</script>

    <?php
        include 'db.inc.php';
        $sql = mysqli_query($con, "SELECT Name, ClientID FROM Client");
        if (!$sql) {
            die("Query failed: " . mysqli_error($con));
        }
    ?>

    <div class="grid">
        <div class="panel">
            <fieldset>
              <legend>Residential Property Details</legend>
    <label for="client">Client:</label><br>
        <select name="client" id="client">
            <option value="">-- Select a client --</option>
            <?php while ($row = mysqli_fetch_assoc($sql)) {?>
                <option value="<?= htmlspecialchars($row['ClientID']) ?>">
                    <?= htmlspecialchars($row['Name']) ?>
                </option>
            <?php } ?>
        </select><br>

        <div class="two-col">
        <div class="col">
        <label for="proptype">Property type: </label><br>
        <select name="proptype" id="proptype" required>
            <option value="semidetached">Semi Detached</option>
            <option value="terraced">Terraced</option>
            <option value="detached">Detached</option>
            <option value="apartment">Apartment</option>
            <option value="mews">Mews</option>
        </select><br> 

        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" pattern="^[,a-zA-Z ]+$" 
        required oninvalid="this.setCustomValidity('Please only use alphabetic characters')" 
        oninput="this.setCustomValidity('')"><br>

        <label for="eircode">Eircode:</label><br>
        <input type="text" id="eircode" name="eircode" required pattern="^[A-Z]{1}[\d]{2}[ ]?[A-Z\d]{4}$" 
        required oninvalid="this.setCustomValidity('Please enter a valid Eircode')" 
        oninput="this.setCustomValidity('')"><br>

        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location" required pattern="^[a-zA-Z]+$"><br>

        <label for="levels">Number of Levels:</label><br>
        <input type="number" id="levels" name="levels" required pattern="^[\d]+$" min="1" max="100" 
        oninvalid="this.setCustomValidity('Please enter a number between 1 and 100')" 
        oninput="this.setCustomValidity('')"><br>

        <label for="receptrooms">Number of Reception Rooms:</label><br>
        <input type="number" id="receptrooms" name="receptrooms" required pattern="^[\d]+$" min="0" 
        max="100" oninvalid="this.setCustomValidity('Please enter a number between 0 and 100')" 
        oninput="this.setCustomValidity('')"><br>

        <label for="bedrooms">Number of Bedrooms:</label><br>
        <input type="number" id="bedrooms" name="bedrooms" required pattern="^[\d]+$" min="1" 
        max="100" oninvalid="this.setCustomValidity('Please enter a number between 1 and 100')" 
        oninput="this.setCustomValidity('')"><br>

        <label for="bathrooms">Number of Bathrooms:</label><br>
        <input type="number" id="bathrooms" name="bathrooms" required pattern="^[\d]+$" min="0" max="100"
        oninvalid="this.setCustomValidity('Please enter a number between 0 and 100')" 
        oninput="this.setCustomValidity('')"><br>

        </div>


        <div class="col">
        <label for="area">Area of house:</label><br>
        <input type="number" id="area" name="area" required pattern="^[\d]+$" min="10"><br>

        <label for="heating">Heating: </label><br>
        <select name="heating" id="heating" required>
            <option value="OFCH">OFCH</option>
            <option value="GFCH">GFCH</option>
            <option value="SFCH">SFCH</option>
            <option value="ECH">ECH</option>
            <option value="other">Other</option>
            <option value="none">None</option>
        </select><br>

        <label for="site">Site: </label><br>
        <textarea name="site" rows="5" cols="30" required placeholder="Size, gardens, driveway, etc">
        </textarea><br> 

        <label for="notes">Notes: </label><br>
        <textarea name="notes" rows="5" cols="30" placeholder="E.G. Exceptional condition, beautiful view, landscaped gardens">
        </textarea><br>

        <label for="askingprice">Asking price:</label><br>
        <input type="number" id="askingprice" name="askingprice" required pattern="^[\d, ]+$" min="1000"
        oninvalid="this.setCustomValidity('Please enter a number greater than 1000')" 
        oninput="this.setCustomValidity('')"><br>

        <label for="vtimes">Viewing Times: </label><br>
        <select id="vtimes" name="vtimes">
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

        <div class="form-actions">
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </div>
    </fieldset>
    </div>
    </div>
    </div>
    </div>
    </form>
</body>
</html>