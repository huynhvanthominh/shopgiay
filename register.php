<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Đăng ký - KHÁNH DUY STORE</title>
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
                <div class="card col-lg-12 mx-auto">
                    <div class="card-text mt-4">
                        <h1 class="text-center">Đăng ký tài khoản</h1>
                    </div>
                    <div class="card-body">
                        <div class="from-group row">
                            <div class="col-lg-8">
                                <div class="from-group row">
                                    <div class="col-lg-6 my-1">
                                        <label for="">Số điện thoại: <span class="text-danger" id="errorsodienthoai">*</span></label>
                                        <input type="text" class="form-control" name="" id="sodienthoai">
                                    </div>
                                    <div class="col-lg-6 my-1">
                                        <label for="">Tên hiển thị:</label>
                                        <input type="text" class="form-control" name="" id="tenhienthi" value="Chưa đặt tên">
                                    </div>
                                </div>
                                <div class="from-group row">
                                    <div class="col-lg-6 my-1">
                                        <label for="">Mật khẩu: <span class="text-danger" id="errormatkhau">*</span></label>
                                        <input type="password" class="form-control" name="" id="matkhau">
                                    </div>
                                    <div class="col-lg-6 my-1">
                                        <label for="">Nhập lại: <span class="text-danger" id="errornhaplai">*</span></label>
                                        <input type="password" class="form-control" name="" id="nhaplai">
                                    </div>
                                </div>
                                <div class="from-group row">
                                    <div class="col-lg-6 my-1">
                                        <label for="">Email: <span class="text-danger" id="erroremail"></span></label>
                                        <input type="text" class="form-control" name="" id="email">
                                    </div>
                                    <div class="col-lg-6 my-1">
                                        <label for="">Địa chỉ: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="" id="diachi">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="from-group row text-center">
                                    <div class="col-lg-12 my-1">
                                        <span>Ảnh đại diện</span>
                                    </div>
                                    <div class="col-lg-12 my-1">
                                        <input type='file' class="custom-file-input hidden d-none" id='file' accept="image/*" />
                                        <span class="d-block border" style="height: 200px;">
                                            <label for="file" class="d-block" style="height: 200px;">
                                                <button class="w-100 border-0" style="height: 200px;" id="btnHinhanh">
                                                    <img class="rounded mx-auto d-block" src="./public/img/nguoidung/nguoidung.png" alt="" id="hinhanh" style="max-height: 200px; max-width: 200px;">
                                                </button>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-8">
                                <button class="w-100 btn btn-primary" id="btnDangky">Đăng ký</button>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row text-center">
                                    <div class="col-lg-5 my-1">
                                        <a href="#" class="card-link">Quên mật khẩu?</a>
                                    </div>
                                    <div class="col-lg-7 my-1">
                                        <a href="login.php" class="card-link">Đã có tài khoản?</a>
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
    <?php
    require __DIR__ . "/mvc/views/view/footer.php";
    ?>
    <!-- Core theme JS-->
</body>

</html>

<script>
    //Khai bao bien
    txtErrorsodienthoai = $('#errorsodienthoai')
    txtSodienthoai = $('#sodienthoai')
    txtTenhienthi = $('#tenhienthi')
    txtMatkhau = $('#matkhau')
    txtErrormatkhau = $('#errormatkhau')
    txtNhaplai = $('#nhaplai')
    txtErrornhaplai = $('#errornhaplai')
    txtEmail = $('#email')
    txtErroremail = $('#erroremail')
    txtDiachi = $('#diachi')
    btnHinhanh = $('#btnHinhanh')
    txtfile = $('#file')
    txthinhanh = $('#hinhanh')
    btnDangky = $('#btnDangky')
    checkdangky = true
    // load
    txtSodienthoai.focus()
    // Xu ly su kien khi thay doi du lieu so dien thoai
    txtSodienthoai.keypress(function(e) {
        key = String.fromCharCode(e.keyCode)
        if (e.keyCode === 13) {
            e.preventDefault()
            checkinput()
        } else {
            if (checkNumber(key) === null) {
                e.preventDefault()
            } else {
                if (txtSodienthoai.val().length > 9) {
                    e.preventDefault()
                }
                txtSodienthoai.keyup(function() {
                    if (txtSodienthoai.val().length != 10) {
                        txtErrorsodienthoai.text('Vui lòng nhập đúng 10 số')
                    } else {
                        txtErrorsodienthoai.text('*')
                    }
                })
            }
        }
    })
    txtSodienthoai.change(function() {
        sodienthoai = txtSodienthoai.val()
        if (sodienthoai.length == 10) {
            $.post("ajax.php?controller=cnguoidung&action=getNguoidungBySodienthoai", {
                sodienthoai: sodienthoai
            }, function(data) {
                dataSet = JSON.parse(data)
                console.log(dataSet)
                nguoidung = dataSet['data']
                if (nguoidung.length > 0) {
                    txtErrorsodienthoai.text("Số điện thoại đã tồn tại")
                } else {
                    txtErrorsodienthoai.text("*")
                }
            })
            txtSodienthoai.keyup(function(e) {
                key = e.keyCode
                if (key == 13) {
                    e.preventDefault()
                    checkinput()
                }
            })
        } else {
            txtErrorsodienthoai.text("Vui lòng nhập đúng 10 số")
        }
    })
    // xu ly su kien khi thay doi du lieu ten hien thi
    txtTenhienthi.keypress(function(e) {
        key = e.keyCode
        if (key == 13) {
            e.preventDefault()
            checkinput()
        }
    })
    txtTenhienthi.change(function() {
        txtTenhienthi.keyup(function(e) {
            key = e.keyCode
            if (key == 13) {
                e.preventDefault()
                checkinput()
            }
        })
    })
    // xu ly su kien khi thay doi du lieu mat khau
    txtMatkhau.keypress(function(e) {
        key = String.fromCharCode(e.keyCode)
        if (e.keyCode === 13) {
            e.preventDefault()
            checkinput()
        } else {
            if (checkTypeChar(key) === null) {
                e.preventDefault()
            } else {
                txtMatkhau.keyup(function() {
                    if (txtMatkhau.val().length < 8) {
                        txtErrormatkhau.text("Không được ít hơn 8 ký tự")
                    } else {
                        txtErrormatkhau.text("*")
                    }
                })
            }
        }
    })
    // xu ly su kien khi thay doi du lieu nhap lai mat khau
    txtNhaplai.keypress(function(e) {
        key = String.fromCharCode(e.keyCode)
        if (e.keyCode === 13) {
            e.preventDefault()
            checkinput()
        } else {
            if (checkTypeChar(key) == null) {
                e.preventDefault()
            } else {
                txtNhaplai.keyup(function(e) {
                    if (txtMatkhau.val() == txtNhaplai.val()) {
                        txtErrornhaplai.text("*")
                    } else {
                        txtErrornhaplai.text("Không trùng với mật khẩu")
                    }
                })
            }
        }
    })
    // xu ly sự kiên khi thay đổi dữ liệu email
    txtEmail.keyup(function(e) {
        if (e.keyCode == 13) {
            e.preventDefault()
            checkinput()
        } else {
            if (checkEmail(txtEmail.val()) == null) {
                txtErroremail.text("Sai định dạng email")
            } else {
                txtErroremail.text("")
            }
            if (txtEmail.val().length == 0) {
                txtErroremail.text("")
            }

        }
    })
    // xu ly su kien khi thay doi du lieu dia chi
    txtDiachi.keyup(function(e) {
        if (e.keyCode === 13) {
            e.preventDefault()
            checkinput()
        }
    })
    // xu ly su kien khi click vao input file
    btnHinhanh.click(function() {
        txtfile.click()
    })
    txtfile.change(function(e) {
        if (e.target.files.length > 0) {
            file = e.target.files[0]
            if (/image\/.+/.test(file.type)) {
                if (file.size / 1048576 <= 2) {
                    reader = new FileReader()
                    reader.onload = function(e) {
                        txthinhanh.attr('src', e.target.result)
                    }
                    reader.readAsDataURL(file);
                } else {
                    alert("Vui lòng chọn hình ảnh không vượt quá 2 MiB")
                }
            } else {
                alert("Vui lòng chọn file hình ảnh")
            }
        }
    })
    // Xu ly su kien khi click vao nut dang ky
    btnDangky.click(function() {
        checkinput()
    })
    // function kiem tra du lieu dau vao
    function checkinput() {
        checkdangky = true
        if (txtSodienthoai.val().length == 0) {
            checkdangky = false
            alert("Số điện thoại không được để trống")
            txtSodienthoai.focus()
        } else if (txtErrorsodienthoai.text() != "*") {
            checkdangky = false
            alert(txtErrorsodienthoai.text())
            txtSodienthoai.focus()
        } else if (txtTenhienthi.val().length == 0) {
            txtTenhienthi.val("Chưa đặt tên")
        } else if (txtMatkhau.val().length == 0) {
            checkdangky = false
            alert("Mật khẩu không được để trống")
            txtMatkhau.focus()
        } else if (txtErrormatkhau.text() != "*") {
            alert(txtErrormatkhau.text())
            checkdangky = false
            txtMatkhau.focus()
        } else if (txtNhaplai.val().length == 0) {
            checkdangky = false
            alert("Nhập lại mật khẩu không được để trống")
            txtNhaplai.focus()
        } else if (txtErrornhaplai.text() != "*") {
            checkdangky = false
            alert(txtErrornhaplai.text())
            txtNhaplai.focus()
        } else if (txtErroremail.text() != '') {
            checkdangky = false
            alert(txtErroremail.text())
            txtEmail.focus()
        } else if (txtDiachi.val().length == 0) {
            checkdangky = false
            alert("Địa chỉ không được để trống")
            txtDiachi.focus()
        }
        if (checkdangky == true) {
            dangky()
        }
    }
    // function dang ky
    function dangky() {
        file = txtfile.get(0).files
        hinhanh = uploadFile(file, 'nguoidung')[0]
        $.post("ajax.php?controller=cnguoidung&action=addNguoidung", {
            sodienthoai: txtSodienthoai.val(),
            tenhienthi: txtTenhienthi.val(),
            matkhau: txtMatkhau.val(),
            email: txtEmail.val(),
            diachi: txtDiachi.val(),
            hinhanh: hinhanh
        }, function(data) {
            dataSet = JSON.parse(data)
            status = dataSet['status']
            message = dataSet['message']
            alert(message)
            if (status == 'true') {
                location.replace('index.php')
            }
        })
    }
</script>