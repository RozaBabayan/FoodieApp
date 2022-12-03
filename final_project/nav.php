

<nav class="navbar navbar-expand-lg navbar-light backgroudColor">
      <a class="navbar-brand" href="/Assignment/final_project/home.php"
        ><strong>FooDie</strong></a
      >
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item active">
            <a class="nav-link" href="/Assignment/final_project/index.php">Search <span class="sr-only"></span></a>
          </li>
          <?php if (!isset($_SESSION["id"])||!$_SESSION["id"]) :?>
          <li class="nav-item">
            <a class="nav-link" href="/Assignment/final_project/login/login.php">MyProfile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Assignment/final_project/login/register_form.php">Register</a>
          </li>
          <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="/Assignment/final_project/login/logout.php">LogOut</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Assignment/final_project/login/update.php">Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Assignment/final_project/favorites.php">My Favorites</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Assignment/final_project/create.php">Create</a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>



   