<?php
if (session_status() !== 2) {
    session_start();
}
if (!isset($_SESSION['nguoidung'])) {
    header("Location: index.php");
} else {
    $loainguoidung = $_SESSION['nguoidung']['loainguoidung'];
    if (strcmp($loainguoidung, "ql") !== 0) {
        header("Location: index.php");
    }
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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="./public/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--  -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="./public/js/js.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <!--  -->
    <title>Quản lý - KHÁNH DUY STORE</title>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">TRANG CHỦ</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Pages Collapse Menu -->
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="?controller=csanpham&action=list">
                    <i class="fas fa-car"></i>
                    <span>Quản lý sản phẩm</span></a>
            </li>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="?controller=cshop&action=list">
                    <i class="fas fa-store-alt"></i>
                    <span>Quản lý shop</span></a>
            </li>
            <!--  -->
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
                    $controller = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : "csanpham";
                    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'home';
                    $path =  __DIR__ . "/mvc/controllers/$controller.php";
                    if (strcmp($loainguoidung, "ql") == 0) {
                        if (file_exists($path)) {
                            require_once $path;
                            $controller = new $controller();
                            if (method_exists($controller, $action)) {
                                $controller->$action();
                            } else {
                                echo '<script>location.replace("?controller=csanpham&action=list")</script>';
                            }
                        } else {
                            echo '<script>location.replace("?controller=csanpham&action=list")</script>';
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