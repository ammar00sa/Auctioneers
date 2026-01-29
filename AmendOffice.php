<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amend/View Office</title>
</head>
<body>
       <select name="offices" id="offices">
        <option value="officeAddress1">Address 1</option>
        <option value="officeAddress2">Address 2</option>
    </select>

    <div>
        <p>Details of the office selected</p>
    </div>

    <div>

    </div>

    
     <input type="submit" value="Save" onclick="confirmChange()">

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