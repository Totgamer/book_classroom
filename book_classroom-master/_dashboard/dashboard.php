<!doctype html>
<html lang="en" class="perfect-scrollbar-on">

<head>
  <title>Dashboard</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="css/material-dashboard.min.css" rel="stylesheet" />
  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="green">
      <div class="logo">
        <img src="img/logo.png" alt="logo" class="img-thumbnail mb-3">
        <a class="simple-text">
          <?php echo $_SESSION['username']?>
        </a>
        <a class="simple-text" style="font-size: 14px">
          <?php
            if($_SESSION['isAdmin']) {
              echo "<i class='material-icons small'>beenhere</i>" . " " . "Admin";
            } else {
              echo "User";
            }
            ?>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <!-- your sidebar here -->
          <li class="nav-item <?php if($_GET['action'] == 'reserveren') { echo 'active';} ?>">
            <a class="nav-link" href="index.php?action=reserveren">
              <i class="material-icons">today</i>
              <p>Reserveren</p>
            </a>
          </li>
          <li class="nav-item <?php if($_GET['action'] == 'instellingen') { echo 'active';} ?>">
            <a class="nav-link" href="index.php?action=instellingen">
              <i class="material-icons">settings</i>
              <p>Instellingen</p>
            </a>
          </li>
          <!-- Admin only -->
          <?php if($_SESSION['isAdmin'])
          {
            include('_dashboard/components/adminOnly.php');
          }
          ?>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;" style="text-transform:capitalize">
              <?php 
                if(isset($_GET['action']))
                {
                    $action = $_GET['action'];
                    echo $action;
                }
              ?>
            </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.php?logout='1'">
                  <i class="material-icons">close</i> Log uit
                </a>
              </li>
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <?php
            if(isset($_GET['action'])) {
              $component = $_GET['action'];
              include("_dashboard/components/$component.php"); 
            }
          ?>
          <!-- your content here -->
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear());
            </script>, made with <i class="material-icons">favorite</i> by Mitchell. Further worked on by Marco, Jake, Alper
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
<script src="js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
</body>

</html>