function createMenu() {
  return `
        <div class="layout">

    <!-- Sidebar -->
    <aside class="sidebar">
    <div class="brand-side">
    <img src="images/logo.png" alt="Logo" class="brand-side__logo">
    </div>



      <nav>
        <ul class="side-menu">
          <li>
            <!-- Home -->
            <a class="side-menu__link is-active" href="../MainScreens/home.html">
              <i class="fa-solid fa-house"></i>
              <span>Home</span>
            </a>
          </li>

          <li>
            <a class="side-menu__link" href="../MainScreens/bids.html">
              <i class="fa-solid fa-gavel"></i>
              <span>Deal with Bids</span>
            </a>
          </li>

          <li>
            <a class="side-menu__link" href="../MainScreens/sales.html">
              <i class="fa-solid fa-handshake"></i>
              <span>Deal with Sales</span>
            </a>
          </li>

          <li>
            <a class="side-menu__link" href="../MainScreens/clients.html">
              <i class="fa-solid fa-users"></i>
              <span>Client Maintenance</span>
            </a>
          </li>

          <li>
            <a class="side-menu__link" href="../MainScreens/property.html">
              <i class="fa-solid fa-house-chimney"></i>
              <span>Property Maintenance</span>
            </a>
          </li>

          <li>
            <a class="side-menu__link" href="../MainScreens/reports.html">
              <i class="fa-solid fa-chart-column"></i>
              <span>Reports Menu</span>
            </a>
          </li>

          <li class="danger">
            <a class="side-menu__link" href="login.html">
              <i class="fa-solid fa-right-from-bracket"></i>
              <span>Exit</span>
            </a>
          </li>
        </ul>
      </nav>


    </aside>
    </div>
  `;
}