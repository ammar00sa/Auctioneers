
<!doctype html>
<html lang="en">
<head>
  
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Client Maintenance</title>

  <link rel="stylesheet" href="../MainScreens/style.css" />
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
  <div class="layout">

    <!-- Sidebar -->
    <aside class="sidebar">
    <div class="brand-side">
    <img src="images/logo.png" alt="Logo" class="brand-side__logo">
    </div>

      <nav>
        <div class="side-title">Client Maintenance</div>

        <ul class="side-menu">
          <li>
            <!-- Active page -->
            <a class="side-menu__link is-active" href="addClient.html"> <!--same as add a new client page-->
              <i class="fa-solid fa-user-plus"></i>
              <span>Add a New Client</span>
            </a>
          </li>

          <li>
            <a class="side-menu__link" href="deleteClient.html">
              <i class="fa-solid fa-user-minus"></i>
              <span>Delete a Client</span>
            </a>
          </li>

          <li>
            <a class="side-menu__link" href="editClient.html">
              <i class="fa-solid fa-user-pen"></i>
              <span>Amend / View a Client</span>
            </a>
          </li>

          <li class="danger">
            <a class="side-menu__link" href="../MainScreens/home.html">
              <i class="fa-solid fa-house"></i>
              <span>Exit</span>
            </a>
          </li>
        </ul>
      </nav>


    </aside>

    <!-- Main content -->
    <main class="content">
      <header class="content__top">
        <h2>Client Maintenance</h2>
        <p>Select an option from the left menu.</p>
      </header>

      <section class="card">
        <h3>Delete a Client</h3>
        <p>
          This section will allow you to delete a client.

          <br>

          <h2>Select the client you wish to delete: </h2>



<select name="clients">

    <?php

    include 'db.inc.php';
    date_default_timezone_set("UTC");

    $sql = "SELECT * from Client";
    $result = mysqli_query($con, $sql);

    if (!mysqli_query($con,$sql))
{
    die ("An Error in the SQL Query: " . mysqli_error($con) );
}




while($row=mysqli_fetch_array($result))
    {

    $name = $row["Name"];

echo "<option value='" . $name . "'>" . $name . "</option>";


    }

mysqli_close($con);

?>

</select>

<br>

<input type="submit" value="Delete">






</section>
         

          
        </p>
      </section>
    </main>

  </div>
</body>
</html>


