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
    <script src="elements.js"></script>
    <script src="resPropAdd.js"></script>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div id="menu"></div>
    <script>document.getElementById('menu').innerHTML = createMenu();</script>
    
    <header class="content__top">
        <h1>Add a New Residential Property</h1>
    </header>

    <form action="resPropAdd.php" method="Post" onsubmit="return validate()">

    <?php
        include 'db.inc.php';
        $sql = mysqli_query($con, "SELECT Name, ClientID FROM Client");
        if (!$sql) {
            die("Query failed: " . mysqli_error($con));
        }
    ?>

    <label for="client">Client:</label><br>
        <select name="client" id="client">
            <option value="">-- Select a client --</option>
            <?php while ($row = mysqli_fetch_assoc($sql)) {?>
                <option value="<?= htmlspecialchars($row['ClientID']) ?>">
                    <?= htmlspecialchars($row['Name']) ?>
                </option>
            <?php } ?>
        </select><br>

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
        <input type="text" id="eircode" name="eircode" required pattern="^[A-Z]{1}[\d]{2}[A-Z\d]{4}$" 
        required oninvalid="this.setCustomValidity('Please enter a valid Eircode')" 
        oninput="this.setCustomValidity('')"><br>

        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location" required pattern="^[a-zA-Z]+$"><br>

        <label for="levels">Number of Levels:</label><br>
        <input type="text" id="levels" name="levels" required pattern="^[\d]+$" min="1" max="100"><br>

        <label for="receptrooms">Number of Reception Rooms:</label><br>
        <input type="text" id="receptrooms" name="receptrooms" required pattern="^[\d]+$" min="0" max="100"><br>

        <label for="bedrooms">Number of Bedrooms:</label><br>
        <input type="text" id="bedrooms" name="bedrooms" required pattern="^[\d]+$" min="1" max="100"><br>

        <label for="bathrooms">Number of Bathrooms:</label><br>
        <input type="text" id="bathrooms" name="bathrooms" required pattern="^[\d]+$" min="0" max="100"><br>

        <label for="area">Area of house:</label><br>
        <input type="text" id="area" name="area" required pattern="^[\d]+$" min="10"><br>

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
        <input type="text" id="askingprice" name="askingprice" required pattern="^[\d, ]+$"><br>

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

        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>
</html>