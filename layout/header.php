<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title><?php echo $title . ' - CamboJobs' ?></title>
  <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Work+Sans:300,400,700" rel="stylesheet" />
  <link rel="stylesheet" href="src/fonts/icomoon/style.css" />
  <link rel="stylesheet" href="src/css/bootstrap.min.css" />
  <link rel="stylesheet" href="src/css/magnific-popup.css" />
  <link rel="stylesheet" href="src/css/jquery-ui.css" />
  <link rel="stylesheet" href="src/css/owl.carousel.min.css" />
  <link rel="stylesheet" href="src/css/owl.theme.default.min.css" />
  <link rel="stylesheet" href="src/css/bootstrap-datepicker.css" />
  <link rel="stylesheet" href="src/css/animate.css" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css" />

  <link rel="stylesheet" href="src/fonts/flaticon/font/flaticon.css" />

  <link rel="stylesheet" href="src/css/aos.css" />

  <link rel="stylesheet" href="src/css/style.css" />
</head>

<body>
  <div class="site-wrap">
    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    <!-- .site-mobile-menu -->

    <div class="site-navbar-wrap js-site-navbar bg-white">
      <div class="container">
        <div class="site-navbar bg-light">
          <div class="py-1">
            <div class="row align-items-center">
              <div class="col-2">
                <h2 class="mb-1 site-logo">
                  <a href="index.php">Job<strong class="font-weight-bold">Finder</strong>
                  </a>
                </h2>
              </div>
              <div class="col-10">
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">
                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3">
                      <a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
                    </div>

                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                      <li><a href="browse.php">Browse</a></li>
                      <li><a href="about.php">About</a></li>
                      <li><a href="contact.php">Contact</a></li>
                      <?php
                      if ($_SESSION['admin'] == 1){
                        echo '
                        <li class="has-children">
                          <a href="user.php">' . $_SESSION['user'] . '</a>
                        <ul class="dropdown arrow-top">
                          <li><a href="admin/index.php">Admin</a></li>
                          <li><a href="logout.php">Logout</a></li>
                        </ul>
                        </li>
                        ';
                      } 
                      elseif ($_SESSION['user'] === true) {
                        echo '
                        <li class="has-children">
                          <a href="user.php">' . $_SESSION['user'] . '</a>
                        <ul class="dropdown arrow-top">
                          <li><a href="logout.php">Logout</a></li>
                        </ul>
                        </li>
                        ';
                      } else {
                        echo '<li class="has-children"><a href="login.php">Login</a>
                        <ul class="dropdown arrow-top">
                          <li><a href="register.php">Register</a></li>
                        </ul>
                        </li>';
                      }
                      ?>

                      <li>
                        <a href="new-post.php"><span class="bg-primary text-white py-3 px-4 rounded"><span class="icon-plus mr-3"></span>Post New
                            Job</span></a>
                      </li>

                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div style="height: 113px;"></div>

    <main container class="siteContent">
      <!-- BEGIN CHANGEABLE CONTENT. -->
    </main>
  </div>
</body>

</html>