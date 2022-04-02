<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>COCOMINT</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/webbanmypham/public/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="matkhauhientai" placeholder="Mật khẩu hiện tại">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="matkhau" placeholder="Mật khẩu">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="nhaplai" placeholder="Nhập lại mật khẩu">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <a href="#" id="doimatkhau" class="btn btn-primary btn-user btn-block">
                                                    Đổi mật khẩu
                                                </a>
                                            </div>
                                            <div class="col-lg-6">
                                                <a href="#" id="quaylai" class="btn btn-primary btn-user btn-block">
                                                    Quay lại
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Tạo tài khoản!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/webbanmypham/public/js/sb-admin-2.min.js"></script>
    <script src="/webbanmypham/public/js/js.js"></script>
</body>

</html>

<script>
    function changePassword() {
        matkhau = $('#matkhau').val()
        taikhoan = '<?= $_SESSION['taikhoan'] ?>';
        $.post(urlPost('cnhanvien', 'updateMatkhauNhanvienByTaikhoan'), {
            taikhoan: taikhoan,
            matkhau: matkhau
        }, function(data) {
            if (data == 1) {
                alert("Đổi mật khẩu thành công!")
                closeForm()
            } else {
                alert("Đổi mật khẩu thất bại!")
                console.log(data)
            }
        })
    }
    //
    taikhoan = '<?= $_SESSION['taikhoan'] ?>';
    //
    $('#taikhoan').val(taikhoan)
    //
    var doimatkhau = function() {
        matkhauhientai = $('#matkhauhientai').val()
        matkhau = $('#matkhau').val()
        nhaplai = $('#nhaplai').val()
        if (matkhauhientai.length > 0) {
            if (matkhau == nhaplai) {
                if (matkhau.length > 0) {
                    $.post(urlPost('cnhanvien', 'getNhanvienByTaikhoanAndMatkhau'), {
                        taikhoan: taikhoan,
                        matkhau: matkhauhientai
                    }, function(data) {
                        dataSet = JSON.parse(data)
                        if (dataSet.length > 0) {
                            changePassword()
                        } else {
                            alert("Mật khẩu hiện tại không đúng!")
                            setFocus('matkhauhientai')
                        }
                    })
                } else {
                    alert("Mật khẩu mới không được để trống!")
                    setFocus('matkhau')
                }
            } else {
                alert("Nhập lại mật khẩu không đúng!")
                setFocus('nhaplai')
            }
        } else {
            alert("Mật khẩu hiện tại không được để trống!")
            setFocus('matkhauhientai')
        }
    }
    $('#doimatkhau').on('click', function() {})
    $('#closeForm').on('click', function() {
        closeForm()
    })

    function closeForm() {
        location.replace(document.referrer)
    }
    $('#nhaplai').keyup(function(event) {
        key = event.keyCode
        if (key === 13) {
            event.preventDefault()
            doimatkhau()
        }
    })
    $('#matkhau').keyup(function(event) {
        key = event.keyCode
        if (key === 13) {
            event.preventDefault()
            doimatkhau()
        }
    })
    $('#matkhauhientai').keyup(function(event) {
        key = event.keyCode
        if (key === 13) {
            event.preventDefault()
            doimatkhau()
        }
    })
    //
    quaylai = $('#quaylai')
    quaylai.click(function() {
        location.replace(document.referrer)
    })
</script>