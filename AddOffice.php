<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Office</title>                                                   
</head>
<body>
    <h2>Add New Office Property</h2>

    <form action="<?php  htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <label for="address">Address: </label>
        <input type="text" name="address" id="address" required pattern="[A-Za-z0-9\s\.,]+" placeholder="Posh Street, Barrow">
        <br>

        <label for="eircode">Eircode: </label>
        <input type="text" name="eircode" id="eircode" pattern="^[A-Za-z][0-9]{2}[A-Za-z0-9]{4}$" title="Eircode must be 7 characters: letter, two digits, then letters or digits" placeholder="A1245B8" required>
        <br>

        <label for="location">Location: </label>
        <input type="text" name="location" id="location" required>
        <br>
        
        <label for="floor">Floor: </label>
        <input type="text" name="floor" id="floor" required placeholder="7th floor">
        <br>

        <label for="area">Area: </label>
        <input type="number" name="area" id="area" step="0.01" min="0" placeholder="0.00" required> <span>>m²</span>
        <br>

        <label for="layout">Layout: </label>
        <input type="text" name="layout" id="layout" required placeholder="large open area, 2 adjoining small rooms, storage area, toilets">
        <br>

        <label for="internet">Internet: </label>
        <input type="radio" name="wireless" id="internet">
        <input type="radio" name="wired" id="internet">
        <br>

        <label for="access">Access: </label>
        <input type="text" name="access" id="access" required >
        <br>

        <label for="tel">Telephone System: </label>
        <input type="text" name="tel" id="tel" required pattern="[0-9\s\-\(\)]+" placeholder="(353) - 871262837">
        <br>

        <label for="reception">Reception facilities: </label>
        <input type="text" name="reception" id="reception" required placeholder="one receptionist always on duty">
        <br>

        <label for="security">Type of security: </label>
        <input type="text" name="security" id="security" required placeholder="Netwatch, security patrols">
        <br>

        <label for="canteen">Canteen facilities: </label>
        <input type="text" name="canteen" id="canteen" required placeholder="large open-access canteen on top floor serving full lunches">
        <br>

        <label for="ownership">Type of ownership: </label>
        <select name="ownership" id="ownership">
            <option value="freehold">Freehold</option>
            <option value="long lease">Long lease</option>
        </select>
        <br>

        <label for="price">Asking Price: </label>
        <input type="number" name="price" id="price" placeholder="0.00" step="0.01">
        <br>

        <label for="viewtimes">Viewing times: </label>
        <input type="time" name="viewtimes" id="viewtimes">
        <br>

        <!-- Cancel button abandoning the screen  without altering the database-->
        <button type="reset" name="cancel">Cancel</button>
        <input type="submit" value="Add Office Property" name="submit" onclick="confirmChange(event)">
        <br>
    </form>

    <script>
        function confirmChange(e){
            //Submit form with the values to the database
            let result = confirm("Are you sure (Y/N)?");
            if(!result){
                //Stay in the page without refreshing the page.
                 e.preventDefault();
            }
        }
    </script>
</body>
</html>

<?php 

    if($_SERVER["REQUEST_METHOD"] = "POST"){
        echo "Submitted";
    }

?>