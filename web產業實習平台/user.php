<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>個人頁面-慧緣崽拒產業實習平台-student</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Append
  * Template URL: https://bootstrapmade.com/append-bootstrap-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="portfolio-details-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
        <img src="assets/img/慧緣崽拒.png" alt="logo">
        <h1 class="sitename">慧緣崽拒產業實習平台</h1><span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php#hero">首頁</a></li>
          <li><a href="index.php#services">最新公告</a></li>
          <li><a href="user-產業分類.html">產業分類</a></li>
          <?php if (isset($_SESSION['user']) && $_SESSION['user'] != "") { ?>
          <li><a href="user.php" class="active">個人頁面</a></li>
          <?php } ?>
          <li><a href="index.php#contact">聯絡我們</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      
      <?php
        if (isset($_SESSION['user']) && $_SESSION['user'] != "") {
          if (isset($_GET['method']) && $_GET['method'] === 'logout') {
            session_unset();
            session_destroy();
            header('Location: index.php');
            exit();
          }
      ?>
        <div>
          <b style="color: var(--heading-color); font-family: var(--heading-font);">您好，</b>
          <b style="color: var(--accent-color);"><?php echo htmlspecialchars($_SESSION['user'], ENT_QUOTES, 'UTF-8'); ?></b>
          <?php
            if (isset($_SESSION['user']) && $_SESSION['user'] != "") {
              $link = mysqli_connect('localhost', 'root', '', 'IndustrialPlatform');
              $user_name = $_SESSION['user'];
              $sql = "SELECT * FROM login WHERE name = '$user_name'";
              $result = mysqli_query($link, $sql);
              if ($record = mysqli_fetch_assoc($result)) {
                if ($record['permissions'] === '學生'){
                  echo "<b style='color: var(--heading-color); font-family: var(--heading-font);'>學生</b>";
                }
                elseif ($record['permissions'] === '系所秘書'){
                  echo "<b style='color: var(--heading-color); font-family: var(--heading-font);'>秘書</b>";
                }
                else {
                  echo "<b style='color: var(--heading-color); font-family: var(--heading-font);'>管理者</b>";
                }
              }
            }
          ?>
          <a href="index.php?method=logout" class="btn btn-login">登出</a>
        </div>
      <?php
      } else {
      ?>
        <a href="LogIn.html" class="btn btn-login">訪客</a>
      <?php
      }
      ?>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" style="padding-top: 100px;">
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">首頁</a></li>
            <li class="current">個人頁面</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">

      <div class="container" data-aos="fade-up">

        <div class="portfolio-description">

          <div class="testimonial-item">
            <div>
              <img src="assets/img/user.png" class="testimonial-img" alt="me">
              <?php
                    if (isset($_SESSION['user']) && $_SESSION['user'] != "") {
                        $link = mysqli_connect('localhost', 'root', '', 'IndustrialPlatform');
                        $user_name = $_SESSION['user'];
                        $sql = "SELECT * FROM login WHERE name = '$user_name'";
                        $result = mysqli_query($link, $sql);
                        if ($record = mysqli_fetch_assoc($result)) {
                          echo "<h3>" . htmlspecialchars($record['name'], ENT_QUOTES, 'UTF-8') . "</h3>";
                          echo "<h4>" . htmlspecialchars($record['permissions'], ENT_QUOTES, 'UTF-8') . "</h4>";
                        }
                    }
                    ?>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-2" data-aos="fade-up">
              <div class="portfolio-info">
                <h3>個人檔案</h3>
                <ul>
                    <?php
                    if (isset($_SESSION['user']) && $_SESSION['user'] != "") {
                        $link = mysqli_connect('localhost', 'root', '', 'IndustrialPlatform');
                        $user_name = $_SESSION['user'];
                        $sql = "SELECT * FROM login WHERE name = '$user_name'";
                        $result = mysqli_query($link, $sql);

                        if ($record = mysqli_fetch_assoc($result)) {
                            echo "<li><strong>姓名</strong> " . htmlspecialchars($record['name'], ENT_QUOTES, 'UTF-8') . "</li>";
                            echo "<li><strong>生日</strong> " . htmlspecialchars($record['birthday'], ENT_QUOTES, 'UTF-8') . "</li>";
                            echo "<li><strong>畢業學校</strong> " . htmlspecialchars($record['school'], ENT_QUOTES, 'UTF-8') . "</li>";
                            echo "<li><strong>住家地址</strong> " . htmlspecialchars($record['address'], ENT_QUOTES, 'UTF-8') . "</li>";
                            echo "<li><strong>Email</strong> <a href='mailto:" . htmlspecialchars($record['email'], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($record['email'], ENT_QUOTES, 'UTF-8') . "</a></li>";
                        } else {
                            echo "<li>未找到個人檔案資訊。</li>";
                        }
                    } else {
                        echo "<li>請先登入以查看個人檔案。</li>";
                    }
                    ?>
                </ul>
              </div>
              <?php
                  $link = mysqli_connect('localhost', 'root', '', 'IndustrialPlatform');
                  $sql = "select * from login";
                  $result = mysqli_query($link, $sql);
                  if($row = mysqli_fetch_assoc($result))
                  {
                    if (isset($_SESSION['permissions']) && in_array($_SESSION['permissions'], ['學生'])) {
                      echo "<div class='portfolio-info'><h3>實習報告書</h3>",
                        "<a class='btn-visit align-self-start' data-bs-toggle='modal' data-bs-target='#upload'>上傳檔案</a></div>";
                    }
                  }
              ?>
                <!-- Modal -->
                <div class="modal fade" id="upload" tabindex="-1" aria-labelledby="uploadLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="uploadLabel">實習報告書</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="上傳實習報告書.php" method="post">
                        <div class="modal-body">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="sr_id" placeholder="" required>
                            <label for="floatingInput">編號</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="sr_name" placeholder="" require>
                            <label for="floatingInput">姓名</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="sr_title" placeholder="" required>
                            <label for="floatingInput">標題</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="sr_company" placeholder="" required>
                            <label for="floatingInput">公司</label>
                          </div> 
                          <div class="form-floating mb-3">
                            <textarea class="form-control" id="floatingTextarea2" style="height: 200px"  name="sr_content" placeholder=""></textarea>
                            <label for="floatingTextarea2">內容</label>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-floating mb-3">
                                <input type="date" class="form-control" name="start_date" placeholder="" required>
                                <label for="floatingInput">開始時間</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-floating mb-3">
                                <input type="date" class="form-control" name="end_date" placeholder="" required>
                                <label for="floatingInput">結束時間</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-login">上傳</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
            <?php
              $link = mysqli_connect('localhost', 'root', '', 'IndustrialPlatform');
              $user = mysqli_real_escape_string($link, $_SESSION['user']);
              $sql = "SELECT * FROM studentreport sr JOIN login lg ON lg.name = sr.name WHERE sr.name = '$user'";
              $result = mysqli_query($link, $sql);

              if (isset($_SESSION['permissions']) && in_array($_SESSION['permissions'], ['學生'])) {
                  echo "<div class='col-lg-10' data-aos='fade-up'>
                          <div class='portfolio-info'>
                            <h3>已上傳的實習報告書</h3>
                          </div>
                          <div class='testimonials row align-items-center' data-aos='fade-up'>
                            <div class='swiper init-swiper'>
                              <script type='application/json' class='swiper-config'>
                                {
                                  \"loop\": true,
                                  \"speed\": 600,
                                  \"autoplay\": {
                                    \"delay\": 5000
                                  },
                                  \"slidesPerView\": \"auto\",
                                  \"pagination\": {
                                    \"el\": \".swiper-pagination\",
                                    \"type\": \"bullets\",
                                    \"clickable\": true
                                  }
                                }
                              </script>
                              <div class='swiper-wrapper'>";
                  while ($row = mysqli_fetch_assoc($result)) {
                          echo "<div class='swiper-slide'>
                                  <div class='testimonial-item'>
                                    <div class='d-flex'>
                                      <div>
                                        <h3>" . htmlspecialchars($row['sr_title']) . "</h3>
                                        <h4>" . htmlspecialchars($row['sr_company']) . "</h4>
                                      </div>
                                    </div>
                                    <p style='max-height: 124px; overflow: hidden; text-overflow: ellipsis;'>" . htmlspecialchars($row['sr_content']) . "</p>
                                    <a class='btn btn-login' href=編輯實習報告書.php?sr_id=", $row['sr_id'],">查看更多與編輯</a>
                                  </div>
                                </div>";
                  }
                  echo "</div><div class='swiper-pagination'></div></div></div></div>";
              }
              elseif (isset($_SESSION['permissions']) && in_array($_SESSION['permissions'], ['系所秘書'])) {
                echo "<div class='col-lg-10' data-aos='fade-up'>
                        <div class='portfolio-info'>
                          <h3>學生實習資訊</h3>
                        </div>
                          <div class='container' data-aos='fade-up'>
                            <form class='row g-3 needs-validation' action='search.php' method=get novalidate>
                              <div class='col-md-4'>
                                <label for='validationCustom01' class='form-label'>學生姓名</label>
                                <input type='text' class='form-control' id='validationCustom01' name='name' required>
                              </div>
                              <div class='col-md-8'>
                                <label for='validationCustom02' class='form-label'>實習企業名稱</label>
                                <input type='text' class='form-control' id='validationCustom02' name='sr_company'>
                              </div>
                              <div class='col-md-6'>
                                <label for='validationCustom02' class='form-label'>起使日期</label>
                                <input type='date' class='form-control' id='validationCustom02' name='start_date'>
                              </div>
                              <div class='col-md-6'>
                                <label for='validationCustom02' class='form-label'>結束日期</label>
                                <input type='date' class='form-control' id='validationCustom02' name='end_date'>
                              </div>
                              <div class='col-12'>
                                <button type='submit' class='btn btn-login'>查詢</button>
                              </div>
                            </form>";
              }
              else {

              }
            ?>

          </div>
        </div>

      </div>

    </section><!-- /Portfolio Details Section -->

  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Append</span>
          </a>
          <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>A108 Adam Street</p>
          <p>New York, NY 535022</p>
          <p>United States</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
          <p><strong>Email:</strong> <span>info@example.com</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="sitename">Append</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>