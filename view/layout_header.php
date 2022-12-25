<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $title; ?></title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='../assets/img/favicon.ico' />

  <!-- General JS Scripts -->
  <script src="../assets/js/app.min.js"></script>
  <script>
    var api_root="https://localhost:44362"
  </script>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i>
                </a>
              </li>
            <li>
              <a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a>
            </li>
            
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">

          <li class="dropdown">
            <a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="../assets/img/user.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              
            <div class="dropdown-title">User Name</div>
              
              <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a>

              <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>

              <div class="dropdown-divider"></div>
              <a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>

            </div>
          </li>

        </ul>
      </nav>


      <!--left sidebar-->
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">

          <div class="sidebar-brand">
            <a href="index.php"> <img alt="image" src="../assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">Adv Tax</span>
            </a>
          </div>

          <ul class="sidebar-menu">

            <li class="menu-header">Main</li>
            <li class="dropdown <?php if($title=='Dashboard'){ echo 'active'; } ?>">
              <a href="dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>

            <li class="dropdown <?php if($title=='TIN-Certificate'){ echo 'active'; } ?>">
              <a href="tin-certificate.php" class="nav-link"><i data-feather="clipboard"></i><span>TIN Certificate</span></a>
            </li>

            <li class="menu-header">Role</li>
            <li class="dropdown <?php if($title=='Role'){ echo 'active'; } ?>">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="user-check"></i><span>Role</span></a>
              <ul class="dropdown-menu">
                <li><a href="role.php">All Role</a></li>
                <li><a href="role-add.php">Add Role</a></li>
              </ul>
            </li>

            <li class="menu-header">Users</li>
            <li class="dropdown <?php if($title=='User'){ echo 'active'; } ?>">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="user"></i><span>User</span></a>
              <ul class="dropdown-menu">
                <li><a href="user.php">All Users</a></li>
                <li><a href="user-add.php">Add User</a></li>
              </ul>
            </li>

            <li class="menu-header">Income</li>
            <li class="dropdown <?php if($title=='Income'){ echo 'active'; } ?>">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="credit-card"></i><span>Income</span></a>
              <ul class="dropdown-menu">
                <li><a href="income.php">All Incomes</a></li>
                <li><a href="income-add.php">Add Income</a></li>
              </ul>
            </li>

            <li class="menu-header">Payment</li>
            <li class="dropdown <?php if($title=='Payment'){ echo 'active'; } ?>">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="dollar-sign"></i><span>Payment</span></a>
              <ul class="dropdown-menu">
                <li><a href="payment.php">All Payments</a></li>
                <li><a href="payment-add.php">Add Payment</a></li>
              </ul>
            </li>

            <li class="menu-header">Settings</li>
            <li class="dropdown <?php if($title=='Settings'){ echo 'active'; } ?>">
              <a href="settings.php" class="nav-link"><i data-feather="settings"></i><span>Site Settings</span></a>
            </li>
            <li class="dropdown <?php if($title=='Payment-Settings'){ echo 'active'; } ?>">
              <a href="payment-settings.php" class="nav-link"><i data-feather="grid"></i><span>Payment Settings</span></a>
            </li>

            <li class="menu-header">Ticket</li>
            <li class="dropdown <?php if($title=='Ticket'){ echo 'active'; } ?>">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="alert-octagon"></i><span>Tickets</span></a>
              <ul class="dropdown-menu">
                <li><a href="ticket.php">All Tickets</a></li>
                <li><a href="ticket-add.php">Open Ticket</a></li>
              </ul>
            </li>

          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
