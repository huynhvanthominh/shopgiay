<?php
if (session_status() != 2) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>KHÁNH DUY STORE</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="./public/img/logo.png" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <!--  -->
    <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="./public/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="./public/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <!--  -->

</head>

<body id="body">
    <!-- Navigation-->

    <?php
    require __DIR__ . "/mvc/views/view/header.php";
    ?>
    <!-- Page Content-->
    <div class="container mb-5">
        <!--  -->
        <?php
        require_once __DIR__ . "/mvc/controllers/controller.php";
        $controller = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : "cview";
        $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'home';
        $path =  __DIR__ . "/mvc/controllers/$controller.php";
        if (file_exists($path)) {
            require_once $path;
            $controller = new $controller();
            if (method_exists($controller, $action)) {
                $controller->$action();
            } else {
                require __DIR__ . "/mvc/controllers/cview.php";
                $cview = new cview();
                $cview->home();
            }
        } else {
            $cview = new cview();
            $cview->home();
        }

        ?>
        <!--  -->
    </div>
    <!-- Footer-->
    <?php
    require __DIR__ . "/mvc/views/view/footer.php";
    ?>
    <!-- Bootstrap core JS-->
    <!-- Core theme JS-->
</body>

</html>
<script>
    $('#sidebarToggleTop').remove()
</script>