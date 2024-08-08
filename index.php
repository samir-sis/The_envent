<?php
session_start(); // Start the session at the beginning

// Check if user is logged in
$isLoggedIn = isset($_SESSION['user_name']);
$userName = $isLoggedIn ? $_SESSION['user_name'] : null;

// default language is English
if (!isset($_SESSION['lang'])) {
  $_SESSION['lang'] = 'en';
}

// check if language is passed as a GET parameter
if (isset($_GET['lang'])) {
  $_SESSION['lang'] = $_GET['lang'];
}

// load the language file
$lang = $_SESSION['lang'];
$translations = include "lang/{$lang}.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>la Conférence
  Internationale d'Affaires à Tunis</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: TheEvent
  * Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="index.php" class="logo d-flex align-items-center me-auto">
            <img src="assets/img/logo.png" alt="Logo">
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active"><?= $translations['home'] ?><br></a></li>
                <li><a href="#speakers"><?= $translations['speakers'] ?></a></li>
                <li><a href="#schedule"><?= $translations['schedule'] ?></a></li>
                <li><a href="#venue"><?= $translations['venue'] ?></a></li>
                <li><a href="#hotels"><?= $translations['hotels'] ?></a></li>
                <li><a href="#gallery"><?= $translations['gallery'] ?></a></li>
                <li><a href="#contact"><?= $translations['contact'] ?></a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <!-- Call-to-Action Buttons -->
        <div class="cta-buttons d-none d-sm-block" id="cta-buttons">
            <?php if ($isLoggedIn): ?>
                <a class="cta-btn" href="#buy-tickets"><?= $translations['buy_tickets'] ?></a>
                <a class="cta-btn ms-2" href="logout.php"><?= $translations['log_out'] ?> (<?= htmlspecialchars($userName); ?>)</a>
            <?php else: ?>
                <a class="cta-btn" href="#buy-tickets"><?= $translations['buy_tickets'] ?></a>
                <a class="cta-btn ms-2" href="signup.html"><?= $translations['register'] ?></a>
                <a class="cta-btn ms-2" href="signin.html"><?= $translations['login'] ?></a>
            <?php endif; ?>
        </div>

        <!-- Language Dropdown -->
        <div class="dropdown ms-2">
            <button class="btn btn-light dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Flag_of_the_United_Kingdom_%281-2%29.svg" class="me-2" style="width: 20px; height: auto;"> <?= $translations['en'] ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                <li><a class="dropdown-item" href="?lang=en"><img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Flag_of_the_United_Kingdom_%281-2%29.svg" class="me-2" style="width: 20px; height: auto;"> <?= $translations['en'] ?></a></li>
                <li><a class="dropdown-item" href="?lang=fr"><img src="https://www.theflagshop.co.uk/media/catalog/product/cache/1aa45e34d8351bef7860daeb50e7952c/f/r/france-flag-8x5.gif" class="me-2" style="width: 20px; height: auto;"> <?= $translations['fr'] ?></a></li>
                <li><a class="dropdown-item" href="?lang=ar"><img src="https://static.vecteezy.com/system/resources/thumbnails/011/571/229/small_2x/circle-flag-of-tunisia-free-png.png" class="me-2" style="width: 20px; height: auto;"> <?= $translations['ar'] ?></a></li>
            </ul>
        </div>
    </div>
</header>



  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
        <img src="assets/img/background.png" alt="" data-aos="fade-in" class="">
        <div class="container d-flex flex-column align-items-center text-center mt-auto">
            <h2 data-aos="fade-up" data-aos-delay="100" class="">
                <?php echo $translations['conference_title']; ?>
            </h2>
            <p data-aos="fade-up" data-aos-delay="200">
                <?php echo $translations['conference_date']; ?>
            </p>
            <div data-aos="fade-up" data-aos-delay="300" class="">
                <a href="https://www.youtube.com/watch?v=VgONzCp2KxY" class="glightbox pulsating-play-btn mt-3"></a>
            </div>
        </div>

        <div class="about-info mt-auto position-relative">
            <div class="container position-relative" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6">
                        <h2><?php echo $translations['about_event']; ?></h2>
                        <p><?php echo $translations['event_description']; ?></p>
                    </div>
                    <div class="col-lg-3">
                        <h3><?php echo $translations['where']; ?></h3>
                        <p><?php echo $translations['golden_tulip']; ?></p>
                    </div>
                    <div class="col-lg-3">
                        <h3><?php echo $translations['when']; ?></h3>
                        <p><?php echo $translations['dates']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Speakers Section -->
    <section id="speakers" class="speakers section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2><?php echo $translations['speakers_section_title']; ?><br></h2>
</div><!-- End Section Title -->

<div class="container text-center">
  <div class="row gy-3 justify-content-center">
    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
      <div class="member">
        <img src="assets/img/speakers/speaker-1.jpg" class="img-fluid" alt="">
        <div class="member-info">
          <div class="member-info-content">
            <h4><a href="speaker-details.html"><?php echo $translations['speaker_1_name']; ?></a></h4>
            <span><?php echo $translations['speaker_1_title']; ?></span>
          </div>
          <div class="social">
            <a href="<?php echo $translations['speaker_1_linkedin']; ?>"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div><!-- End Team Member -->

    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
      <div class="member">
        <img src="assets/img/speakers/speaker-2.jpg" class="img-fluid" alt="">
        <div class="member-info">
          <div class="member-info-content">
            <h4><a href="speaker-details.html"><?php echo $translations['speaker_2_name']; ?></a></h4>
            <span><?php echo $translations['speaker_2_title']; ?></span>
          </div>
          <div class="social">
            <a href="<?php echo $translations['speaker_2_linkedin']; ?>"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div><!-- End Team Member -->

    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
      <div class="member">
        <img src="assets/img/speakers/speaker-3.jpg" class="img-fluid" alt="">
        <div class="member-info">
          <div class="member-info-content">
            <h4><a href="speaker-details.html"><?php echo $translations['speaker_3_name']; ?></a></h4>
            <span><?php echo $translations['speaker_3_title']; ?></span>
          </div>
          <div class="social">
            <a href="<?php echo $translations['speaker_3_linkedin']; ?>"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div><!-- End Team Member -->

  </div>
</div>

</section><!-- /Speakers Section -->

    <!-- Schedule Section -->
    <section id="schedule" class="schedule section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2><?php echo $translations['schedule_section_title']; ?><br></h2>
    </div><!-- End Section Title -->

    <div class="container">

        <ul class="nav nav-tabs" role="tablist" data-aos="fade-up" data-aos-delay="100">
            <li class="nav-item">
                <a class="nav-link active" href="#day-1" role="tab" data-bs-toggle="tab"><?php echo $translations['day_1']; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#day-2" role="tab" data-bs-toggle="tab"><?php echo $translations['day_2']; ?></a>
            </li>
        </ul>

        <div class="tab-content row justify-content-center" data-aos="fade-up" data-aos-delay="200">

            <h3 class="sub-heading"><?php echo $translations['schedule_section_title']; ?></h3>

            <!-- Schedule Day 1 -->
            <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">

                <div class="row schedule-item">
                    <div class="col-md-2"><time><?php echo $translations['arrival']; ?></time></div>
                    <div class="col-md-10">
                        <h4><?php echo $translations['arrival']; ?></h4>
                        <p><?php echo $translations['arrival_description']; ?></p>
                    </div>
                </div>

                <div class="row schedule-item">
                    <div class="col-md-2"><time>10:00 AM</time></div>
                    <div class="col-md-10">
                        <h4><?php echo $translations['hotel_check_in']; ?></h4>
                        <p><?php echo $translations['hotel_check_in_description']; ?></p>
                    </div>
                </div>

                <div class="row schedule-item">
                    <div class="col-md-2"><time>12:00 PM</time></div>
                    <div class="col-md-10">
                        <h4><?php echo $translations['opening_ceremony']; ?></h4>
                        <p><?php echo $translations['opening_ceremony_description']; ?></p>
                    </div>
                </div>

                <div class="row schedule-item">
                    <div class="col-md-2"><time>01:00 PM</time></div>
                    <div class="col-md-10">
                        <h4><?php echo $translations['lunch']; ?></h4>
                        <p><?php echo $translations['lunch_description']; ?></p>
                    </div>
                </div>

                <div class="row schedule-item">
                    <div class="col-md-2"><time>03:00 PM</time></div>
                    <div class="col-md-10">
                        <h4><?php echo $translations['company_presentations']; ?></h4>
                        <p><?php echo $translations['company_presentations_description']; ?></p>
                    </div>
                </div>

                <div class="row schedule-item">
                    <div class="col-md-2"><time>04:30 PM</time></div>
                    <div class="col-md-10">
                        <h4><?php echo $translations['general_assembly']; ?></h4>
                        <p><?php echo $translations['general_assembly_description']; ?></p>
                    </div>
                </div>

            </div><!-- End Schedule Day 1 -->

            <!-- Schedule Day 2 -->
            <div role="tabpanel" class="col-lg-9 tab-pane fade" id="day-2">

                <div class="row schedule-item">
                    <div class="col-md-2"><time>09:00 AM</time></div>
                    <div class="col-md-10">
                        <h4><?php echo $translations['specialized_workshops']; ?></h4>
                        <p><?php echo $translations['specialized_workshops_description']; ?></p>
                    </div>
                </div>

                <div class="row schedule-item">
                    <div class="col-md-2"><time>02:00 PM</time></div>
                    <div class="col-md-10">
                        <h4><?php echo $translations['information_sessions']; ?></h4>
                        <p><?php echo $translations['information_sessions_description']; ?></p>
                    </div>
                </div>

            </div><!-- End Schedule Day 2 -->

            <!-- Schedule Day 3 -->
            <div role="tabpanel" class="col-lg-9 tab-pane fade" id="day-3">
                <!-- Information to be added -->
            </div><!-- End Schedule Day 3 -->

            <!-- Schedule Day 4 -->
            <div role="tabpanel" class="col-lg-9 tab-pane fade" id="day-4">
                <!-- Information to be added -->
            </div><!-- End Schedule Day 4 -->

        </div>

    </div>

</section>
<!-- /Schedule Section -->

    <!-- Venue Section -->
    <section id="venue" class="venue section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2><?php echo $translations['venue_section_title']; ?><br></h2>
        <p><?php echo $translations['venue_description']; ?></p>
    </div><!-- End Section Title -->

    <div class="container-fluid" data-aos="fade-up">

        <div class="row g-0">
            <div class="col-lg-6 venue-map">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d10.2987!3d36.8904!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13c09bdb21ef0919%3A0x88bb5bb2d6a1aa35!2sGolden%20Tulip%20Gammarth!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus"
                  frameborder="0" style="border:0" allowfullscreen=""></iframe>
            </div>

            <div class="col-lg-6 venue-info">
                <div class="row justify-content-center">
                    <div class="col-11 col-lg-8 position-relative">
                        <h3><?php echo $translations['why_participate']; ?></h3>
                        <p><?php echo $translations['why_participate_description']; ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid venue-gallery-container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-0">

            <div class="col-lg-3 col-md-4">
                <div class="venue-gallery">
                    <a href="assets/img/venue-gallery/venue-gallery-1.jpg" class="glightbox" data-gall="venue-gallery">
                        <img src="assets/img/venue-gallery/venue-gallery-1.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="venue-gallery">
                    <a href="assets/img/venue-gallery/venue-gallery-2.jpg" class="glightbox" data-gall="venue-gallery">
                        <img src="assets/img/venue-gallery/venue-gallery-2.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="venue-gallery">
                    <a href="assets/img/venue-gallery/venue-gallery-3.jpg" class="glightbox" data-gall="venue-gallery">
                        <img src="assets/img/venue-gallery/venue-gallery-3.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="venue-gallery">
                    <a href="assets/img/venue-gallery/venue-gallery-4.jpg" class="glightbox" data-gall="venue-gallery">
                        <img src="assets/img/venue-gallery/venue-gallery-4.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="venue-gallery">
                    <a href="assets/img/venue-gallery/venue-gallery-5.jpg" class="glightbox" data-gall="venue-gallery">
                        <img src="assets/img/venue-gallery/venue-gallery-5.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="venue-gallery">
                    <a href="assets/img/venue-gallery/venue-gallery-6.jpg" class="glightbox" data-gall="venue-gallery">
                        <img src="assets/img/venue-gallery/venue-gallery-6.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="venue-gallery">
                    <a href="assets/img/venue-gallery/venue-gallery-7.jpg" class="glightbox" data-gall="venue-gallery">
                        <img src="assets/img/venue-gallery/venue-gallery-7.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="venue-gallery">
                    <a href="assets/img/venue-gallery/venue-gallery-8.jpg" class="glightbox" data-gall="venue-gallery">
                        <img src="assets/img/venue-gallery/venue-gallery-8.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

        </div>
    </div>

</section>
<!-- /Venue Section -->

    <!-- Hotels Section -->
    <section id="hotels" class="hotels section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Hotels</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card h-100">
              <div class="card-img">
                <img src="assets/img/hotels-1.jpg" alt="" class="img-fluid">
              </div>
              <h3><a href="#" class="stretched-link">Non quibusdam blanditiis</a></h3>
              <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                  class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
              <p>0.4 Mile from the Venue</p>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card h-100">
              <div class="card-img">
                <img src="assets/img/hotels-2.jpg" alt="" class="img-fluid">
              </div>
              <h3><a href="#" class="stretched-link">Aspernatur assumenda</a></h3>
              <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                  class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
              <p>0.5 Mile from the Venue</p>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="card h-100">
              <div class="card-img">
                <img src="assets/img/hotels-3.jpg" alt="" class="img-fluid">
              </div>
              <h3><a href="#" class="stretched-link">Dolores ut ut voluptatibu</a></h3>
              <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                  class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
              <p>0.6 Mile from the Venue</p>
            </div>
          </div><!-- End Card Item -->

        </div>

      </div>

    </section><!-- /Hotels Section -->

    <!-- Gallery Section -->
    <section id="gallery" class="gallery section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Gallery</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "centeredSlides": true,
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 0
                },
                "768": {
                  "slidesPerView": 3,
                  "spaceBetween": 20
                },
                "1200": {
                  "slidesPerView": 5,
                  "spaceBetween": 20
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                href="assets/img/event-gallery/event-gallery-1.jpg"><img
                  src="assets/img/event-gallery/event-gallery-1.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                href="assets/img/event-gallery/event-gallery-2.jpg"><img
                  src="assets/img/event-gallery/event-gallery-2.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                href="assets/img/event-gallery/event-gallery-3.jpg"><img
                  src="assets/img/event-gallery/event-gallery-3.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                href="assets/img/event-gallery/event-gallery-4.jpg"><img
                  src="assets/img/event-gallery/event-gallery-4.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                href="assets/img/event-gallery/event-gallery-5.jpg"><img
                  src="assets/img/event-gallery/event-gallery-5.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                href="assets/img/event-gallery/event-gallery-6.jpg"><img
                  src="assets/img/event-gallery/event-gallery-6.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                href="assets/img/event-gallery/event-gallery-7.jpg"><img
                  src="assets/img/event-gallery/event-gallery-7.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                href="assets/img/event-gallery/event-gallery-8.jpg"><img
                  src="assets/img/event-gallery/event-gallery-8.jpg" class="img-fluid" alt=""></a></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Gallery Section -->

    <!-- Sponsors Section -->
    <section id="sponsors" class="sponsors section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Sponsors</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0 clients-wrap">

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-7.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-8.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

        </div>

      </div>

    </section><!-- /Sponsors Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Frequently Asked Questions</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

            <div class="faq-container">

              <div class="faq-item faq-active">
                <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                <div class="faq-content">
                  <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur
                    gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Feugiat scelerisque varius morbi enim nunc faucibus?</h3>
                <div class="faq-content">
                  <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet
                    id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque
                    elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                <div class="faq-content">
                  <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar
                    elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque
                    eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis
                    sed odio morbi quis</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
                <div class="faq-content">
                  <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet
                    id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque
                    elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Tempus quam pellentesque nec nam aliquam sem et tortor?</h3>
                <div class="faq-content">
                  <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in.
                    Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est.
                    Purus gravida quis blandit turpis cursus in</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
                <div class="faq-content">
                  <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed in suscipit sequi.
                    Distinctio ipsam dolore et.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div><!-- End Faq Column-->

        </div>

      </div>

    </section><!-- /Faq Section -->

    <!-- Buy Tickets Section -->
    <section id="buy-tickets" class="buy-tickets section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Buy Tickets<br></h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4 pricing-item" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <h3>Standard Access</h3>
          </div>
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <h4><sup>$</sup>200</h4>
          </div>
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <ul>
              <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
              <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
              <li class="na"><i class="bi bi-x"></i> <span>Pharetra massa massa ultricies</span></li>
            </ul>
          </div>
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
          </div>
        </div><!-- End Pricing Item -->

        <div class="row gy-4 pricing-item featured mt-4" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <h3>Premium Access<br></h3>
          </div>
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <h4><sup>$</sup>250</h4>
          </div>
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <ul>
              <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
              <li><i class="bi bi-check"></i> <strong>Nec feugiat nisl pretium</strong></li>
              <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
            </ul>
          </div>
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
          </div>
        </div><!-- End Pricing Item -->

        <div class="row gy-4 pricing-item mt-4" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <h3>Pro Access<br></h3>
          </div>
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <h4><sup>$</sup>350</h4>
          </div>
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <ul>
              <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
              <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
              <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
            </ul>
          </div>
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
          </div>
        </div><!-- End Pricing Item -->

      </div>

    </section><!-- /Buy Tickets Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Pour toute demande, veuillez nous contacter. Nous nous engageons à répondre à toutes vos questions dans les
          plus brefs délais.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up"
              data-aos-delay="200">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <p>Avenue de la Promenade les côtes de CARTHAGE, Marsa 2078</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up"
              data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3>Call Us</h3>
              <p>+216 22071309</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up"
              data-aos-delay="400">
              <i class="bi bi-envelope"></i>
              <h3>Email Us</h3>
              <p>samir.aissaoui.bgi@gmail.com</p>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="row gy-4 mt-1">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d10.2987!3d36.8904!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13c09bdb21ef0919%3A0x88bb5bb2d6a1aa35!2sGolden%20Tulip%20Gammarth!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus"
              frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>

          </div><!-- End Google Maps -->

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
              data-aos-delay="400">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6 footer-about">
            <a href="index.html" class="logo d-flex align-items-center">
              <span class="sitename">TheEvent</span>
            </a>
            <div class="footer-contact pt-3">
              <p>Tunise</p>
              <p>New York, NY 535022</p>
              <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
              <p><strong>Email:</strong> <span>info@example.com</span></p>
            </div>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Web Development</a></li>
              <li><a href="#">Product Management</a></li>
              <li><a href="#">Marketing</a></li>
              <li><a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Hic solutasetp</h4>
            <ul>
              <li><a href="#">Molestiae accusamus iure</a></li>
              <li><a href="#">Excepturi dignissimos</a></li>
              <li><a href="#">Suscipit distinctio</a></li>
              <li><a href="#">Dilecta</a></li>
              <li><a href="#">Sit quas consectetur</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Nobis illum</h4>
            <ul>
              <li><a href="#">Ipsam</a></li>
              <li><a href="#">Laudantium dolorum</a></li>
              <li><a href="#">Dinera</a></li>
              <li><a href="#">Trodelas</a></li>
              <li><a href="#">Flexo</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="copyright text-center">
      <div
        class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

        <div class="d-flex flex-column align-items-center align-items-lg-start">
          <div>
            © Copyright <strong><span>MyWebsite</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>


      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Get the user's name from URL parameters
      const urlParams = new URLSearchParams(window.location.search);
      const userName = urlParams.get('user');

      if (userName) {
        const ctaButtons = document.getElementById('cta-buttons');
        ctaButtons.innerHTML = `
                <a class="cta-btn" href="#buy-tickets">Buy Tickets</a>
                <a class="cta-btn ms-2" href="logout.php">Log Out (${userName})</a>
            `;
      }
    });

    if (localStorage.getItem('user_token')) {
            document.querySelector('.cta-buttons').innerHTML = `
                <a class="cta-btn" href="#buy-tickets">Buy Tickets</a>
                <a class="cta-btn ms-2" href="logout.php">Log Out</a>
            `;
        }

        // Example of handling token storage on signup (client-side code needed)
        // localStorage.setItem('user_token', 'your_generated_token_here');

        document.addEventListener('DOMContentLoaded', function() {
    // Check if user token exists in cookies (or local storage)
    if (document.cookie.includes('user_token')) {
        // If token exists, user is considered logged in
        document.querySelector('.cta-buttons').innerHTML = `
            <a class="cta-btn" href="#buy-tickets">Buy Tickets</a>
            <a class="cta-btn ms-2" href="logout.php">Log Out</a>
        `;
    }

    // Logout button event
    document.querySelector('a[href="logout.php"]').addEventListener('click', function() {
        document.cookie = 'user_token=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/'; // Remove token from cookies
    });
});

  </script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>