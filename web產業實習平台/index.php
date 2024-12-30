<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>慧緣崽拒產業實習平台</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/慧緣崽拒.png" rel="icon">
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

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
        <img src="assets/img/慧緣崽拒.png" alt="logo">
        <h1 class="sitename">慧緣崽拒產業實習平台</h1><span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php#hero" class="active">首頁</a></li>
          <li><a href="index.php#services">最新公告</a></li>
          <li><a href="industry.php">產業分類</a></li>
          <?php if (isset($_SESSION['user']) && $_SESSION['user'] != "") { ?>
          <li><a href="user.php">個人頁面</a></li>
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
                  echo "<b style='color: var(--heading-color); font-family: var(--heading-font);'>同學</b>";
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

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="assets/img/cover.png" alt="" data-aos="fade-in">

      <div class="container">
        
        <div class="row">
          <div class="col-lg-10">
            <h2 data-aos="fade-up" data-aos-delay="100">慧緣崽拒產業實習平台</h2>
            <p data-aos="fade-up" data-aos-delay="200">專為沒工作的你尋找實習機會</p>
          </div>
          <div class="row g-2">
            <?php
              if (isset($_SESSION['user']) && $_SESSION['user'] != "") {
            ?>
              <div>
                <a href="index.php?method=logout" data-aos="fade-up" data-aos-delay="300" class="btn btn-login">登出</a>
              </div>
            <?php
            } else {
            ?>
              <div class="col-md-1" data-aos="fade-up" data-aos-delay="300">
              <p><a class="btn-login" href="LogIn.html">登入</a></p>
            </div>
            <div class="col-md-1" data-aos="fade-up" data-aos-delay="300">
              <p><a class="btn-login" href="SignIn.html">註冊</a></p>
            </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>最新公告</h2>
        <p>提供最新的實習工作消息給需要工作機會的你</p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="row gy-4">
                <?php
                  $ID = isset($_SESSION['ID']) ? $_SESSION['ID'] : null;
                  $link = mysqli_connect('localhost', 'root', '', 'IndustrialPlatform');
                  $subscriptions = [];
                  $news_count = 0;
                  if ($ID) {
                      $sub_sql = "SELECT i.i_name FROM industry i JOIN subscribe s ON i.i_id = s.i_id WHERE ID = '$ID'";
                      $sub_rs = mysqli_query($link, $sub_sql);
                      
                      while ($sub_record = mysqli_fetch_assoc($sub_rs)) {
                          $subscriptions[] = $sub_record['i_name']; // 假设每个订阅是类别
                      }
                      
                      if ($subscriptions) {
                        $category_filter = "'" . implode("','", $subscriptions) . "'";
                        $sql_subscribed = "SELECT * FROM news WHERE i_name IN ($category_filter) ORDER BY n_date DESC LIMIT 6";
                        $news_rs = mysqli_query($link, $sql_subscribed);

                        $news_count = mysqli_num_rows($news_rs);
            
                        // 输出订阅的新闻
                        if ($news_count >= 6){
                          while ($record = mysqli_fetch_assoc($news_rs)) {
                              ?>
                              <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                                  <div class="service-item d-flex">
                                      <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
                                      <div>
                                          <h4 class="title">
                                              <a href="#" class="stretched-link">
                                                  <?php echo htmlspecialchars($record['n_title'], ENT_QUOTES, 'UTF-8'); ?>
                                              </a>         
                                          </h4>
                                          <p class="description">
                                              <?php echo htmlspecialchars($record['n_company'], ENT_QUOTES, 'UTF-8'); ?></br>
                                              <a href="#"><?php echo htmlspecialchars($record['n_content'], ENT_QUOTES, 'UTF-8'); ?></a>
                                          </p>
                                          <p style="font-size: 14px; color: color-mix(in srgb, var(--default-color), transparent 50%);">
                                              <?php echo htmlspecialchars($record['n_adress'], ENT_QUOTES, 'UTF-8'); ?>
                                          </p>
                                      </div>
                                  </div>
                                  <?php } ?>
                                    <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                                      <a class="more" href="news.php" >更多實習機會</a>
                                    </div>
                              </div>
                              <?php
                          
                        }

                        else {
                          while ($record = mysqli_fetch_assoc($news_rs)) {
                            ?>
                            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                                <div class="service-item d-flex">
                                    <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
                                    <div>
                                        <h4 class="title">
                                            <a href="#" class="stretched-link">
                                                <?php echo htmlspecialchars($record['n_title'], ENT_QUOTES, 'UTF-8'); ?>
                                            </a>         
                                        </h4>
                                        <p class="description">
                                            <?php echo htmlspecialchars($record['n_company'], ENT_QUOTES, 'UTF-8'); ?></br>
                                            <a href="#"><?php echo htmlspecialchars($record['n_content'], ENT_QUOTES, 'UTF-8'); ?></a>
                                        </p>
                                        <p style="font-size: 14px; color: color-mix(in srgb, var(--default-color), transparent 50%);">
                                            <?php echo htmlspecialchars($record['n_adress'], ENT_QUOTES, 'UTF-8'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php
                          }
                          $remaining = 6 - $news_count;
                          $sql_latest = "SELECT * FROM news ORDER BY n_date DESC LIMIT $remaining";
                          $result_latest = mysqli_query($link, $sql_latest);  
                          while ($row = mysqli_fetch_assoc($result_latest)) { ?>
                                  <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                                    <div class="service-item d-flex">
                                      <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
                                        <div>
                                          <h4 class="title">
                                            <a href="#" class="stretched-link"><?php echo htmlspecialchars($row['n_title'], ENT_QUOTES, 'UTF-8'); ?></a>         
                                          </h4>
                                          <p class="description">
                                            <?php echo htmlspecialchars($row['n_company'], ENT_QUOTES, 'UTF-8'); ?></br>
                                            <a href="#"><?php echo htmlspecialchars($row['n_content'], ENT_QUOTES, 'UTF-8'); ?></a>
                                          </p>
                                          <p style="font-size: 14px; color: color-mix(in srgb, var(--default-color), transparent 50%);">
                                            <?php echo htmlspecialchars($row['n_adress'], ENT_QUOTES, 'UTF-8'); ?>
                                          </p>
                                        </div>
                                      </div>
                                    </div>
                                    <?php } ?>
                                    <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                                      <a class="more" href="news.php" >更多實習機會</a>
                                    </div>
                                  </div>
                              <?php
                        }
                      } 
                      else {
                        $sql = "SELECT * FROM news ORDER BY n_date DESC LIMIT 6";
                        $rs = mysqli_query($link, $sql);
                        while ($record = mysqli_fetch_assoc($rs)) { ?>
                          <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item d-flex">
                              <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
                                <div>
                                  <h4 class="title">
                                    <a href="#" class="stretched-link">
                                      <?php echo htmlspecialchars($record['n_title'], ENT_QUOTES, 'UTF-8'); ?>
                                    </a>         
                                  </h4>
                                  <p class="description">
                                    <?php echo htmlspecialchars($record['n_company'], ENT_QUOTES, 'UTF-8'); ?></br>
                                    <a href="#"><?php echo htmlspecialchars($record['n_content'], ENT_QUOTES, 'UTF-8'); ?></a>
                                  </p>
                                  <p style="font-size: 14px; color: color-mix(in srgb, var(--default-color), transparent 50%);">
                                    <?php echo htmlspecialchars($record['n_adress'], ENT_QUOTES, 'UTF-8'); ?>
                                  </p>
                                </div>
                              </div>
                            </div>
                            <?php } ?>
                            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                              <a class="more" href="news.php" >更多實習機會</a>
                            </div>
                          </div>
                <?php }} ?>

      </div>

    </section><!-- /Services Section -->


    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>聯絡我們</h2>
        <p>有任何問題歡迎詢問我們，我們會以最快的時間給您答覆</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>地址</h3>
                  <p>寶中路119之1號10樓</p>
                  <p>新北市, 新店區</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>電話</h3>
                  <p>+886 0912 345 678</p>
                  <p>+886 0900 000 000</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>電子郵件</h3>
                  <p>info@example.com</p>
                  <p>contact@example.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="500">
                  <i class="bi bi-clock"></i>
                  <h3>服務時間</h3>
                  <p>星期一 - 星期五</p>
                  <p>9:00AM - 05:00PM</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="你的名字" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Email" required="">
                </div>

                <div class="col-12">
                  <input type="text" class="form-control" name="subject" placeholder="標題" required="">
                </div>

                <div class="col-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="內容" required=""></textarea>
                </div>

                <div class="col-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">傳送訊息</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

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