<?php
    session_start();
    include("./includes/connect.php");

    if(!isset($_SESSION['Admin'])){
        echo "<script>alert('Bạn chưa đăng nhập! Hãy đăng nhập để tiếp tục.');</script>"; 
        header("Refresh: 0;url=login.php");  
    }else{}
    $this_bl_ma = $_GET['this_bl_ma'];

    $binh_luan = "SELECT *
                    FROM binh_luan l
                    LEFT JOIN bai_viet a ON a.bv_ma = l.bv_ma
                    LEFT JOIN danh_muc b ON a.dm_ma = b.dm_ma
                    LEFT JOIN nguoi_dung e ON a.nd_username = e.nd_username
                    LEFT JOIN mon_hoc c ON b.mh_ma = c.mh_ma
                    LEFT JOIN khoi_lop d ON c.kl_ma = d.kl_ma
                    LEFT JOIN tai_lieu f ON f.bv_ma = a.bv_ma
                    
                    where bl_ma = '$this_bl_ma'";

    $result_binh_luan = mysqli_query($conn,$binh_luan);
    $row_binh_luan = mysqli_fetch_assoc($result_binh_luan);
    // if (isset($_POST['CapNhatMonHoc'])) {
    //     $mh_ten = $_POST['mh_ten'];
    //     $kl_ma = $_POST['kl_ma'];
    //     $cap_nhat_mon_hoc = "UPDATE mon_hoc SET mh_ten = '$mh_ten', kl_ma = '$kl_ma' WHERE mh_ma='$this_mh_ma'";
    //     mysqli_query($conn,$cap_nhat_mon_hoc);           
    //     echo "<script>alert('Cập nhật môn học mới thành công!');</script>"; 
    //     header("Refresh: 0;url=QL_MonHoc.php"); 	
    // }
   
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Cập nhật môn học</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/icon.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php
                include_once("includes/menu.php");
            ?>

            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php
                    include_once("includes/navbar.php");
                ?>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                       
                        <!-- Basic Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.php">Home</a>
                                </li> 
                                <li class="breadcrumb-item">
                                    <a href="QL_BinhLuan.php">Quản lý bình luận</a>
                                </li>  
                                <li class="breadcrumb-item active">Chi tiết bình luận</li>
                            </ol>
                        </nav>

                        <!-- Basic Layout -->
                        <div class="card ">
                            <div class="card-body  g-3">

                                <h5 class="mb-2"><span class="badge bg-primary">Mã bài viết
                                        #<?php echo  $row_binh_luan['bv_ma']; ?></span></h5>

                                <h4 class="mb-2 text-center"><?php echo  $row_binh_luan['bv_tieude']; ?></h4>
                                <!-- <p class="mb-0 pt-1">Learn web design in 1 hour with 25+ simple-to-use rules and
                                        guidelines — tons
                                        of amazing web design resources included!</p> -->
                                <hr class="my-4">
                                <h5>Tóm tắt</h5>
                                <div class="d-flex flex-wrap">
                                    <div class="me-5">
                                        <p class="text-nowrap"><i class="bx bx-user bx-sm me-2"></i>Tác giả:
                                            <?php echo  $row_binh_luan['nd_hoten']; ?>
                                        </p>
                                        <p class="text-nowrap"><i class="fa fa-eye me-2"></i>Lượt xem:
                                            <?php echo  $row_binh_luan['bv_luotxem']; ?></p>

                                    </div>
                                    <div class="me-5">
                                        <p class="text-nowrap"><i class="fa fa-star me-2"></i>Điểm đánh
                                            giá: <?php echo  $row_binh_luan['bv_diemtrungbinh']; ?></p>
                                        <p class="text-nowrap "><i class="fa fa-calendar me-2"></i>Ngày xuất
                                            bản:
                                            <?php echo date_format(date_create($row_binh_luan['bv_ngaydang']), "d-m-Y (H:i:s)"); ?>
                                        </p>
                                    </div>
                                    <div class="me-5">

                                        <p class="text-nowrap"><i class="fa fa-graduation-cap me-2"></i>Khối lớp:
                                            <?php echo  $row_binh_luan['kl_ten']; ?></p>
                                        <p class="text-nowrap "><i class="fa fa-bookmark me-2"></i>Môn học
                                            <?php echo  $row_binh_luan['mh_ten']; ?>
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-nowrap"><i class="fa fa-folder me-2"></i>Danh mục:
                                            <?php echo  $row_binh_luan['dm_ten']; ?></p>
                                    </div>
                                </div>
                                <hr class="mb-4 mt-2">
                                <h5>Nội dung</h5>
                                <p class="mb-4"> <?php echo $row_binh_luan['bv_noidung']; ?></p>

                                <h5>Tài liệu đính kèm</h5>
                                <p class="mb-4">
                                    <?php 
                                        if($row_binh_luan['tl_tentaptin'] == ''){ 
                                            echo "<i>(Không có tài liệu đính kèm)</i>";
                                        }else{ 
                                            while ($row_tai_lieu = mysqli_fetch_array($result_binh_luan)) {
                                                // echo "".$row_tai_lieu['tl_tentaptin']."<br>";
                                                $ten_tai_lieu = $row_binh_luan['tl_tentaptin'];
                                                $duoi_tai_lieu = pathinfo($ten_tai_lieu, PATHINFO_EXTENSION);
                                                
                                                $icon = ''; // Biến này sẽ lưu trữ biểu tượng dựa trên loại đuôi tệp
                                                
                                                // Kiểm tra loại đuôi tệp và gán biểu tượng tương ứng
                                                if (strtolower($duoi_tai_lieu) === 'pdf') {
                                                    $icon = '<i class="fa-solid fa-file-pdf" style="color: #e40707;"></i>';
                                                } elseif (in_array(strtolower($duoi_tai_lieu), ['doc', 'docx'])) {
                                                    $icon = '<i class="fa-solid fa-file-word" style="color: #0078d4;"></i>';
                                                } elseif (in_array(strtolower($duoi_tai_lieu), ['zip'])) {
                                                    $icon = '<i class="fa-solid fa-file-archive" style="color: #FFA500;"></i>'; // Icon cho ZIP
                                                } elseif (in_array(strtolower($duoi_tai_lieu), ['rar'])) {
                                                    $icon = '<i class="fa-solid fa-file-archive" style="color: #8B0000;"></i>'; // Icon cho RAR
                                                }
                                                
                                                // Hiển thị biểu tượng và tên tệp
                                                echo '<div>' . $icon . ' <a class="text-muted" href="uploads/' . $ten_tai_lieu . '" target="_blank">' . $ten_tai_lieu . '</a></div>';
                                            } 
                                        }
                                    ?>
                                </p>
                                <hr class="my-4">
                                <h5>Bình luận</h5>
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="avatar-wrapper">
                                        <div class="avatar avatar-sm me-2"><img src="./assets/img/avatars/<?php echo  $row_binh_luan['nd_hinh']; ?>"
                                                alt="Avatar" class="rounded-circle"></div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="fw-medium"> <?php echo  $row_binh_luan['nd_hoten']; ?></span>
                                        <small class="text-muted"> <?php echo  $row_binh_luan['bl_noidung']; ?></small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>

    <!-- Thanh công cụ soanj thảo -->
    <script src="./ckeditor/ckeditor/ckeditor.js"></script>
    <script src="./ckfinder/ckfinder/ckfinder.js"></script>

    <script>
    CKEDITOR.replace('Noidung_Baiviet', {
        filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
        filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'

    })
    </script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>