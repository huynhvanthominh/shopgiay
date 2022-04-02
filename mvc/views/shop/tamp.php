<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>COCOMINT</title>
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
    <?php
    require __DIR__ . "/../view/header.php";
    ?>
    <!-- Navigation-->
    <div class="container my-5">
        <div class="row">
            <div class="col-xl-12">
                <div class="card col-lg-8 mx-auto">
                    <div class="card-text mt-4">
                        <h1 class="text-center">Đăng ký shop</h1>
                    </div>
                    <div class="card-body">
                        <div class="from-group row">
                            <div class="col-lg-6">
                                <div class="from-group row">
                                    <div class="col-lg-12 my-1">
                                        <label for="">Tên shop: <span class="text-danger" id="errortenshop">*</span></label>
                                        <input type="text" class="form-control" name="" id="tenshop">
                                    </div>
                                    <div class="col-lg-12 my-1">
                                        <label for="">Số điện thoại: <span class="text-danger" id="errorsodienthoai">*</span></label>
                                        <input type="text" class="form-control" name="" id="sodienthoai">
                                    </div>
                                </div>
                                <div class="from-group row">
                                    <div class="col-lg-12 my-1">
                                        <label for="">Email: <span class="text-danger" id="erroremail">*</span></label>
                                        <input type="text" class="form-control" name="" id="email">
                                    </div>
                                    <div class="col-lg-12 my-1">
                                        <label for="">Địa chỉ: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="" id="diachi">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="from-group row text-center">
                                    <div class="col-lg-12 my-1">
                                        <span>Ảnh đại diện shop</span>
                                    </div>
                                    <div class="col-lg-12 my-1 mb-2">
                                        <input type='file' class="custom-file-input hidden d-none" id='file' accept="image/*" />
                                        <span class="d-block border" style="height: 200px;">
                                            <label for="file" class="d-block" style="height: 200px;">
                                                <button class="w-100 border-0" style="height: 200px;" id="btnHinhanh">
                                                    <img class="rounded mx-auto d-block" src="./public/img/nguoidung/nguoidung.png" alt="" id="hinhanh" style="max-height: 200px; max-width: 200px;">
                                                </button>
                                            </label>
                                        </span>
                                    </div>
                                    <div class="col-lg-12 mt-4">
                                        <button class="w-100 btn btn-primary" id="btnDangky">Đăng ký</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require __DIR__ . "/../view/footer.php";
    ?>
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
    //khai bao
    txtTenshop = $('#tenshop')
    txtTenshopError = $('#errortenshop')
    txtSodienthoai = $('#sodienthoai')
    txtSodienthoaiError = $('#errorsodienthoai')
    txtEmail = $('#email')
    txtEmailError = $('#erroremail')
    txtDiachi = $('#diachi')
    txtDiachiError = $('#errordiachi')
    btnHinhanh = $('#btnHinhanh')
    btnFile = $('#file')
    txthinhanh = $('#hinhanh')
    btnDangky = $('#btnDangky')
    sodienthoai = `<?= base64_decode($sodienthoai) ?>`
    email = `<?= $email ?>`
    diachi = `<?= $diachi ?>`
    hinhanh = `<?= $hinhanh ?>`
    //load
    txtTenshop.focus()
    txtSodienthoai.val(sodienthoai)
    txtEmail.val(email)
    txtDiachi.val(diachi)
    txthinhanh.attr('src', './public/img/nguoidung/' + hinhanh)
    //
    txtTenshop.keypress(function(e) {
        if (e.keyCode == 13) {
            e.preventDefault()
            checkInput()
        } else {
            txtTenshopError.text("*")
        }
    })
    txtTenshop.keyup(function(e) {
        if (txtTenshop.val().length == 0) {
            txtTenshopError.text("Tên shop không được để trống")
        }
    })
    txtTenshop.change(function() {
        tenshop = txtTenshop.val()
        if (tenshop.length > 0) {
            $.post(urlPost('cshop', 'getShopByTenshop'), {
                tenshop: tenshop
            }, function(data) {
                dataSet = JSON.parse(data)
                shop = dataSet['data']
                if (shop.length > 0) {
                    txtTenshopError.text("Tên shop đã tồn tại")
                } else {
                    txtTenshopError.text("*")
                }
            })
        } else {
            txtTenshopError.text("Tên shop không được để trống")
        }
    })
    //
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
                        txtSodienthoaiError.text('Vui lòng nhập đúng 10 số')
                    } else {
                        txtSodienthoaiError.text('*')
                    }
                })
            }
        }
    })
    //

    txtEmail.keyup(function(e) {
        if (e.keyCode == 13) {
            e.preventDefault()
            checkInput()
        } else {
            if (txtEmail.val().length == 0) {
                txtEmailError.text("Email không được để trống")
            } else if (checkEmail(txtEmail.val()) == null) {
                txtEmailError.text("Không đúng định dạng email")
            } else {
                txtEmailError.text("*")
            }
        }
    })


    //click hinh anh
    btnHinhanh.click(function() {
        btnFile.click()
    })
    btnFile.change(function(e) {
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
    //
    btnDangky.click(function() {
        checkInput()
    })
    //function
    function checkInput() {
        check = true
        if (txtTenshop.val().length == 0) {
            check = false
            txtTenshop.focus()
            txtTenshopError.text('Tên shop không được để trống')
            alert(txtTenshopError.text())
        } else if (txtSodienthoai.val().length == 0) {
            check = false
            txtSodienthoai.focus()
            txtSodienthoaiError.text("Số điện thoại không được để trống")
            alert(txtSodienthoaiError.text())
        } else if (txtEmail.val().length == 0) {
            check = false
            txtEmail.focus()
            txtEmailError.text("Email không được để trống")
            alert(txtEmailError.text())
        } else if (txtDiachi.val().length == 0) {
            check = false
            txtDiachi.focus()
            txtDiachiError.text("Email không được để trống")
            alert(txtDiachiError.text())
        }
        if (check == true) {
            dangky()
        }
    }
    //
    function dangky() {
        file = btnFile.get(0).files
        hinhanh = file.length > 0 ? uploadFile(file, 'shop')[0] : copyFile(hinhanh, 'nguoidung', 'shop')
        $.post(urlPost('cshop', 'addShop'), {
            tenshop: txtTenshop.val(),
            sodienthoai: txtSodienthoai.val(),
            email: txtEmail.val(),
            diachi: txtDiachi.val(),
            hinhanh: hinhanh
        }, function(data) {
            dataSet = JSON.parse(data)
            status = dataSet['status']
            message = dataSet['message']
            alert(message)
            if (status == "true") {
                location.replace('shop.php')
            }
        })
    }
</script>