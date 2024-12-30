<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>最新公告-慧緣崽拒產業實習平台-manager</title>
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
          <li><a href="index.php#services" class="active">最新公告</a></li>
          <li><a href="user-產業分類.html">產業分類</a></li>
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
            <li class="current">最新公告</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <div class="container" data-aos="fade-up">
      
      <div class="row">
              

        <div class="col-lg-8">
          <section id="blog-details" class="blog-details section">
          <?php
            $link = mysqli_connect('localhost', 'root', '', 'IndustrialPlatform');

            // 接收搜尋條件
            $search_query = isset($_GET['search_query']) ? mysqli_real_escape_string($link, $_GET['search_query']) : '';

            // 基本查詢
            $sql = "SELECT * FROM news";

            // 如果有搜尋條件，修改查詢語句
            if (!empty($search_query)) {
                $sql .= " WHERE n_title LIKE '%$search_query%' OR n_content LIKE '%$search_query%' OR n_company LIKE '%$search_query%' OR i_name LIKE '%$search_query%'";
            }

            // 按照 n_date 排序，降冪 (最新的在最前)
            $sql .= " ORDER BY n_date DESC";

            // 執行查詢
            $result = mysqli_query($link, $sql);

            // 輸出結果
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='container'><article class='article'>
                <h2 class='title'><div class='row'><div class='col-sm-8'><a href=記得改.html>", $row['n_title'], "</a></div>";
                
                if (isset($_SESSION['permissions']) && in_array($_SESSION['permissions'], ['管理者'])) {
                    echo "<div class='col-sm-2'><a class='btn btn-deleat' href=manager-編輯公告.php?n_id=", $row['n_id'], ">編輯</a></div>",
                        "<div class='col-sm-2'><a class='btn btn-login' href=manager-編輯刪除.php?method=delete&n_id=", $row['n_id'], ">刪除</a></div>";
                }

                echo "</div></h2>
                <div class='meta-top'><ul><li class='d-flex align-items-center'><i class='bi bi-person'></i><a>", $row['n_company'], "</a></li>
                <li class='d-flex align-items-center'><i class='bi bi-clock'></i><a>", $row['n_date'], "</a></li>
                <li class='d-flex align-items-center'><i class='bi bi-geo-alt'></i><a>", $row['n_adress'], "</a></li></ul></div>
                <div class='content'>", $row['n_content'], "</div>
                <div class='meta-bottom'><i class='bi bi-folder'></i><ul class='cats'><li><a href=記得改.php>", $row['i_name'], "</a></li></ul>
                <i class='bi bi-tags'></i><ul class='tags'><li><a href=記得改.html>", $row['it_name'], "</a></li></ul></div></article></div>";
            }
          ?>

          </section>
        </div> 

        <div class="col-lg-4 sidebar">

          <div class="widgets-container">

            <!-- Add Widget -->
            <?php if (isset($_SESSION['permissions']) && in_array($_SESSION['permissions'], ['管理者'])) { ?>
            <div class="search-widget widget-item">
              <h3 class="widget-title">新增</h3>
              <a class="btn btn-deleat" href="manager-insert.php">新增公告</a>
            </div>
            <?php } ?><!--/Add Widget -->

            <!-- Search Widget -->
            <div class="search-widget widget-item">

              <h3 class="widget-title">搜尋</h3>
              <form action="" method="GET">
                <input type="text" name="search_query" placeholder="">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
              </form>


            </div><!--/Search Widget -->
            
            <!-- Categories Widget -->
            <div class="categories-widget widget-item">

              <h3 class="widget-title">其他分類</h3>
              <ul class="mt-3">
                <li><a href="#">批發／零售／傳直銷業<span>(3)</span></a></li>
                <li><a href="#">文教相關業<span>(3)</span></a></li>
                <li><a href="#">大眾傳播相關業<span>(3)</span></a></li>
                <li><a href="#">旅遊／休閒／運動業<span>(1)</span></a></li>
                <li><a href="#">一般服務業<span>(6)</span></a></li>
                <li><a href="#">電子資訊／軟體／半導體相關業<span>(6)</span></a></li>
                <li><a href="#">一般製造業<span>(17)</span></a></li>
                <li><a href="#">農林漁牧水電資源業<span>(4)</span></a></li>
                <li><a href="#">運輸物流及倉儲<span>(3)</span></a></li>
                <li><a href="#">政治宗教及社福相關業<span>(3)</span></a></li>
                <li><a href="#">金融投顧及保險業<span>(3)</span></a></li>
                <li><a href="#">法律／會計／顧問／研發／設計業<span>(3)</span></a></li>
                <li><a href="#">建築營造及不動產相關業<span>(4)</span></a></li>
                <li><a href="#">醫療保健及環境衛生業<span>(2)</span></a></li>
                <li><a href="#">礦業及土石採取業<span>(3)</span></a></li>
                <li><a href="#">住宿／餐飲服務業<span>(2)</span></a></li>
              </ul>

            </div><!--/Categories Widget -->

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">

              <h3 class="widget-title">最新公告</h3>

              <div class="post-item">
                <div>
                  <h4><a href="#">經紀助理(實習生)</a></h4>
                  <time>海納百川娛樂有限公司</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <div>
                  <h4><a href="#">【下半年實習】資料庫_實習生</a></h4>
                  <time>台灣經濟新報文化事業股份有限公司</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <div>
                  <h4><a href="#">平面與影像設計實習生</a></h4>
                  <time>酷鳩科技股份有限公司</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <div>
                  <h4><a href="#">企業實習</a></h4>
                  <time>冉色斯動畫股份有限公司</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <div>
                  <h4><a href="#">財務會計實習 Accounting Intern</a></h4>
                  <time>諦諾智金股份有限公司</time>
                </div>
              </div><!-- End recent post item-->

            </div><!--/Recent Posts Widget -->

            <!-- Tags Widget -->
            <div class="tags-widget widget-item">

              <h3 class="widget-title">其他標籤</h3>
              <ul>
                <li><a href="#">電影業</a></li>
                <li><a href="#">廣播電視業</a></li>
                <li><a href="#">廣告行銷／傳播經紀業</a></li>
              </ul>

            </div><!--/Tags Widget -->

          </div>

        </div>

      </div>
    </div>

    

    <!-- Blog Pagination Section -->
    <section id="blog-pagination" class="blog-pagination section" style="margin-top: 30px;">

      <div class="container">
        <div class="d-flex justify-content-center">
          <ul>
            <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
            <li><a href="#">1</a></li>
            <li><a href="#" class="active">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li>...</li>
            <li><a href="#">10</a></li>
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