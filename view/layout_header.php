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
    var loged_user=null;
    var permission=null;
    if(sessionStorage.getItem("user_id")){
      loged_user=sessionStorage.getItem("user_id");
      permission= sessionStorage.getItem("permission").split(",");
    }
    $( document ).ready(function() {
        if(loged_user==null){
          window.location.href="login.php";
        }
    });
   
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
              
              <a href="#" onclick="window.location.href='user-view.php?id='+loged_user;" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" onclick="window.location.href='logout.php'" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
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
            <li class="menu-header" id="main-lebel">Main</li>
            <li class="dropdown <?php if($title=='Dashboard'){ echo 'active'; } ?>" id="dashboard">
              <a href="dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>

            <li class="dropdown <?php if($title=='TIN-Certificate'){ echo 'active'; } ?>" id="TIN-Certificate">
              <a href="tin-certificate.php" class="nav-link"><i data-feather="clipboard"></i><span>TIN Certificate</span></a>
            </li>

            <li class="menu-header" id="Role-lebel">Role</li>
            <li class="dropdown <?php if($title=='Role'){ echo 'active'; } ?>" id="Role">
              <a href="#" class="menu-toggle nav-link has-dropdown" id=""><i
                  data-feather="user-check"></i><span>Role</span></a>
              <ul class="dropdown-menu">
                <li><a href="role.php" id="all-role">All Role</a></li>
                <li><a href="role-add.php" id="add-role">Add Role</a></li>
              </ul>
            </li>

            <li class="menu-header" id="user-lebel">Users</li>
            <li class="dropdown <?php if($title=='User'){ echo 'active'; } ?>" id="user">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="user"></i><span>User</span></a>
              <ul class="dropdown-menu">
                <li><a href="user.php" id="all-user">All Users</a></li>
                <li><a href="user-add.php" id="add-user">Add User</a></li>
              </ul>
            </li>

            <li class="menu-header" id="income-lebel">Income</li>
            <li class="dropdown <?php if($title=='Income'){ echo 'active'; } ?>" id="income">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="credit-card"></i><span>Income</span></a>
              <ul class="dropdown-menu">
                <li><a href="income.php" id="all-income">All Incomes</a></li>
                <li><a href="income-add.php" id="add-income">Add Income</a></li>
              </ul>
            </li>

            <li class="menu-header" id="payment-lebel">Payment</li>
            <li class="dropdown <?php if($title=='Payment'){ echo 'active'; } ?>" id="payment">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="dollar-sign"></i><span>Payment</span></a>
              <ul class="dropdown-menu">
                <li><a href="payment.php" id="all-payment">All Payments</a></li>
                <li><a href="payment-add.php" id="add-payment">Add Payment</a></li>
              </ul>
            </li>

            <li class="menu-header" id="settings-lebel">Settings</li>
            <li class="dropdown <?php if($title=='Settings'){ echo 'active'; } ?>" id="site-settings">
              <a href="settings.php" class="nav-link"><i data-feather="settings"></i><span>Site Settings</span></a>
            </li>
            <li class="dropdown <?php if($title=='Payment-Settings'){ echo 'active'; } ?>" id="payment-settings">
              <a href="payment-settings.php" class="nav-link"><i data-feather="grid"></i><span>Payment Settings</span></a>
            </li>

            <li class="menu-header" id="ticket-lebel">Ticket</li>
            <li class="dropdown <?php if($title=='Ticket'){ echo 'active'; } ?>" id="ticket">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="alert-octagon"></i><span>Tickets</span></a>
              <ul class="dropdown-menu">
                <li><a href="ticket.php" id="all-ticket">All Tickets</a></li>
                <li><a href="ticket-add.php" id="open-ticket">Open Ticket</a></li>
              </ul>
            </li>

          </ul>
        </aside>
      </div>

      <script>
        if(permission!==null){
          //Main
          !permission.includes('1') && !permission.includes('2') && !permission.includes('3')? $('#main-lebel').hide():'';
          !permission.includes('1') && !permission.includes('2')? $('#dashboard').hide():'';
          !permission.includes('3')? $('#TIN-Certificate').hide():'';

          //Role
          !permission.includes('4') && !permission.includes('6')? $('#Role-lebel').hide():'';
          !permission.includes('4') && !permission.includes('6')? $('#Role').hide():'';
          !permission.includes('4')? $('#all-role').hide():'';
          !permission.includes('6')? $('#add-role').hide():'';

          //User
          !permission.includes('7') && !permission.includes('8')? $('#user-lebel').hide():'';
          !permission.includes('7') && !permission.includes('8')? $('#user').hide():'';
          !permission.includes('7')? $('#all-user').hide():'';
          !permission.includes('8')? $('#add-user').hide():'';

          //Income
          !permission.includes('12') && !permission.includes('13')? $('#income-lebel').hide():'';
          !permission.includes('12') && !permission.includes('13')? $('#income').hide():'';
          !permission.includes('12')? $('#all-income').hide():'';
          !permission.includes('13')? $('#add-income').hide():'';

          //Payment
          !permission.includes('17') && !permission.includes('18')? $('#payment-lebel').hide():'';
          !permission.includes('17') && !permission.includes('18')? $('#payment').hide():'';
          !permission.includes('17')? $('#all-payment').hide():'';
          !permission.includes('18')? $('#add-payment').hide():'';

          //Settings
          !permission.includes('20') && !permission.includes('21')? $('#settings-lebel').hide():'';
          !permission.includes('20')? $('#site-settings').hide():'';
          !permission.includes('21')? $('#payment-settings').hide():'';

          //Payment
          !permission.includes('25') && !permission.includes('26')? $('#ticket-lebel').hide():'';
          !permission.includes('25') && !permission.includes('26')? $('#ticket').hide():'';
          !permission.includes('25')? $('#all-ticket').hide():'';
          !permission.includes('26')? $('#open-ticket').hide():'';
        }
        


        




      </script>
      <!-- Main Content -->
      <div class="main-content">
