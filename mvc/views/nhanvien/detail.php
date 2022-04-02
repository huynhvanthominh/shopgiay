<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-eye"></i>
                    Thông tin nhân viên
                </h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="taikhoan">Tài khoản: <small id="errorTaikhoan" class="text-danger" style="display: inline;"></small></label>
                        <input readonly type="text" class="form-control" id="taikhoan">
                    </div>
                    <div class="col-lg-6">
                        <label for="matkhau">Mật khẩu:</label>
                        <input readonly type="password" class="form-control" id="matkhau">
                    </div>
                </div>
                <!--  -->
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="">Tên nhân viên:</label>
                        <input readonly type="text" class="form-control" id="tennhanvien">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Số điện thoại:</label>
                        <input readonly type="text" class="form-control" id="sodienthoai">
                    </div>
                </div>
                <!--  -->
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="">Email:</label>
                        <input readonly type="text" class="form-control" id="email">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Địa chỉ:</label>
                        <input readonly type="text" class="form-control" id="diachi">
                    </div>
                </div>
                <!--  -->
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="ngayvao">Ngày vào:</label>
                        <input readonly type="date" class="form-control" id="ngayvao">
                    </div>
                    <div class="col-lg-6" id="clngaynghi">
                        <label for="ngaynghi">Ngày nghỉ:</label>
                        <input readonly type="date" class="form-control" id="ngaynghi">
                    </div>
                </div>
                <!--  -->
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="chucvu">Chức vụ:</label>
                        <select class="form-control" id="chucvu" disabled>
                            <option value="Nhân viên">Nhân viên</option>
                            <option value="Quản lý">Quản lý</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="ghichu">Ghi chú:</label>
                        <input readonly type="text" class="form-control" id="ghichu">
                    </div>
                </div>
                <!--  -->
                <div class="form-group row">
                    <div class="col-lg-10" id="showhinhanh">
                    </div>
                    <div class="col-lg-2">
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
    document.onload = loadNhanvienByIdnhanvien();

    // close view edit nhan vien affter show danh sach nhan vien
    function closeForm() {
        location.replace("?controller=cnhanvien&action=list");
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
            $('#taikhoan').val(nv['taikhoan'])
            $('#matkhau').val(nv['matkhau'])
            $('#tennhanvien').val(nv['tennhanvien'])
            $('#sodienthoai').val(nv['sodienthoai'])
            $('#email').val(nv['email'])
            $('#diachi').val(nv['diachi'])
            $('#ngayvao').val(nv['ngayvao'])
            if ('0000-00-00' == nv['ngaynghi']) {
                document.getElementById('clngaynghi').style.display = 'none';
            } else {
                $('#ngaynghi').val(nv['ngaynghi'])
            }

            $('#chucvu').val(nv['chucvu'])
            $('#ghichu').val(nv['ghichu'])
            path = "/cuahangxehoi/public/img/nhanvien/"
            hinhanh = nv['hinhanh']
            if (hinhanh != null && hinhanh.length > 0) {
                $('#tamp').append('<button id="tamp-hinhanh"><img id="img" src="' + path + hinhanh + '" alt=""></button>');
            } else {
                $('#tamp').append('<button id="tamp-hinhanh"><img id="img" src="' + path + 'nhanvien.png" alt=""></button>');
            }
        })
    }
</script>