<?php
if (session_status() != 2) {
    session_start();
}
if (!isset($_SESSION['shop'])) {
    header("Location: index.php?controller=cview&action=addShop");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!--  -->
    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="./public/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
    <!--  -->
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="./public/js/js.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> -->
    <!--  -->
    <title><?= $_SESSION['shop']['tenshop'] ?></title>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?controller=cview&action=sanphamshop&idshop=<?= $_SESSION['shop']['idshop'] ?>">
                <img src="./public/img/logo.png" class="img-responsive" alt="" height="50" id="shop-hinhanh">
                <div class="sidebar-brand-text mx-3" id="shop-tenshop"></div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)" id="shop-thongtinshop">
                    <i class="fas fa-users fa-chart-area"></i>
                    <span>Thông tin shop</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="?controller=cview&action=listLoaisanpham">
                    <i class="fas fa-car"></i>
                    <span>Quản lý loại sản phẩm</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?controller=cview&action=listSanpham">
                    <i class="fas fa-car"></i>
                    <span>Quản lý sản phẩm</span></a>
            </li>
            <!-- Nav Item - Charts -->
            <!--  -->
            <!--  -->
            <li class="nav-item">
                <a class="nav-link" href="?controller=cview&action=mausac">
                    <i class="fas fa-folder"></i>
                    <span>Quản lý giao diện</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#thongke" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Đơn hàng</span>
                </a>
                <div id="thongke" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?controller=cview&action=listHoadonChuahoantat">Đang xử lý</a>
                        <a class="collapse-item" href="?controller=cview&action=listHoadonHoantat">Đã hoàn tất</a>
                        <div class="collapse-divider"></div>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                require __DIR__ . "/mvc/views/view/header.php";
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                    require_once __DIR__ . "/mvc/controllers/controller.php";
                    $controller = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : "a";
                    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'list';
                    if (strcmp($controller, 'cview') === 0) {
                        $path =  __DIR__ . "/mvc/controllers/$controller.php";
                        if (file_exists($path)) {
                            require $path;
                            if (method_exists($controller, $action)) {
                                $controller = new $controller();
                                $controller->$action();
                            } else {
                                echo '<script>location.replace("?controller=cview&action=listSanpham")</script>';
                            }
                        } else {
                            echo '<script>location.replace("?controller=cview&action=listSanpham")</script>';
                        }
                    } else {
                        echo '<script>location.replace("?controller=cview&action=listSanpham")</script>';
                    }
                    ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

    <div class="row" id="dialog-thongtinshop">
        <div class="card col-lg-12 mx-auto">
            <div class="card-text mt-4">
                <h1 class="text-center" id="title-tenshop">TÊN SHOP</h1>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-6">
                        <div class="col-lg-12 my-1">
                            <label for="">Tên shop: <span class="text-danger" id="errortenshop">*</span></label>
                            <input type="text" class="form-control" name="" id="tenshop">
                        </div>
                        <div class="col-lg-12 my-1">
                            <label for="">Số điện thoại: <span class="text-danger" id="errorsodienthoai">*</span></label>
                            <input type="text" class="form-control" name="" id="sodienthoai">
                        </div>


                        <div class="col-lg-12 my-1">
                            <label for="">Email: <span class="text-danger" id="erroremail">*</span></label>
                            <input type="text" class="form-control" name="" id="email">
                        </div>
                        <div class="col-lg-12 my-1">
                            <label for="">Địa chỉ: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="" id="diachi">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row text-center">
                            <div class="col-lg-12 my-1">
                                <span>Ảnh đại diện shop</span>
                            </div>
                            <div class="col-lg-12 my-1 mb-2">
                                <input type='file' class="custom-file-input hidden d-none" id='file' accept="image/*" />
                                <span class="d-block border" style="height: 200px;">
                                    <label for="file" class="d-block" style="height: 200px;">
                                        <button title="Click vào đây để thay đổi ảnh đại diện shop" class="w-100 border-0" style="height: 200px;" id="btnHinhanh">
                                            <img class="rounded mx-auto d-block" src="./public/img/nguoidung/nguoidung.png" alt="" id="hinhanh" style="max-height: 200px; max-width: 200px;">
                                        </button>
                                    </label>
                                </span>
                            </div>
                            <div class="col-lg-12 btn-group mt-3">
                                <button class="w-100 btn btn-primary mr-1" id="luu">
                                    Lưu
                                </button>
                                <button class="w-100 btn btn-secondary ml-1" id="thoat">
                                    Thoát
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Page Wrapper -->

    <?php
    require __DIR__ . "/mvc/views/view/footer.php";
    ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</body>


</html>
<script>
    var shop_tenshop = `<?= $_SESSION['shop']['tenshop'] ?>`
    var shop_hinhanh = `<?= $_SESSION['shop']['hinhanh'] ?>`
    var shop_diachi = `<?= $_SESSION['shop']['diachi'] ?>`
    var shop_email = `<?= $_SESSION['shop']['email'] ?>`
    var shop_sodienthoai = `<?= $_SESSION['shop']['sodienthoai'] ?>`
    // 
    $(document).ready(function() {
        $('#shop-tenshop').text(shop_tenshop)
        $('#shop-hinhanh').attr('src', path_img_shop + shop_hinhanh)
    })
    // 
    $('#shop-thongtinshop').click(function() {
        dialog_thongtinshop.dialog('open')
        loadThongtinshop()
    })
    //
    $('#dialog-thongtinshop #btnHinhanh').click(function() {
        $('#dialog-thongtinshop #file').click()
    })
    //
    $('#dialog-thongtinshop #file').change(function(e) {
        if (e.target.files.length > 0) {
            file = e.target.files[0]
            if (/image\/.+/.test(file.type)) {
                if (file.size / 1048576 <= 2) {
                    changeImg($(this), $('#dialog-thongtinshop #hinhanh'))
                } else {
                    alert("Vui lòng chọn hình ảnh không vượt quá 2 MiB")
                }
            } else {
                alert("Vui lòng chọn file hình ảnh")
            }
        }

    })
    //load thong tin shop
    function loadThongtinshop() {
        $('#dialog-thongtinshop #title-tenshop').text(shop_tenshop)
        $('#dialog-thongtinshop #tenshop').val(shop_tenshop)
        $('#dialog-thongtinshop #sodienthoai').val(shop_sodienthoai)
        $('#dialog-thongtinshop #email').val(shop_email)
        $('#dialog-thongtinshop #diachi').val(shop_diachi)
        $('#dialog-thongtinshop #hinhanh').attr('src', path_img_shop + shop_hinhanh)
    }
    $('#dialog-thongtinshop #thoat').click(function() {
        dialog_thongtinshop.dialog('close')
    })
    $('#dialog-thongtinshop #luu').click(function() {
        let tenshop = $('#dialog-thongtinshop #tenshop').val()
        let sodienthoai = $('#dialog-thongtinshop #sodienthoai').val()
        let email = $('#dialog-thongtinshop #email').val()
        let diachi = $('#dialog-thongtinshop #diachi').val()
        let file = $('#dialog-thongtinshop #file').get(0).files
        let hinhanh = uploadFile(file, 'shop')[0]
        $.post(urlPost('cshop', 'updateShopByIdshop'), {
            tenshop: tenshop,
            sodienthoai: sodienthoai,
            email: email,
            diachi: diachi,
            hinhanh: hinhanh
        }, function(data) {
            dataSet = JSON.parse(data)
            status = dataSet['status']
            message = dataSet['message']
            alert(message)
            if (status == 'true') {
                shop_tenshop = tenshop
                shop_hinhanh = file.length > 0 ? hinhanh : shop_hinhanh
                $('#dialog-thongtinshop #title-tenshop').text(shop_tenshop)
                $('#shop-tenshop').text(shop_tenshop)
                $('#shop-hinhanh').attr('src', path_img_shop + shop_hinhanh)
                dialog_thongtinshop.dialog('close')
            }
        })
    })
    //format dialog thong tin shop
    dialog_thongtinshop = $("#dialog-thongtinshop").dialog({
        autoOpen: false,
        title: 'Thông tin shop',
        width: 'auto',
        modal: true
    });
</script>