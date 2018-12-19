<header class="header">
  <div class="logo-container">
    <a href="index.php" class="logo">
      <img src="../img/logo/sales.png" height="47" width="100" alt="JSOFT Admin" />
    </a>
    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
      <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
    </div>
  </div>

  <!-- start: search & user box -->
  <div class="header-right">

    <form action="pages-search-results.html" class="search nav-form">
      <div class="input-group input-search">
        <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
        <span class="input-group-btn">
          <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>

    <span class="separator"></span>

    <span class="separator"></span>

    <div id="userbox" class="userbox">
      <a href="#" data-toggle="dropdown">
        <figure class="profile-picture">
          <img src="../img/profiles/user.png" alt="Joseph Doe" class="img-circle" data-lock-picture="../img/profiles/user.png" />
        </figure>
        <div class="profile-info" data-lock-name="<?php echo $_SESSION['username'];?>" data-lock-email="<?php echo $_SESSION['email'];?>">
          <span class="name"><?php echo $_SESSION['username'];?></span>
          <span class="role">administrator</span>
        </div>

        <i class="fa custom-caret"></i>
      </a>

      <div class="dropdown-menu">
        <ul class="list-unstyled">
          <li class="divider"></li>
          <li>
            <a role="menuitem" tabindex="-1" href="profile.php"><i class="fa fa-user"></i> My Profile</a>
          </li>
          <li>
            <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
          </li>
          <li>
            <a role="menuitem" tabindex="-1" href="../src/logout.php"><i class="fa fa-power-off"></i> Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>
