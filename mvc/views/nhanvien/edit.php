<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-pencil-alt"></i>
                    Sửa thông tin nhân viên
                </h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="taikhoan">Tài khoản: <small id="errorTaikhoan" class="text-danger" style="display: inline;"></small></label>
                        <input type="text" class="form-control" id="taikhoan" readonly>
                    </div>
                    <div class="col-lg-6">
                        <label for="matkhau">Mật khẩu:</label>
                        <input type="password" class="form-control" id="matkhau" readonly>
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
                        <input type="email" class="form-control" id="email">
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
                    <div class="col-lg-6">
                        <label for="">Ngày nghỉ:</label>
                        <input type="date" class="form-control" id="ngaynghi">
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
                    <div class="col-lg-9">

                    </div>
                    <div class="col-lg-3" id="">
                        <button id="addNhanvien" class="btn btn-lg btn-primary" onclick="updateNhanvien()">
                            <i class="fas fa-pencil-alt"></i>
                            Lưu</button>
                        <button class="btn btn-lg btn-secondary" onclick="closeForm()">
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
    var idnhanvien = <?= $_GET['idnhanvien'] ?>;
    var linkold
    document.onload = loadNhanvienByIdnhanvien()


    // close view edit nhan vien affter show danh sach nhan vien
    function closeForm() {
        location.replace(document.referrer);
    }
    //
    function updateNhanvien() {
        check = true;
        taikhoan = $('#taikhoan').val()
        matkhau = $('#matkhau').val()
        tennhanvien = $('#tennhanvien').val()
        sodienthoai = $('#sodienthoai').val()
        email = $('#email').val()
        diachi = $('#diachi').val()
        ngayvao = $('#ngayvao').val()
        ngaynghi = $('#ngaynghi').val()
        chucvu = $('#chucvu').val()
        ghichu = $('#ghichu').val()
        if (taikhoan.length < 8 || taikhoan.length > 50) {
            check = false;
            $('#taikhoan').focus();
            alert("Tài khoản không được ít hơn 8 ký tự hoặc nhiều hơn 50 ký tự !");
        }
        if ((matkhau.length < 8 || matkhau.length > 50) && check == true) {
            check = false;
            $('#matkhau').focus();
            alert("Mật khẩu không được ít hơn 8 ký tự hoặc nhiều hơn 50 ký tự !");
        }
        if ((tennhanvien.length < 2 || tennhanvien.length > 50) && check == true) {
            check = false;
            $('#tennhanvien').focus();
            alert("Tên nhân viên không được ít hơn 2 ký tự hoặc nhiều hơn 50 ký tự !");
        }
        if ((sodienthoai.length != 10) && check == true) {
            check = false;
            $('#sodienthoai').focus();
            alert("Số điện thoại phải là 10 số !");
        }
        if ((email.length < 8 || email.length > 50) && check == true) {
            check = false;
            $('#email').focus();
            alert("Email không được ít hơn 8 ký tự hoặc nhiều hơn 50 ký tự !");
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
        if (checkNumber(sodienthoai) === null && check == true) {
            check = false;
            alert("Vui lòng nhập đúng định sạng số điện thoại");
        }
        if (checkTypeChar(taikhoan) === null && check == true) {
            $('#taikhoan').focus();
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
            if (matkhauhientai !== matkhau) {
                $('#matkhauhientai').val("");
                $('#sodienthoai').focus();
            } else {
                doUpdateNhanvien();
            }
        }
    }
    // close dialog
    function closeDialog() {
        $("#dialogMatkhauhientai").dialog('close');
    }
    // check mat khau hien tai
    function checkMatkhau() {
        taikhoan = $('#taikhoan').val();
        matkhau = $('#matkhauhientai').val();
        $.post("ajax.php?controller=cnhanvien&action=getNhanvienByTaikhoanAndMatkhau", {
            taikhoan: taikhoan,
            matkhau: matkhau
        }, function(data) {
            nhanvien = JSON.parse(data);
            if (nhanvien.length == 1) {
                doUpdateNhanvien();
            } else {
                alert("Mật khẩu hiện tại không đúng");
            }
        })
    }
    // load infor nhan vien on form edit nhan vien by id nhan vien
    function loadNhanvienByIdnhanvien() {
        $('#tamp').remove()
        $('#showhinhanh').append('<div id="tamp"></div>')
        $.post("ajax.php?controller=cnhanvien&action=getNhanvienByIdnhanvien", {
            idnhanvien: idnhanvien
        }, function(data) {
            nhanvien = JSON.parse(data);
            nv = nhanvien[0];
            matkhauhientai = nv['matkhau'];
            $('#taikhoan').val(nv['taikhoan'])
            $('#matkhau').val(nv['matkhau'])
            $('#tennhanvien').val(nv['tennhanvien'])
            $('#sodienthoai').val(nv['sodienthoai'])
            $('#email').val(nv['email'])
            $('#diachi').val(nv['diachi'])
            $('#ngayvao').val(nv['ngayvao'])
            $('#ngaynghi').val(nv['ngaynghi'])
            $('#chucvu').val(nv['chucvu'])
            $('#ghichu').val(nv['ghichu'])
            hinhanh = nv['hinhanh']
            linkold = hinhanh
            path = "/cuahangxehoi/public/img/nhanvien/"
            if (hinhanh != null && hinhanh.length > 0) {
                $('#tamp').append('<button id="tamp-hinhanh"><img id="img" src="' + path + hinhanh + '" alt=""></button>');
            } else {
                $('#tamp').append('<button id="tamp-hinhanh"><img id="img" src="' + path + 'nhanvien.png" alt=""></button>');
            }
        })
    }
    // alert khi nguoi dung click vao truong input tai khoan
    function clicktaikhoan() {
        alert("Không thể sửa trường tài khoản !");
    }
    // update infor nhan vien
    function doUpdateNhanvien() {
        taikhoan = $('#taikhoan').val()
        matkhau = $('#matkhau').val()
        tennhanvien = $('#tennhanvien').val()
        sodienthoai = $('#sodienthoai').val()
        email = $('#email').val()
        diachi = $('#diachi').val()
        ngayvao = $('#ngayvao').val()
        ngaynghi = $('#ngaynghi').val()
        chucvu = $('#chucvu').val()
        ghichu = $('#ghichu').val()
        hinhanh = $('#hinhanh').get(0).files
        if (hinhanh.length > 0) {
            link = uploadFile(hinhanh, "nhanvien")[0]
        } else {
            link = linkold
        }
        $.post('ajax.php?controller=cnhanvien&action=updateNhanvienByIdnhanvien', {
            idnhanvien: idnhanvien,
            taikhoan: taikhoan,
            matkhau: matkhau,
            tennhanvien: tennhanvien,
            sodienthoai: sodienthoai,
            email: email,
            diachi: diachi,
            ngayvao: ngayvao,
            ngaynghi: ngaynghi,
            chucvu: chucvu,
            ghichu: ghichu,
            hinhanh: link,
            linkold: linkold
        }, function(data) {
            if (data > 0) {
                alert("Cập nhật thành công")
                closeForm()
            } else {
                alert("Cập nhật thất bại");
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