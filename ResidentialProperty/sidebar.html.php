<!--Created by: Joseph Lalor
Date: 09/03/2026
Student Number: c00312883
Title: sidebar.html.php
Purpose: A HTML/PHP file to create the sidebar menu in html files, to avoid repetition
-->
    <aside class="sidebar">
    <div class="brand-side">
    <img src="logo.png" alt="Logo" class="brand-side__logo"/>
    </div>

    <nav>
      <div class="side-title">Property Maintenance</div>

      <ul class="side-menu">
          <li><a class="side-menu__link" href="resPropAdd.html.php"><i class="fa-solid fa-house"></i><span>Add a New Residential Property</span></a></li>
          <li><a class="side-menu__link" href="resPropDelete.html.php"><i class="fa-solid fa-trash"></i><span>Delete a Residential Property</span></a></li>
          <li><a class="side-menu__link" href="resPropAmendView.html.php"><i class="fa-solid fa-pen-to-square"></i><span>Amend/View a Residential Property</span></a></li>

        <div class="side-divider"></div>

          <li><a class="side-menu__link" href="add-land.html"><i class="fa-solid fa-tree"></i><span>Add a New Land Property</span></a></li>
          <li><a class="side-menu__link" href="delete-land.html"><i class="fa-solid fa-trash"></i><span>Delete a Land Property</span></a></li>
          <li><a class="side-menu__link" href="edit-land.html"><i class="fa-solid fa-pen-to-square"></i><span>Amend/View a Land Property</span></a></li>

        <div class="side-divider"></div>

          <li><a class="side-menu__link" href="add-office.html"><i class="fa-solid fa-building"></i><span>Add a New Office Property</span></a></li>
          <li><a class="side-menu__link" href="delete-office.html"><i class="fa-solid fa-trash"></i><span>Delete an Office Property</span></a></li>
          <li><a class="side-menu__link" href="edit-office.html"><i class="fa-solid fa-pen-to-square"></i><span>Amend/View an Office Property</span></a></li>

          <li class="danger"><a class="side-menu__link" href="home.html"><i class="fa-solid fa-house"></i><span>Exit</span></a></li>
      </ul>
</nav>
  </aside>
