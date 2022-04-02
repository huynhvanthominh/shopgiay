<?php
if (session_status() !== 2) {
    session_start();
}
if (isset($_SESSION['time'])) {
    if (time() - $_SESSION['time'] > 3600 * 24) {
        session_destroy();
    }
}
$tenhanvien = isset($_SESSION['tennhanvien']) ? $_SESSION['tennhanvien'] : "Đăng nhập";
$idnhanvien = isset($_SESSION['idnhanvien']) ? $_SESSION['idnhanvien'] : 0;
$chucvu = isset($_SESSION['chucvu']) ? $_SESSION['chucvu'] : "0";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Đăng nhập - KHÁNH DUY STORE</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="./public/img/logo.png" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <!--  -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="./public/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="./public/css/styles.css" rel="stylesheet" />

    <!--  -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="./public/js/js.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

</head>

<body>
    <!-- Navigation-->
    <div class="container my-5">
        <div class="row">
            <div class="col-xl-12">
                <div class="card col-lg-5 mx-auto">
                    <div class="card-text mt-4">
                        <h1 class="text-center">Đăng nhập</h1>
                    </div>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="width: 120px;">
                                <span class="input-group-text w-100">Số điện thoại</span>
                            </div>
                            <input type="text" class="form-control" id="sodienthoai">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="width: 120px;">
                                <span class="input-group-text w-100">Mật khẩu</span>
                            </div>
                            <input type="password" class="form-control" id="matkhau">
                        </div>
                        <div class="form-group row my-0">
                            <div class="col-lg-12">
                                <button class="w-100 btn btn-primary" id="btnDangnhap">Đăng nhập</button>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <div class="form-group row text-center">
                                    <div class="col-lg-12">
                                        <a href="#" class="card-link">Quên mật khẩu?</a>
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <a href="register.php" class="card-link">Chưa có tài khoản?</a>
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <a href="index.php" class="card-link">Quay lại trang chủ?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Core theme JS-->
</body>

</html>
<script>
    //khai bao bien
    txtSodienthoai = $('#sodienthoai')
    txtErrorsodienthoai = $('#errorsodienthoai')
    txtMatkhau = $('#matkhau')
    btnDangnhap = $('#btnDangnhap')
    checkDangnhap = true
    // load
    txtSodienthoai.focus()
    // event
    txtSodienthoai.keypress(function(e) {
        if (e.keyCode === 13) {
            e.preventDefault()
            checkInput()
        } else {
            key = String.fromCharCode(e.keyCode)
            if (checkNumber(key) == null) {
                e.preventDefault()
            } else {
                if (txtSodienthoai.val().length > 9) {
                    e.preventDefault()
                }
            }
        }
    })
    //
    txtMatkhau.keypress(function(e) {
        if (e.keyCode === 13) {
            e.preventDefault()
            checkInput()
        } else {
            key = String.fromCharCode(e.keyCode)
            if (checkTypeChar(key) == null) {
                e.preventDefault()
            }
        }
    })
    //
    btnDangnhap.click(function() {
        checkInput()
    })
    //function
    function checkInput() {
        checkDangnhap = true
        if (txtSodienthoai.val().length == 0) {
            checkDangnhap = false
            alert("Số điện thoại không được để trống")
            txtSodienthoai.focus()
        } else if (txtSodienthoai.val().length != 10) {
            checkDangnhap = false
            alert('Số điện thoại phải là 10 số')
            txtSodienthoai.focus()
        } else if (checkNumber(txtSodienthoai.val()) == null) {
            checkDangnhap = false
            alert("Số điện thoại chỉ được là số")
            txtSodienthoai.focus()
        } else if (txtMatkhau.val().length == 0) {
            checkDangnhap = false
            alert("Mật khẩu không được để trống")
            txtMatkhau.focus()
        } else if (checkTypeChar(txtMatkhau.val()) == null) {
            checkDangnhap = false
            alert("Mật khẩu không được chứa ký tự đặc biệt hoặc có dấu")
            txtMatkhau.focus()
        } else if (checkDangnhap == true) {
            dangnhap()
        }
    }
    //
    function dangnhap() {
        $.post(urlPost('cnguoidung', 'getNguoidungBySodienthoatAndMatkhau'), {
            sodienthoai: txtSodienthoai.val(),
            matkhau: txtMatkhau.val()
        }, function(data) {
            dataSet = JSON.parse(data)
            nguoidung = dataSet['data']
            if (nguoidung.length > 0) {
                alert("Đăng nhập thành công")
                if (document.referrer != 'http://localhost/shopgiay/register.php') {
                    location.replace(document.referrer)
                } else {
                    location.replace('index.php')
                }
            } else {
                alert('Sai số điện thoại hoặc mật khẩu')
                txtSodienthoai.focus()
            }
        })
    }
</script>