<?php
if (isset($_SESSION['shop'])) {
    echo "<script>location.replace('shop.php')</script>";
}
if (!isset($_SESSION['nguoidung'])) {
    echo "<script>location.replace('login.php')</script>";
}
?>
<div class="container my-5" id="dangkyshop">
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
<script>
    //khai bao
    txtTenshop = $('#dangkyshop #tenshop')
    txtTenshopError = $('#dangkyshop #errortenshop')
    txtSodienthoai = $('#dangkyshop #sodienthoai')
    txtSodienthoaiError = $('#dangkyshop #errorsodienthoai')
    txtEmail = $('#dangkyshop #email')
    txtEmailError = $('#dangkyshop #erroremail')
    txtDiachi = $('#dangkyshop #diachi')
    txtDiachiError = $('#dangkyshop #errordiachi')
    btnHinhanh = $('#dangkyshop #btnHinhanh')
    btnFile = $('#dangkyshop #file')
    txthinhanh = $('#dangkyshop #hinhanh')
    btnDangky = $('#dangkyshop #btnDangky')
    sodienthoai = `<?= ($_SESSION['nguoidung']['sodienthoai']) ?>`
    email = `<?= $_SESSION['nguoidung']['email'] ?>`
    diachi = `<?= $_SESSION['nguoidung']['diachi'] ?>`
    hinhanhhientai = `<?= $_SESSION['nguoidung']['hinhanh'] ?>`
    //load
    txtTenshop.focus()
    txtSodienthoai.val(sodienthoai)
    txtEmail.val(email)
    txtDiachi.val(diachi)
    txthinhanh.attr('src', './public/img/nguoidung/' + hinhanhhientai)

    $(document).ready(function() {
        $.post(urlPost('cshop', 'getShopByNguoidung'), {}, function(data) {
            dataSet = JSON.parse(data)
            let nguoidung = dataSet['data']
            if (nguoidung.length > 0) {
                location.replace('shop.php')
            }
        })
    })
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
        alert(123)
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
        } else if (txtTenshopError.text() != "*") {
            check = false
            txtTenshop.focus()
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
        hinhanh = file.length > 0 ? uploadFile(file, 'shop')[0] : copyFile(hinhanhhientai, 'nguoidung', 'shop')
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