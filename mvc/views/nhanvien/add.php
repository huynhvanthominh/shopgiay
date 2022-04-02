<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-user-plus"></i>
                    Thêm nhân viên
                </h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="taikhoan">Tài khoản: <small id="errorTaikhoan" class="text-danger" style="display: inline;"></small></label>
                        <input type="text" class="form-control" id="taikhoan">
                    </div>
                    <div class="col-lg-6">
                        <label for="matkhau">Mật khẩu:</label>
                        <input type="password" class="form-control" id="matkhau">
                    </div>
                </div>
                <!--  -->
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="">Tên nhân viên:</label>
                        <input type="text" class="form-control" id="tennhanvien">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Số điện thoại:</label>
                        <input type="text" class="form-control" id="sodienthoai">
                    </div>
                </div>
                <!--  -->
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="">Email:</label>
                        <input type="text" class="form-control" id="email">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Địa chỉ:</label>
                        <input type="text" class="form-control" id="diachi">
                    </div>
                </div>
                <!--  -->
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="">Ngày vào:</label>
                        <input type="date" class="form-control" id="ngayvao">
                    </div>
                </div>
                <!--  -->
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="">Chức vụ:</label>
                        <select class="form-control" name="" id="chucvu">
                            <option value="Nhân viên">Nhân viên</option>
                            <option value="Quản lý">Quản lý</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Ghi chú:</label>
                        <input type="text" class="form-control" id="ghichu">
                    </div>
                </div>
                <!--  -->
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="hinhanh">Hình ảnh:</label>
                        <input type="file" class="form-control-file" id="hinhanh" onchange="showTamp()">
                    </div>
                    <div class="col-lg-6" id="showhinhanh">
                    </div>
                </div>
                <!--  -->
                <div class="form-group row">
                    <div class="col-lg-8">
                        <!--  -->
                    </div>
                    <div class="col-lg-4" id="">
                        <button id="addNhanvien" class="btn btn-lg btn-primary" onclick="checkInput()">
                            <i class="fas fa-user-plus"></i>
                            Thêm</button>
                        <button class="btn btn-lg btn-secondary" onclick="closeAddNhanvien()">
                            <i class="fas fa-times"></i>
                            Thoát</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--  -->

<script>
    index('taikhoan')
    taikhoan = $('#taikhoan')
    sodienthoai = $('#sodienthoai')
    matkhau = $('#matkhau')
    email = $('email')
    // check taikhoan
    taikhoan.keypress(function(event) {
        key = event.keyCode || event.witch
        if (key !== 13) {
            key = String.fromCharCode(key)
            if (checkTypeChar(key) == null) {
                event.preventDefault()
                alert("Không được nhập ký tự đặc biệt!\nChỉ bao gồm các ký tự trong khoảng [A-Z], [a-z], [0-9] hoặc \"@\", \".\", \"&\"")
            }
        }

    })
    taikhoan.change(function() {
        $(this).keyup(function(event) {
            if (event.keyCode === 13) {
                event.preventDefault()
                checkInput()
            }
        })
        taikhoan = $('#taikhoan').val();

        $.post("ajax.php?controller=cnhanvien&action=getNhanvienByTaiKhoan", {
            taikhoan: taikhoan
        }, function(data) {
            nhanvien = JSON.parse(data);
            if (nhanvien.length > 0) {
                document.getElementById('errorTaikhoan').innerHTML = "Đã tồn tại";
                // document.getElementById('addNhanvien').disabled = true;
            } else {
                document.getElementById('errorTaikhoan').innerHTML = "";
                // document.getElementById('addNhanvien').disabled = false;                
            }
        })
    })
    // mat khau
    matkhau.change(function() {
        $(this).keyup(function(event) {
            if (event.keyCode === 13) {
                event.preventDefault()
                checkInput()
            }
        })
        key = event.keyCode || event.witch
        key = String.fromCharCode(key)
        if (checkTypeChar(key) == null) {
            event.preventDefault()
        }
    })
    //check so dien thoai
    sodienthoai.keypress(function(event) {
        $(this).keyup(function(event) {
            if (event.keyCode === 13) {
                event.preventDefault()
                checkInput()
            }
        })
        key = event.keyCode || event.witch
        if (key !== 13) {
            key = String.fromCharCode(key)
            if (checkNumber(key) == null) {
                alert("Chỉ nhập được các ký tự là số trong khoản [0-9]")
                event.preventDefault()
            }
        }
    })
    // close view edit nhan vien affter show danh sach nhan vien
    function closeAddNhanvien() {
        location.replace(document.referrer);
    }
    // check input
    function checkInput() {
        errorTaikhoan = document.getElementById('errorTaikhoan').innerHTML;
        if (errorTaikhoan.length == 0) {
            check = true;
            taikhoan = $('#taikhoan').val()
            matkhau = $('#matkhau').val()
            tennhanvien = $('#tennhanvien').val()
            sodienthoai = $('#sodienthoai').val()
            email = $('#email').val()
            diachi = $('#diachi').val()
            chucvu = $('#chucvu').val()
            ghichu = $('#ghichu').val()
            if (taikhoan.length < 8 || taikhoan.length > 30) {
                check = false;
                $('#taikhoan').focus();
                alert("Tài khoản không được ít hơn 8 ký tự hoặc nhiều hơn 30 ký tự !");
            }
            if ((matkhau.length < 8 || matkhau.length > 30) && check == true) {
                check = false;
                $('#matkhau').focus();
                alert("Mật khẩu không được ít hơn 8 ký tự hoặc nhiều hơn 30 ký tự !");
            }
            if ((tennhanvien.length < 2 || tennhanvien.length > 30) && check == true) {
                check = false;
                $('#tennhanvien').focus();
                alert("Tên nhân viên không được ít hơn 2 ký tự hoặc nhiều hơn 30 ký tự !");
            }
            if ((sodienthoai.length != 10) && check == true) {
                check = false;
                $('#sodienthoai').focus();
                alert("Số điện thoại phải là 10 số !");
            }
            if ((email.length < 8 || email.length > 30) && check == true) {
                check = false;
                $('#email').focus();
                alert("Email không được ít hơn 8 ký tự hoặc nhiều hơn 30 ký tự !");
            }
            if ((diachi.length < 6 || diachi.length > 50) && check == true) {
                check = false;
                $('#diachi').focus();
                alert("Địa chỉ không được ít hơn 6 ký tự hoặc nhiều hơn 50 ký tự !");
            }
            if ((ghichu.length > 50) && check == true) {
                check = false;
                $('#ghichu').focus();
                alert("Ghi chú không được nhiều hơn 50 ký tự !");
            }
            if (checkTypeChar(taikhoan) === null && check == true) {
                $('#taikhoan').focus();
                check = false;
                alert("Vui lòng không nhập ký  tự đặc biệt hoặc gõ có dấu");
            }
            if (checkTypeChar(matkhau) === null && check == true) {
                $('#matkhau').focus();
                check = false;
                alert("Vui lòng nhập không dấu");
            }
            if (checkNumber(sodienthoai) === null && check == true) {
                $('#sodienthoai').focus();
                check = false;
                alert("Vui lòng nhập đúng định sạng số điện thoại");
            }
            if (checkEmail(email) === null && check == true) {
                $('#email').focus();
                check = false;
                alert("Vui lòng nhập đúng định dạng mail");
            }
            if (check == true) {
                addNhanvien();
            }
        } else {
            alert("Tài khoản đã tồn tại !");
        }
    }
    // add nhan vien
    function addNhanvien() {
        taikhoan = $('#taikhoan').val()
        matkhau = $('#matkhau').val()
        tennhanvien = $('#tennhanvien').val()
        sodienthoai = $('#sodienthoai').val()
        email = $('#email').val()
        diachi = $('#diachi').val()
        ngayvao = $('#ngayvao').val()
        chucvu = $('#chucvu').val()
        ghichu = $('#ghichu').val()
        hinhanh = $('#hinhanh').get(0).files;
        link = uploadFile(hinhanh, "nhanvien")[0]
        $.post('ajax.php?controller=cnhanvien&action=addNhanvien', {
            taikhoan: taikhoan,
            matkhau: matkhau,
            tennhanvien: tennhanvien,
            sodienthoai: sodienthoai,
            email: email,
            diachi: diachi,
            ngayvao: ngayvao,
            chucvu: chucvu,
            ghichu: ghichu,
            hinhanh: link
        }, function(data) {
            if (data > 0) {
                alert("Thêm thành công");
                closeAddNhanvien();
            } else {
                alert("Thêm thất bại");
                alert(data);
            }
        })

    }
    //show tamp img
    function showTamp() {
        $('#tamp').remove()
        $('#showhinhanh').append('<div id="tamp"></div>')
        hinhanh = $('#hinhanh').get(0).files
        for (i = 0; i < hinhanh.length; i++) {
            read = new FileReader()
            read.onload = function(e) {
                src = e.target.result
                $('#tamp').append('<button id="tamp-hinhanh"><img src="' + src + '" alt=""></button>');
            }
            read.readAsDataURL(hinhanh[i])
        }
    }
</script>