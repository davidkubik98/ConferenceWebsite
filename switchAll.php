<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>QICC - Change Session</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="vendors/flat-icon/font/flaticon.css">


  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!--================ Header Menu Area start =================-->
          <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-end">
              <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="committees.php">Committees</a>
              <li class="nav-item"><a class="nav-link" href="speaker.php">Speakers</a>
              <li class="nav-item"><a class="nav-link" href="hotel.php">Hotel</a>
              <li class="nav-item"><a class="nav-link" href="schedule.php">Schedule</a>
              <li class="nav-item submenu dropdown">
                <a href="alljobs.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Attendees</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="students.php">Students</a>
                  <li class="nav-item"><a class="nav-link" href="professionals.php">Professionals</a>
                  <li class="nav-item"><a class="nav-link" href="sponsors.php">Sponsors</a></li>
                </ul>
              <li class="nav-item submenu dropdown">
                <a href="alljobs.php" class="nav-link dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Jobs</a>
                <ul class="dropdown-menu">
                  <li class="nav-item active"><a class="nav-link" href="alljobs.php">All Jobs</a>
                  <li class="nav-item"><a class="nav-link" href="jobs.php">Search Jobs</a>
                </ul>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Admin</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="add.php">Add Student</a>
                  <li class="nav-item"><a class="nav-link" href="addProfessional.php">Add Professional</a>
                  <li class="nav-item"><a class="nav-link" href="addSponsor.php">Add Sponsor</a>
                  <li class="nav-item"><a class="nav-link" href="deleteSponsor.php">Delete Sponsor</a>
                  <li class="nav-item"><a class="nav-link" href="switch.php">Switch Session Day/Time</a>
                  <li class="nav-item"><a class="nav-link" href="switchLoc.php">Switch Session Location</a>
                  <li class="nav-item"><a class="nav-link" href="switchAll.php">Switch Session Day/Time and Location</a>
                </ul>
							</li>
                </ul>
            <ul class="nav-right text-center text-lg-right py-4 py-lg-0">
              <li><a href="contact.html">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->


  <!--================Hero Banner Area Start =================-->
  <section class="hero-banner hero-banner-sm">
    <div class="container text-center">
      <h2>Edit a Session's Location And Date/Time</h2>
      <nav aria-label="breadcrumb" class="banner-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Admin</li>
        </ol>
      </nav>
    </div>
  </section>
  <!--================Hero Banner Area End =================-->



  <!--================ Join section Start =================-->
  <section class="section-margin">
    <div class="container">
      <div class="section-intro text-center pb-90px">
        <p class="section-intro__title">Enter the session's new info below</p>
        <h2 class="primary-text">Switch a Session's Location And Date/Time</h2>
        <img src="img/home/section-style.png" alt="">
      </div>
    <br>
    <br>
    <?php
  $e_name = @$_POST['name'];
  $s_time = @$_POST['start']."00";
  $e_time = @$_POST['end']."00";
  $new_loc = @$_POST['loc'];
  if (isset($_POST['submit'])){
  require './config.php';
  try{
    $conn = new PDO($dsn, $username, $password,$options);
    $query = "UPDATE event SET day=:day, start_time= :start,
    end_time =:end, room_num=:loc WHERE event_title=:name";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':day', $_POST['day']);
  $stmt->bindParam(':start',$s_time);
  $stmt->bindParam(':end', $e_time);
  $stmt->bindParam(':loc', $new_loc);
  $stmt->bindParam(':name', $e_name);
  $stmt->execute();
  }catch(PDOException $error) {
      echo $query . "<br>" . $error->getMessage();
  }
  }

  ?>
  <style type="text/css">
  <?php include './newstyle.css' ?>
  </style>
  <form method="post">
    <label for="name">Event Name</label>
    <input type="text" name="name" id="name">
    <label for="loc">New Location</label>
    <input type="text" name="loc" id="loc">
    <label for="day">New Date (Ex: YYYY-MM-DD)</label>
		<input type="text" name="day" id="day">
		<label for="start">New Start Time (24 Hour)</label>
		<input type="text" name="start" id="start">
		<label for="end">New End Time (24 Hour)</label>
		<input type="text" name="end" id="end">
    <input type="submit" name="submit" value="submit">
  </form>

    </div>
  </section>
  <!--================ Join section End =================-->


  <!-- ================ start footer Area ================= -->
<footer class="footer-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-3  col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>About QICC</h6>
            <p>
              QICC brings together passionate students from across the world. Meet like-minded peers, learn from world-renowned experts and discover career opportunities with exciting companies.
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>Navigation Links</h6>
            <div class="row">
              <div class="col">
                <ul>
                  <li><a href="index.html">Home</a></li>
                  <li><a href="about.html">About</a></li>
                  <li><a href="committees.php">Committees</a></li>
                  <li><a href="speakers.php">Speakers</a></li>
                </ul>
              </div>
              <div class="col">
                <ul>
                  <li><a href="hotel.php">Hotel</a></li>
                  <li><a href="schedule.php">Schedule</a></li>
                  <li><a href="jobs.php">Jobs</a></li>
                  <li><a href="contact.html">Contact</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3  col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>Newsletter</h6>
            <p>
              Join to receive to stay up-to-date on the latest news a
            </p>
            <div id="mc_embed_signup">
              <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscription relative">
                <div class="input-group d-flex flex-row">
                  <input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                  <button class="btn bb-btn"><span class="lnr lnr-location"></span></button>
                </div>
                <div class="mt-10 info"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row align-items-center">
          <p class="col-lg-8 col-sm-12 footer-text m-0 text-center text-lg-left">
          Copyright QICC &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </p>
          <div class="col-lg-4 col-sm-12 footer-social text-center text-lg-right">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- ================ End footer Area ================= -->




  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="vendors/Magnific-Popup/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/countdown.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/main.js"></script>


</script>

</body>
</html>
