<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>產業分類-慧緣崽拒產業實習平台</title>
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

<body class="blog-details-page">

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
          <li><a href="user-產業分類.php" class="active">產業分類</a></li>
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
            <li class="current">產業分類</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->
    
    <div class="container" data-aos="fade-up">
      
      <div class="row">

        <div class="col-lg-8">
          <!-- Blog Details Section -->
          <section id="blog-details" class="blog-details section">
              <?php
                $link = mysqli_connect('localhost', 'root', '', 'IndustrialPlatform');
                $search_query = isset($_GET['search_query']) ? mysqli_real_escape_string($link, $_GET['search_query']) : '';
    
                $sql = "SELECT * FROM industry";
                if (!empty($search_query)) {
                    $sql .= " WHERE i_name LIKE '%$search_query%' OR it_name LIKE '%$search_query%' ";
                }
                $sql .= " ORDER BY i_id ASC";
                $result = mysqli_query($link, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                  $i_id = $row['i_id'];
                  $i_name = $row['i_name'];

          
                  echo "<div class='container'>
                        <article class='article'>
                            <h2 class='title'>
                                <div class='row'>
                                    <div class='col-sm-9'>
                                        <a href='記得改.html'>" . htmlspecialchars($row['i_name']) . "</a>
                                    </div>";
                  
                  if (isset($_SESSION['ID'])) {
                    $ID = $_SESSION['ID'];
                    $check_subscription_query = "SELECT * FROM subscribe WHERE ID = '$ID' AND i_id = '$i_id'";
                    $subscription_result = mysqli_query($link, $check_subscription_query);
                    if (mysqli_num_rows($subscription_result) > 0) {
                      // 已訂閱
                      echo "<div class='col-sm-3'>
                              <form action='subscribe.php' method='POST'>
                                <input type='hidden' name='ID' value='$ID'>
                                <input type='hidden' name='i_id' value='$i_id'>
                                <button class='btn btn-login' style='vertical-align: top; margin-left: 20px;'>
                                    已訂閱
                                </button>
                              </form>
                            </div>";
                    }
                    else{
                      echo "<div class='col-sm-3'>
                              <form action='subscribe.php' method='POST'>
                                <input type='hidden' name='ID' value='$ID'>
                                <input type='hidden' name='i_id' value='$i_id'>
                                <button class='btn btn-subscribe' style='vertical-align: top; margin-left: 20px;'>
                                    訂閱
                                </button>
                              </form>
                            </div>";
                    }
                      
                  }
                  echo "  </div></h2>
                          <div class='meta-bottom'><i class='bi bi-tags'></i>
                          <ul class='tags'>";

                  $query_tags = "SELECT it_name FROM industrytag WHERE i_name = '$i_name'";
                  $result_tags = mysqli_query($link, $query_tags);
                  while ($tag = mysqli_fetch_assoc($result_tags)) {
                      echo "<li><a>" . htmlspecialchars($tag['it_name']) . "</a></li>";
                  }

                  echo "</ul></div></article></div>";

                }
              ?>
          </section><!-- /Blog Details Section -->
        </div>
        
        <div class="col-lg-4 sidebar">

          <div class="widgets-container">

            <!-- Search Widget -->
            <div class="search-widget widget-item">

              <h3 class="widget-title">搜尋</h3>
              <form action="">
                <input type="text">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
              </form>

            </div><!--/Search Widget -->

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">

              <h3 class="widget-title">最新公告</h3>

              <div class="post-item">
                <div>
                  <h4><a href="blog-details.html">經紀助理(實習生)</a></h4>
                  <time>海納百川娛樂有限公司</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <div>
                  <h4><a href="blog-details.html">【下半年實習】資料庫_實習生</a></h4>
                  <time>台灣經濟新報文化事業股份有限公司</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <div>
                  <h4><a href="blog-details.html">平面與影像設計實習生</a></h4>
                  <time>酷鳩科技股份有限公司</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <div>
                  <h4><a href="blog-details.html">企業實習</a></h4>
                  <time>冉色斯動畫股份有限公司</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <div>
                  <h4><a href="blog-details.html">財務會計實習 Accounting Intern</a></h4>
                  <time>諦諾智金股份有限公司</time>
                </div>
              </div><!-- End recent post item-->

            </div><!--/Recent Posts Widget -->

          </div>

        </div>

      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.rm');
    
        buttons.forEach((button) => {
          button.addEventListener('click', function () {
            const category = this.closest('.row').querySelector('a').textContent.trim();
    
            fetch('subscribe.php', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
              },
              body: JSON.stringify({ category }),
            })
              .then((response) => response.json())
              .then((data) => {
                if (data.success) {
                  this.textContent = '已訂閱';
                  this.classList.add('subscribed');
                } else {
                  alert('訂閱失敗，請稍後再試');
                }
              });
          });
        });
      });
    </script>
    

    <!-- Blog Pagination Section -->
    <section id="blog-pagination" class="blog-pagination section">

      <div class="container">
        <div class="d-flex justify-content-center">
          <ul>
            <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
            <li><a href="#" class="active">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>

    </section><!-- /Blog Pagination Section -->
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