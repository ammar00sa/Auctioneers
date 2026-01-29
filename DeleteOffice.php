<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete an Office Property</title>
</head>
<body>
    <h2>Delete an Office Property</h2>

    <select name="offices" id="offices">
        <option value="officeAddress1">Address 1</option>
        <option value="officeAddress2">Address 2</option>
    </select>

    <div>
        <p>Shows the office property here after selecting by address</p>
    </div>

    <p>
        <a href="">For Sale</a>
        <a href="">Sale Agreed</a>
        <a href="">Sale Completed</a>
    </p>

    <input type="submit" value="Delete" onclick="confirmChange()">

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