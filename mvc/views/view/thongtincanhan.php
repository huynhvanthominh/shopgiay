<div class="row">
    <div class="col-xl-12">
        <div class="card col-lg-12 mx-auto">
            <div class="card-text mt-4">
                <h1 class="text-center">Thông tin cá nhân</h1>
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
                                <input type="text" class="form-control" name="" id="tenhienthi" value="">
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
                                <span>Ảnh đải diện</span>
                            </div>
                            <div class="col-lg-12 my-1">
                                <input type='file' class="custom-file-input hidden d-none" id='file' accept="image/*" />
                                <span class="d-block border" style="height: 200px;">
                                    <label for="file" class="d-block" style="height: 200px;">
                                        <button class="w-100 border-0" style="height: 200px;" id="btnHinhanh">
                                            <img class="rounded mx-auto d-block" src="" alt="" id="hinhanh" style="max-height: 200px; max-width: 200px;">
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
                    <div class="col-lg-8 col-sm-6 col-md-6 col-6 my-1">
                        <button class="w-100 btn btn-primary" id="btnLuu">Lưu</button>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-md-6 col-6 my-1">
                        <button class="w-100 btn btn-secondary" id="btnThoat">Thoát</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //Khai bao bien
    sodienthoaihientai = `<?= $data ?>`
    txtErrorsodienthoai = $('#errorsodienthoai')
    txtSodienthoai = $('#sodienthoai')
    txtTenhienthi = $('#tenhienthi')
    txtEmail = $('#email')
    txtErroremail = $('#erroremail')
    txtDiachi = $('#diachi')
    btnHinhanh = $('#btnHinhanh')
    txtfile = $('#file')
    txthinhanh = $('#hinhanh')
    btnLuu = $('#btnLuu')
    btnThoat = $('#btnThoat')
    matkhauhientai = ''
    hinhanhhientai = ''
    // load
    $(document).ready(function() {
        $.post(urlPost('cnguoidung', 'getNguoidungBySodienthoai'), {
            sodienthoai: sodienthoaihientai
        }, function(data) {
            dataSet = JSON.parse(data)
            nguoidung = dataSet['data']
            nd = nguoidung[0]
            setVal(nd, 'sodienthoai')
            $('#tenhienthi').val(nd.tenhienthi)
            setVal(nd, 'email')
            setVal(nd, 'diachi')
            matkhauhientai = nd['matkhau']
            hinhanhhientai = nd['hinhanh']
            txthinhanh.attr('src', path_img_nguoidung + hinhanhhientai)
        })
    })
    // Xu ly su kien khi thay doi du lieu so dien thoai
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
                    txtfile.val('')
                }
            } else {
                alert("Vui lòng chọn file hình ảnh")
                txtfile.val('')
            }
        }
    })
    // Xu ly su kien khi click vao nut dang ky
    btnLuu.click(function() {
        checkinput()
    })
    btnThoat.click(function() {
        location.replace(document.referrer)
    })
    // function kiem tra du lieu dau vao
    function checkinput() {
        check = true
        if (txtSodienthoai.val().length == 0) {
            check = false
            alert("Số điện thoại không được để trống")
            txtSodienthoai.focus()
        } else if (txtErrorsodienthoai.text() != "*") {
            check = false
            alert(txtErrorsodienthoai.text())
            txtSodienthoai.focus()
        } else if (txtTenhienthi.val().length == 0) {
            txtTenhienthi.val("Chưa đặt tên")
        } else if (txtErroremail.text() != '') {
            check = false
            alert(txtErroremail.text())
            txtEmail.focus()
        } else if (txtDiachi.val().length == 0) {
            check = false
            alert("Địa chỉ không được để trống")
            txtDiachi.focus()
        }
        if (check == true) {
            update()
        }
    }
    // function dang ky
    function update() {
        file = txtfile.get(0).files
        hinhanh = file.length > 0 ? uploadFile(file, 'nguoidung')[0] : hinhanhhientai
        $.post("ajax.php?controller=cnguoidung&action=updateNguoidungBySodienthoai", {
            sodienthoaihientai: sodienthoaihientai,
            sodienthoai: txtSodienthoai.val(),
            tenhienthi: txtTenhienthi.val(),
            email: txtEmail.val(),
            diachi: txtDiachi.val(),
            hinhanh: hinhanh,
            hinhanhhientai: hinhanhhientai
        }, function(data) {
            dataSet = JSON.parse(data)
            status = dataSet['status']
            message = dataSet['message']
            alert(message)
            if (status == 'true') {
                location.replace(document.referrer)
            }
        })
    }
</script>