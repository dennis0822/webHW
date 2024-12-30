<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>新增公告-慧緣崽拒產業實習平台-manager</title>
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

<body class="services-details-page">

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
              $name = $_SESSION['user'];
              $sql = "SELECT * FROM login WHERE name = '$name'";
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

    <!-- Page Title -->
    <div class="page-title" style="padding-top: 100px;">
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">首頁</a></li>
            <li><a href="news.php">最新公告</a></li>
            <li class="current">編輯公告</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="starter-section" class="starter-section section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>編輯公告</h2>
        <p>有任何需要編輯、修改的內容都可以在這裡完成</p>
      </div><!-- End Section Title -->
      
      <?php
        $n_id = $_GET['n_id'];
        $link = mysqli_connect('localhost', 'root', '', 'IndustrialPlatform');
        $sql = "select distinct * from news where n_id='$n_id'";
        $result = mysqli_query($link, $sql);
        if($row = mysqli_fetch_assoc($result))
        {
          $n_title = $row['n_title'];
          $n_company = $row['n_company'];
          $n_date = $row['n_date'];
          $n_adress = $row['n_adress'];
          $n_content = $row['n_content'];
          $i_name = $row['i_name'];
          $n_category2 = $row['n_category2'];
        }
      ?>
      <div class="container" data-aos="fade-up">
        <form action="manager-編輯刪除.php" method="post">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="n_id" placeholder="" value="<?php echo $n_id; ?>" readonly>
            <label for="floatingInput">公告編號</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="n_title" placeholder="" value="<?php echo $n_title; ?>" required>
            <label for="floatingInput">公告標題</label>
          </div>
          <div class="row g-3">
            <div class="col-md-5">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="n_company" placeholder="" value="<?php echo $n_company; ?>" required>
                <label for="floatingInput">公司</label>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="n_adress" placeholder="" value="<?php echo $n_adress; ?>" required>
                <label for="floatingInput">地址</label>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-floating mb-3">
                <input type="date" class="form-control" name="n_date" placeholder="" value="<?php echo $n_date; ?>" required>
                <label for="floatingInput">公告時間</label>
              </div>
            </div>
          </div>
          <div class="form-floating mb-3">
            <textarea class="form-control" id="floatingTextarea2" style="height: 200px"  name="n_content" placeholder="" required><?php echo htmlspecialchars($n_content); ?></textarea>
            <label for="floatingTextarea2">內容</label>
          </div>
          <div class="row g-2">
            <div class="col-md">
              <div class="mb-3">
                <select class="form-select" id="firstSelect" onchange="updateSecondSelect()" name="i_name" aria-label="Default select example" required>
                  <option value="_">類別標籤</option>
                  <option value="批發／零售／傳直銷業" <?php echo $i_name == "批發／零售／傳直銷業" ? "selected" : ""; ?>>批發／零售／傳直銷業</option>
                  <option value="文教相關業" <?php echo $i_name == "文教相關業" ? "selected" : ""; ?>>文教相關業</option>
                  <option value="大眾傳播相關業" <?php echo $i_name == "大眾傳播相關業" ? "selected" : ""; ?>>大眾傳播相關業</option>
                  <option value="旅遊／休閒／運動業" <?php echo $i_name == "旅遊／休閒／運動業" ? "selected" : ""; ?>>旅遊／休閒／運動業</option>
                  <option value="一般服務業" <?php echo $i_name == "一般服務業" ? "selected" : ""; ?>>一般服務業</option>
                  <option value="電子資訊／軟體／半導體相關業" <?php echo $i_name == "電子資訊／軟體／半導體相關業" ? "selected" : ""; ?>>電子資訊／軟體／半導體相關業</option>
                  <option value="一般製造業" <?php echo $i_name == "一般製造業" ? "selected" : ""; ?>>一般製造業</option>
                  <option value="農林漁牧水電資源業" <?php echo $i_name == "農林漁牧水電資源業" ? "selected" : ""; ?>>農林漁牧水電資源業</option>
                  <option value="運輸物流及倉儲" <?php echo $i_name == "運輸物流及倉儲" ? "selected" : ""; ?>>運輸物流及倉儲</option>
                  <option value="政治宗教及社福相關業" <?php echo $i_name == "政治宗教及社福相關業" ? "selected" : ""; ?>>政治宗教及社福相關業</option>
                  <option value="金融投顧及保險業" <?php echo $i_name == "金融投顧及保險業" ? "selected" : ""; ?>>金融投顧及保險業</option>
                  <option value="法律／會計／顧問／研發／設計業" <?php echo $i_name == "法律／會計／顧問／研發／設計業" ? "selected" : ""; ?>>法律／會計／顧問／研發／設計業</option>
                  <option value="建築營造及不動產相關業" <?php echo $i_name == "建築營造及不動產相關業" ? "selected" : ""; ?>>建築營造及不動產相關業</option>
                  <option value="醫療保健及環境衛生業" <?php echo $i_name == "醫療保健及環境衛生業" ? "selected" : ""; ?>>醫療保健及環境衛生業</option>
                  <option value="礦業及土石採取業" <?php echo $i_name == "礦業及土石採取業" ? "selected" : ""; ?>>礦業及土石採取業</option>
                  <option value="住宿／餐飲服務業" <?php echo $i_name == "住宿／餐飲服務業" ? "selected" : ""; ?>>住宿／餐飲服務業</option>
                </select>
              </div>
            </div>
            <div class="col-md">
              <div class="mb-3">
                <select class="form-select" id="secondSelect" name="it_name" aria-label="Default select example" required>
                  <option value="_" selected>請先選擇第一個選項</option>
                </select>
                <script>
                  // 預定值（來自 PHP 的 n_category1 和 n_category2）
                  const preSelectedFirst = "<?php echo $i_name; ?>";
                  const preSelectedSecond = "<?php echo $it_name; ?>";
                  // 定義資料結構
                  const optionsData = {
                    '批發／零售／傳直銷業': [
                      { label: '批發業', value: '批發業' },
                      { label: '零售業', value: '零售業' },
                      { label: '傳直銷相關業', value: '傳直銷業' },
                    ],
                      '文教相關業': [
                      { label: '教育服務業', value: '教育服務業' },
                      { label: '出版業', value: '出版業' },
                      { label: '藝文相關業', value: '藝文相關業' },
                    ],
                    '大眾傳播相關業': [
                      { label: '電影業', value: '電影業' },
                      { label: '廣播電視業', value: '廣播電視業' },
                      { label: '廣告行銷／傳播經紀業', value: '廣告行銷／傳播經紀業' },
                    ],
                    '旅遊／休閒／運動業': [
                      { label: '運動及旅遊休閒服務業', value: '運動及旅遊休閒服務業' },
                    ],
                    '一般服務業': [
                      { label: '人力仲介代徵／派遣', value: '人力仲介代徵／派遣' },
                      { label: '租賃業', value: '租賃業' },                
                      { label: '汽機車維修或服務相關業', value: '汽機車維修或服務相關業' },
                      { label: '婚紗攝影及美髮美容業', value: '婚紗攝影及美髮美容業' },
                      { label: '徵信及保全樓管相關業', value: '徵信及保全樓管相關業' },
                      { label: '其他服務相關業', value: '其他服務相關業' },
                    ],
                    '電子資訊／軟體／半導體相關業': [
                      { label: '軟體及網路相關業', value: '軟體及網路相關業' },
                      { label: '電信及通訊相關業', value: '電信及通訊相關業' },
                      { label: '電腦及消費性電子製造業', value: '電腦及消費性電子製造業' },
                      { label: '光電及光學相關業', value: '光電及光學相關業' },
                      { label: '電子零組件相關業', value: '電子零組件相關業' },
                      { label: '半導體業', value: '半導體業' },
                    ],
                    '一般製造業': [
                      { label: '食品菸草及飲料製造業', value: '食品菸草及飲料製造業' },
                      { label: '紡織業', value: '紡織業' },
                      { label: '鞋類／紡織製品製造業', value: '鞋類／紡織製品製造業' },
                      { label: '家具及裝設品製造業', value: '家具及裝設品製造業' },
                      { label: '紙製品製造業', value: '紙製品製造業' },
                      { label: '印刷相關業', value: '印刷相關業' },
                      { label: '化學相關製造業', value: '化學相關製造業' },
                      { label: '石油及煤製品製造業', value: '石油及煤製品製造業' },
                      { label: '橡膠及塑膠製品製造業', value: '橡膠及塑膠製品製造業' },
                      { label: '非金屬礦物製品製造業', value: '非金屬礦物製品製造業' },
                      { label: '金屬相關製造業', value: '金屬相關製造業' },
                      { label: '機械設備製造修配業', value: '機械設備製造修配業' },
                      { label: '電力機械設備製造業', value: '電力機械設備製造業' },
                      { label: '運輸工具製造業', value: '運輸工具製造業' },
                      { label: '精密儀器及醫療器材相關業', value: '精密儀器及醫療器材相關業' },
                      { label: '育樂用品製造業', value: '育樂用品製造業' },
                      { label: '其他相關製造業', value: '其他相關製造業' },
                    ],
                    '農林漁牧水電資源業': [
                      { label: '農產畜牧相關業', value: '農產畜牧相關業' },
                      { label: '林場伐木相關業', value: '林場伐木相關業' },
                      { label: '漁撈水產養殖業', value: '漁撈水產養殖業' },
                      { label: '水電能源供應業', value: '水電能源供應業' },
                    ],
                    '運輸物流及倉儲': [
                      { label: '運輸相關業', value: '運輸相關業' },
                      { label: '倉儲或運輸輔助業', value: '倉儲或運輸輔助業' },
                      { label: '郵政及快遞業', value: '郵政及快遞業' },
                    ],
                    '政治宗教及社福相關業': [
                      { label: '政治機構相關業', value: '政治機構相關業' },
                      { label: '宗教／職業團體組織', value: '宗教／職業團體組織' },
                      { label: '社會福利服務業', value: '社會福利服務業' },
                    ],
                    '金融投顧及保險業': [
                      { label: '金融機構及其相關業', value: '金融機構及其相關業' },
                      { label: '投資理財相關業', value: '投資理財相關業' },
                      { label: '保險業', value: '保險業' },
                    ],
                    '法律／會計／顧問／研發／設計業': [
                      { label: '法律服務業', value: '法律服務業' },
                      { label: '會計服務業', value: '會計服務業' },
                      { label: '顧問／研發／設計業', value: '顧問／研發／設計業' },
                    ],
                    '建築營造及不動產相關業': [
                      { label: '建築或土木工程業', value: '建築或土木工程業' },
                      { label: '建物裝修或空調工程業', value: '建物裝修或空調工程業' },
                      { label: '建築規劃及設計業', value: '建築規劃及設計業' },
                      { label: '不動產業', value: '不動產業' },
                    ],
                    '醫療保健及環境衛生業': [
                      { label: '醫療服務業', value: '醫療服務業' },
                      { label: '環境衛生相關業', value: '環境衛生相關業' },
                    ],
                    '礦業及土石採取業': [
                      { label: '能源開採業', value: '能源開採業' },
                      { label: '其他礦業', value: '其他礦業' },
                      { label: '土石採取業', value: '土石採取業' },
                    ],
                    '住宿／餐飲服務業': [
                      { label: '住宿服務業', value: '住宿服務業' },
                      { label: '餐飲業', value: '餐飲業' },
                    ]
                  };
          
                  // 更新第二個 Select 的內容
                  function updateSecondSelect() {
                    const firstSelectValue = document.getElementById('firstSelect').value;
                    const secondSelect = document.getElementById('secondSelect');

                    // 清空第二個 select 的選項
                    secondSelect.innerHTML = '';

                    if (optionsData[firstSelectValue]) {
                      optionsData[firstSelectValue].forEach(optionValue => {
                        const option = document.createElement('option');
                        option.value = optionValue.value;
                        option.textContent = optionValue.label;

                        // 如果是預選值，設置為選中
                        if (optionValue.value === preSelectedSecond) {
                          option.selected = true;
                        }

                        secondSelect.appendChild(option);
                      });
                    } else {
                      // 顯示預設訊息
                      const defaultOption = document.createElement('option');
                      defaultOption.value = '';
                      defaultOption.textContent = '請先選擇第一個選項';
                      secondSelect.appendChild(defaultOption);
                    }
                  }

                  // 初始化第二個 Select
                  function initializeSecondSelect() {
                    // 設置第一個 select 的值
                    if (preSelectedFirst) {
                      document.getElementById('firstSelect').value = preSelectedFirst;
                    }

                    // 根據第一個 select 的值初始化第二個 select
                    updateSecondSelect();
                  }

                  // 在頁面加載時初始化
                  document.addEventListener('DOMContentLoaded', initializeSecondSelect);
                </script>
              </div>
            </div>
          </div>
          
          <button type="submit" class="btn btn-login">修改</button>
        </form>
      </div>

    </section><!-- /Starter Section Section -->

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