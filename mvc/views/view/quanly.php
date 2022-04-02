<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

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
            <a class="nav-link" href="?controller=cnhanvien&action=list">
                <i class="fas fa-user-circle fa-chart-area"></i>
                <span>Quản lý nhân viên</span></a>
        </li>
        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="?controller=csanpham&action=list">
                <i class="fas fa-car"></i>
                <span>Quản lý sản phẩm</span></a>
        </li>
        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="?controller=ckhachhang&action=list">
                <i class="fas fa-users fa-chart-area"></i>
                <span>Quản lý khách hàng</span></a>
        </li>
        <!--  -->
        <li class="nav-item">
            <a class="nav-link" href="?controller=cloaisanpham&action=list">
                <i class="fas fa-truck-moving"></i>
                <span>Quản lý loại sản phẩm</span></a>
        </li>
        <!--  -->
        <li class="nav-item">
            <a class="nav-link" href="?controller=choadon&action=list">
                <i class="fas fa-book"></i>
                <span>Thống kê</span></a>
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
  
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <?php
                require_once __DIR__ . "/mvc/controllers/controller.php";
                $controller = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : "cnhanvien";
                $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'list';
                $path =  __DIR__ . "/mvc/controllers/$controller.php";
                if (file_exists($path)) {
                    require_once $path;
                    $controller = new $controller();
                    if (method_exists($controller, $action)) {
                        $controller->$action();
                    } else {
                        require_once __DIR__ . "/mvc/controllers/cnhanvien.php";
                        $cnhanvien = new cnhanvien();
                        $cnhanvien->list();
                    }
                } else {
                    require_once __DIR__ . "/mvc/controllers/cnhanvien.php";
                    $cnhanvien = new cnhanvien();
                    $cnhanvien->list();
                }
                ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>