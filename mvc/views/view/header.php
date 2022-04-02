<?php
if (session_status() != 2) {
    session_start();
}
if (isset($_SESSION['nguoidung'])) {
    if ((time() - $_SESSION['nguoidung']['time']) > 3600 * 24) {
        session_destroy();
    } else {
        $idnguoidung = $_SESSION['nguoidung']['idnguoidung'];
        $sodienthoai = base64_encode($_SESSION['nguoidung']['sodienthoai']);
        $tenhienthi = $_SESSION['nguoidung']['tenhienthi'];
        $email = $_SESSION['nguoidung']['email'];
        $diachi = $_SESSION['nguoidung']['diachi'];
        $loainguoidung = $_SESSION['nguoidung']['loainguoidung'];
        $hinhanh = $_SESSION['nguoidung']['hinhanh'];
        if (isset($_SESSION['shop'])) {
            $idshop = $_SESSION['shop']['idshop'];
            $tenshop = $_SESSION['shop']['tenshop'];
        }
    }
}
?>
<link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="./public/css/sb-admin-2.min.css" rel="stylesheet">
<link rel="stylesheet" href="./public/css/style.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="./public/css/styles.css" rel="stylesheet" />
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<!--  -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="./vendor/moment/moment/moment.js"></script>
<script src="./public/js/js.js"></script>
<script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./public/js/sb-admin-2.min.js"></script>
<script src="./public/js/sb-admin-2.js"></script>
<!--  -->
<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" id="header">
    <div class="container">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" title="Trang chủ" href="index.php"><img src="./public/img/logo.png" class="img-responsive" alt="" height="50"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="giohang">
                        <i class="fas fa-shopping-cart"></i>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger badge-counter" id="num-giohang"></span>
                    </a>
                </li>
                <!--  -->
                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline small" id='tenhienthinguoidung'>
                            <!--  -->
                        </span>
                        <img class="img-profile rounded-circle" src="" id="hinhanhnguoidung">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="manager.php" id="btnQuanly">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Quản lý
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)" id="btnShop">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Shop cá nhân
                        </a>
                        <a class="dropdown-item" href="?controller=cview&action=lichsumuahang" id="btnShop">
                            <i class="fas fa-history fa-sm fa-fw mr-2 text-gray-400"></i>
                            Lịch sử mua hàng
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)" id='thongtincanhan'>
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Thông tin cá nhân
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)" id="doimatkhau">
                            <i class="fas fa-hashtag fa-sm fa-fw mr-2 text-gray-400"></i>
                            Đổi mật khẩu
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Đăng xuất
                        </a>
                    </div>
                </li>
            </ul>
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-body" id="exampleModalLabel">SHOP GIÀY</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body text-body">Có chắc muốn đăng xuất?</div>
                        <div class="modal-footer">
                            <a class="btn btn-primary" href="logout.php">Đồng ý</a>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Trở lại</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- form gio hang -->
<div id="formGiohang" class="row">
    <div class="col-lg-12">
        <table class="display w-100" id="tb_giohang"></table>
    </div>
    <hr>
    <div class="input-group px-2 py-2">
        <span class="input-group-text font-weight-bold">Họ tên người nhận:</span>
        <input type="text" class="form-control" id="hotennguoinhan" readonly>
        <span class="input-group-text font-weight-bold">Số điện thoại người nhận:</span>
        <input type="text" class="form-control" id="sodienthoainguoinhan">
    </div>
    <div class="input-group px-2 py-2">
        <span class="input-group-text font-weight-bold">Địa chỉ nhận hàng:</span>
        <select class="form-control" id="diachinhanhang">
            <!--  -->
        </select>
    </div>
    <div class="input-group px-2 py-2">
        <span class="input-group-text font-weight-bold">Phương thức thanh toán:</span>
        <select name="" id="phuongthucthanhtoan">
            <option value="tm" selected>Thanh toán khi nhận hàng</option>
            <option value="ol">Thanh toán bằng thẻ ngân hàng</option>
        </select>
        <span class="input-group-text font-weight-bold" id="inputGroup-sizing-default">Tổng tiền:</span>
        <input type="text" class="form-control text-right" readonly aria-label="Default" aria-describedby="inputGroup-sizing-default" id="tongtien">
    </div>
    <hr>
    <div class="col-12 my-2">
        <nav class="nav justify-content-end">
            <button class="btn btn-outline-success mx-1 my-2 my-sm-0" type="button" id="btnThanhtoangiohang">Thanh toán</button>
            <button class="btn btn-outline-secondary mx-1 my-2 my-sm-0" type="button" id="btnThoatgiohang">Thoát</button>
        </nav>
    </div>
</div>

<!-- form doi mat khau -->


<div class="row" id="dialog-doimatkhau">
    <div class="card w-100 px-4">
        <input type="password" class="form-control my-2 " id="matkhauhientai" placeholder="Mật khẩu hiện tại..." autofocus>
        <input type="password" class="form-control my-2 " id="matkhaumoi" placeholder="Mật khẩu mới...">
        <input type="password" class="form-control my-2 " id="nhaplai" placeholder="Nhập lại mật khẩu mới...">
        <div class="col-12 nav justify-content-end">
            <button class="btn btn-primary my-2" id="luu">
                <i class="fas fa-save"></i>
                Lưu
            </button>
            <button class="btn btn-secondary my-2 mx-1" id="thoat">
                <i class="fas fa-times"></i>
                Thoát
            </button>
        </div>
    </div>
</div>


<!-- Thong tin ca nhan -->
<div class="row" id="dialog-thongtincanhan">
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
                                <label for="">Email: <span class="text-danger" id="erroremail">*</span></label>
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
                        <button class="w-100 btn btn-primary" id="btnLuu">
                            <i class="fas fa-save"></i>
                            Lưu
                        </button>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-md-6 col-6 my-1">
                        <button class="w-100 btn btn-secondary" id="btnThoat">
                            <i class="fas fa-times"></i>
                            Thoát
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->
<script>
    //
    var tenhienthi = ''
    var sodienthoai = ''
    var email = ''
    var diachi = ''
    var hinhanh = ''
    var idgiohang = -999
    var arrayidsanpham = []
    var arraygiasanpham = []
    var arraysoluong = []
    var arraythanhtien = []
    var arrayidshop = []
    var arrayidsizegiay = []
    // 
    $(document).ready(function() {
        loainguoidung = `<?= isset($loainguoidung) ? $loainguoidung : 0 ?>`
        if (loainguoidung === 'kh') {
            document.getElementById('btnQuanly').style.display = 'none'
            $('#btnQuanly').attr('href', "javascript:void(0)")
        }
        $('#userDropdown').click(function() {
            if (loainguoidung == 0) {
                $('#userDropdown').attr('href', 'logout.php')
            } else {
                $('#userDropdown').attr('data-toggle', "dropdown")
            }
        })
        sodienthoai = `<?= isset($sodienthoai) ? base64_decode($sodienthoai) : -999 ?>`
        if (sodienthoai != '-999') {
            tenhienthi = `<?= isset($tenhienthi) ? $tenhienthi : "Đăng nhập" ?>`
            email = `<?= isset($email) ? $email : null ?>`
            diachi = `<?= isset($diachi) ? $diachi : null ?>`
            hinhanh = `<?= isset($hinhanh) ? $hinhanh : null ?>`
            $('#thongtincanhan').click(function() {
                loadThongtincanhan()
                dialog_thongtincanhan.dialog('open')
            })
        }
        //
        $('#doimatkhau').click(function() {
            dialog_doimatkhau.dialog('open')
        })
        //
        tenhienthi = `<?= isset($tenhienthi) ? $tenhienthi : "Đăng nhập" ?>`
        $('#tenhienthinguoidung').text(tenhienthi)
        //
        hinhanh = hinhanh.length > 0 ? hinhanh : 'nguoidung.png'
        $('#hinhanhnguoidung').attr('src', path_img_nguoidung + hinhanh)
        //
    })
    //
    btnShop = $('#btnShop')
    btnShop.click(function() {
        tenshop = `<?= isset($_SESSION['shop']) ? 1 : -1 ?>`
        if (tenshop != `1`) {
            nguoidung = `<?= isset($idnguoidung) ? $idnguoidung : 0 ?>`
            $.post(urlPost('cshop', 'getShopByNguoidung'), {
                nguoidung: nguoidung
            }, function(data) {
                dataSet = JSON.parse(data)
                shop = dataSet['data']
                if (shop.length > 0) {
                    location.replace('shop.php')
                } else {
                    location.replace('?controller=cview&action=addShop');
                }
            })
        } else {
            location.replace('shop.php')
        }
    })
    //
    dialog_doimatkhau = $('#dialog-doimatkhau').dialog({
        autoOpen: false,
        width: '300',
        modal: true,
        title: "Đổi mật khẩu"
    })
    $('#dialog-doimatkhau #thoat').click(function() {
        dialog_doimatkhau.dialog('close')
    })
    $('#dialog-doimatkhau #luu').click(function() {
        let matkhauhientai = $('#dialog-doimatkhau #matkhauhientai').val()
        let matkhaumoi = $('#dialog-doimatkhau #matkhaumoi').val()
        let nhaplai = $('#dialog-doimatkhau #nhaplai').val()
        if (nhaplai != matkhaumoi) {
            alert("Nhập lại mật khẩu mới không trùng khớp!")
            $('#dialog-doimatkhau #nhaplai').focus()
        } else {
            $.post(urlPost('cnguoidung', 'doimatkhau'), {
                matkhauhientai: matkhauhientai,
                matkhaumoi: matkhaumoi
            }, function(data) {
                let dataSet = JSON.parse(data)
                let status = dataSet['status']
                let message = dataSet['message']
                alert(message)
                if (status == true) {
                    dialog_doimatkhau.dialog('close')
                }
            })
        }
    })
    //
    //========================== Giỏ hàng
    //
    function refreshGiohang() {
        tongtien = 0
        row = 0
        arrayidsanpham = []
        arraygiasanpham = []
        arraysoluong = []
        arraythanhtien = []
        arraytonkho = []
        arraytonkho = []
        arrayidshop = []
        arrayidsizegiay = []
        row = $('.row-thanhtien').length
        $('.row-idsizegiay').each(function() {
            let idsizegiay = $(this).data('idsizegiay')
            arrayidsizegiay.push(idsizegiay)
        })
        $('.row-idgiohang').each(function() {
            idgiohang = $(this).data('idgiohang')
            idsanpham = $('#tensanpham-' + idgiohang).data('id')
            let idshop = $(this).data('idshop')
            arrayidshop.push(idshop)
            arrayidsanpham.push(idsanpham)
        })
        $('.row-tonkho').each(function() {
            arraytonkho.push($(this).data('tonkho'))
        })
        $('.row-soluong').each(function() {
            arraysoluong.push($(this).val())
        })
        $('.row-giasanpham').each(function() {
            arraygiasanpham.push($(this).text().trim())
        })
        $('.row-thanhtien').each(function() {
            arraythanhtien.push($(this).data('tongtien'))
            tongtien += parseInt($(this).data('tongtien'))
        })
        if (row > 5) {
            $('#num-giohang').text(row + "+")
        } else {
            $('#num-giohang').text(row)
        }
        $('#tongtien').val(formatTien(tongtien) + " VNĐ")
    }
    //check val
    function checkVal(e, idgiohang, tonkho) {
        if (e.type === "paste") {
            var key = e.clipboardData.getData('text/plain')
        } else {
            var key = e.keyCode || e.which
            key = String.fromCharCode(key)
        }
        if (checkNumber(key) == null) {
            e.returnValue = false
            if (e.prevenDefault) {
                e.prevenDefault()
            }
        } else {
            $('#soluong-' + idgiohang).keyup(function(event) {
                if (event.type === "paste") {
                    var key = event.clipboardData.getData('text/plain')
                } else {
                    var key = event.keyCode || event.which
                    if (key === 13) {
                        returnVal(idgiohang, tonkho)
                    }
                }
            })
            idsanpham = $('#tensanpham-' + idgiohang).data('id')
            giasanpham = $('#giasanpham-' + idgiohang).text()
            if ($('#soluong-' + idgiohang).val() > tonkho) {
                $('#soluong-' + idgiohang).val(tonkho)
                soluong = tonkho
                changeSoluong(idgiohang, idsanpham, soluong, giasanpham)
            }
            if ($('#soluong-' + idgiohang).val() < 1) {
                $('#soluong-' + idgiohang).val(1)
                soluong = 1
                changeSoluong(idgiohang, soluong, giasanpham)
            }
        }
    }
    //
    function returnVal(idgiohang, tonkho) {
        soluong = $('#soluong-' + idgiohang).val()
        if (soluong < 1) {
            $('#soluong-' + idgiohang).val(1)
        }
        if (soluong > tonkho) {
            $('#soluong-' + idgiohang).val(tonkho)
        }
        idsanpham = $('#tensanpham-' + idgiohang).data('id')
        giasanpham = $('#giasanpham-' + idgiohang).text()
        soluong = $('#soluong-' + idgiohang).val()
        changeSoluong(idgiohang, soluong, giasanpham)
    }

    function changeSoluong(idgiohang, soluong, giasanpham) {
        $.post(urlPost('cgiohang', 'updateGiohangByIdgiohang'), {
            idgiohang: idgiohang,
            soluong: soluong,
            giasanpham: giasanpham
        }, function(data) {
            dataSet = JSON.parse(data)
            status = dataSet['status']
            message = dataSet['message']
            if ('true' == status) {
                tb_giohang.ajax.reload()
            } else {
                alert(message)
            }

        })
    }
    //
    function giamsoluong(row) {
        idgiohang = row.data('minus')
        tr = row.closest('tr')
        cthd = tb_giohang.row(tr).data()
        giasanpham = cthd['giasanpham']
        idsanpham = cthd['idsanpham']
        minus = $('#soluong-' + idgiohang)
        let soluong = minus.val()
        if (soluong > 1) {
            soluong--
            minus.val(soluong)
            changeSoluong(idgiohang, soluong, giasanpham)
        }
    }
    //
    function tangsoluong(row) {
        tonkho = row.data('tonkho')
        idgiohang = row.data('plus')
        tr = row.closest('tr')
        cthd = tb_giohang.row(tr).data()
        giasanpham = cthd['giasanpham']
        idsanpham = cthd['idsanpham']
        plus = $('#soluong-' + idgiohang)
        let soluong = plus.val()
        if (soluong < tonkho) {
            soluong++
            plus.val(soluong)
            changeSoluong(idgiohang, soluong, giasanpham)
        } else {
            alert("Vượt quá số lượng tồn kho!")
        }
    }
    //
    function deleteChitiethoadonByidgiohang(row) {
        idgiohang = row.data('idgiohang')
        tr = row.closest('tr')
        tensanpham = tr.find('td:nth-child(2)').text().trim()
        choice = confirm(`Có chắc muốn xóa "${tensanpham}" ra khỏi giỏ hàng?`)
        if (choice) {
            $.post(urlPost('cgiohang', 'deleteGiohangByIdgiohang'), {
                idgiohang: idgiohang
            }, function(data) {
                dataSet = JSON.parse(data)
                status = dataSet['status']
                message = dataSet['message']
                alert(message)
                if (status == 'true') {
                    tb_giohang.ajax.reload()
                }
            })
        }
    }
    //
    tb_giohang = $('#tb_giohang').DataTable({
        autoWidth: true,
        drawCallback: function() {
            $('button[data-minus]').click(function() {
                giamsoluong($(this))
            })
            $('button[data-plus]').click(function() {
                tangsoluong($(this))
            })
            $('a[data-idgiohang]').click(function() {
                deleteChitiethoadonByidgiohang($(this))
            })
            refreshGiohang()
        },
        initComplete: refreshGiohang,
        columns: [{
                title: 'Hình ảnh',
                data: 'hinhanh',
                orderable: false,
                sClass: 'tb-img',
                render: function(data, type, row, meta) {
                    return `<img src="${path_img_sanpham + data}" alt="">`
                }
            },
            {
                title: 'Tên sản phẩm',
                data: 'tensanpham',
                render: function(data, type, row, meta) {
                    return `<p class="row-idsanpham" id="tensanpham-${row['idgiohang']}" data-id=${row['idsanpham']}>${data}</p>`
                }
            }, {
                title: 'Size giày',
                data: 'size',
                sClass: 'text-center',
                render: function(data, type, row, meta) {
                    return `<p class="row-idsizegiay" data-idsizegiay=${row.idsizegiay}>${data}</p>`
                }
            },
            {
                title: 'Giá thành',
                data: 'giasanpham',
                render: function(data, type, row, meta) {
                    return `<p class="row-giasanpham" id="giasanpham-${row['idgiohang']}">${formatTien(data)}</p>`
                }
            }, {
                title: 'Số lượng',
                data: 'soluong',
                render: function(data, type, row, meta) {
                    return `<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-md btn-secondary" data-minus=${row['idgiohang']}>
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <div class="input-group-prepend">
                                        <input onchange="returnVal(${row['idgiohang']},${row['tonkho']})" onkeypress="checkVal(event, ${row['idgiohang']},${row['tonkho']})" type="text" class="w50px text-center row-soluong" value="${data}" id="soluong-${row['idgiohang']}">
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-md btn-secondary row-tonkho" data-plus=${row['idgiohang']} data-tonkho=${row['tonkho']}>
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>`
                }
            }, {
                title: 'Thành tiền',
                data: 'thanhtien',
                render: function(data, type, row, meta) {
                    return `<p class="row-thanhtien" data-tongtien=${data} id="thanhtien-${row['idgiohang']}">${formatTien(data)}</p>`
                }
            }, {
                title: '',
                data: 'idgiohang',
                orderable: false,
                render: function(data, type, row, meta) {
                    return `
                    <p>
                        <a class="btn btn-lg row-idgiohang" href="javascript:void(0)" data-idgiohang=${row['idgiohang']} data-idshop=${row.idshop}>
                            <i class="fas fa-trash fa-2x text-danger"></i>
                        </a>
                    </p>
                    `
                }

            }
        ],
        ajax: urlPost('cgiohang', 'getGiohangByIdnguoidung')
    })
    formdGiohang = $("#formGiohang").dialog({
        autoOpen: false,
        title: 'Giỏ hàng',
        width: 'auto',
        modal: true
    });
    //
    $('#giohang').on('click', function() {
        formdGiohang.dialog('open')
        refreshGiohang()
        loadDiachinhanhang()
        loadThongtinnhanhang()
    })
    //
    $('#btnThoatgiohang').click(function() {
        formdGiohang.dialog('close')
    })
    //
    $('#btnThanhtoangiohang').click(function() {
        $.post(urlPost('choadon', 'addHoadon'), {
            idsanpham: arrayidsanpham,
            giasanpham: arraygiasanpham,
            soluong: arraysoluong,
            thanhtien: arraythanhtien,
            tonkho: arraytonkho,
            idshop: arrayidshop,
            idsizegiay: arrayidsizegiay,
            hotennguoinhan: $('#hotennguoinhan').val(),
            sodienthoainguoinhan: $('#sodienthoainguoinhan').val(),
            diachinhanhang: $("#diachinhanhang").val(),
            phuongthucthanhtoan: $('#phuongthucthanhtoan').val(),
        }, function(data) {
            dataSet = JSON.parse(data)
            status = dataSet['status']
            message = dataSet['message']
            alert(message)
            if (status == 'true') {
                location.reload()
            }
        })
    })

    //
    function loadThongtinnhanhang() {
        $('#hotennguoinhan').val(tenhienthi)
        $('#sodienthoainguoinhan').val(sodienthoai)
    }
    //
    function loadDiachinhanhang() {

        $.post(urlPost('cdiachinhanhang', 'getDiachinhanhangByIdnguoidung'), {}, function(data) {
            let dataSet = JSON.parse(data)
            diachinhanhang = dataSet['data']
            $('#diachinhanhang option').remove()
            diachinhanhang.forEach(item => {
                $('#diachinhanhang').append(`
                    <option value="${item.iddiachinhanhang}">${item.diachi}</option>
                `)
            })
            $('#diachinhanhang').append(`<option value="-1">Thêm địa chỉ nhận hàng...</option>`)
        })
    }
    $('#diachinhanhang').change(function() {
        if ($(this).val() == -1) {
            let diachi = prompt("Nhập địa chỉ nhận hàng mới:")
            if (diachi.length > 4) {
                $.post(urlPost('cdiachinhanhang', 'addDiachinhanhang'), {
                    diachi: diachi
                }, function(data) {
                    dataSet = JSON.parse(data)
                    status = dataSet['status']
                    message = dataSet['message']
                    if (status == 'true') {
                        loadDiachinhanhang()
                    }
                })
            } else {
                alert("Vui lòng nhập địa chỉ hơn 4 ký tự !")
            }
        }
    })

    //thong tin ca nhan
    $('#dialog-thongtincanhan #btnThoat').click(function() {
        dialog_thongtincanhan.dialog('close')
    })

    function loadThongtincanhan() {
        $('#dialog-thongtincanhan #sodienthoai').val(sodienthoai)
        $('#dialog-thongtincanhan #tenhienthi').val(tenhienthi)
        $('#dialog-thongtincanhan #email').val(email)
        $('#dialog-thongtincanhan #diachi').val(diachi)
        $('#dialog-thongtincanhan #hinhanh').attr('src', path_img_nguoidung + hinhanh)
    }
    dialog_thongtincanhan = $('#dialog-thongtincanhan').dialog({
        autoOpen: false,
        width: 'auto',
        title: "Thông tin cá nhân",
        modal: true
    })
    $('#dialog-thongtincanhan #sodienthoai').change(function() {
        if ($(this).val() != sodienthoai) {
            if ($(this).val().length > 10) {
                $(this).val($(this).val().substr(0, 10))
            }
            if (checkNumber($(this).val()) == null) {
                $(this).val('')
                $('#dialog-thongtincanhan #errorsodienthoai').text("Số điện thoại không được để trống")
            } else {
                $.post(urlPost('cnguoidung', 'getNguoidungBySodienthoai'), {
                    sodienthoai: $('#dialog-thongtincanhan #sodienthoai').val()
                }, function(data) {
                    dataSet = JSON.parse(data)
                    nguoidung = dataSet['data']
                    if (nguoidung.length > 0) {
                        $('#dialog-thongtincanhan #errorsodienthoai').text("Số điện thoại đã tồn tại")
                    } else {
                        $('#dialog-thongtincanhan #errorsodienthoai').text("*")
                    }
                })
            }
        }
    })
    $('#dialog-thongtincanhan #sodienthoai').keypress(function(e) {
        key = String.fromCharCode(e.keyCode)
        if (checkNumber(key) == null) {
            e.preventDefault()
        }
        if ($(this).val().length > 9) {
            e.preventDefault()
        }
    })
    $('#dialog-thongtincanhan #sodienthoai').keyup(function(e) {
        if (e.keyCode == 13) {
            e.preventDefault()
        }
    })
    $('#dialog-thongtincanhan #email').change(function() {
        if (checkEmail($(this).val()) == null) {
            $(this).val('')
            $('#dialog-thongtincanhan #erroremail').text("Không được để trống!")
        }
    })
    $('#dialog-thongtincanhan #email').keyup(function(e) {
        if (checkEmail($(this).val()) == null) {
            $('#dialog-thongtincanhan #erroremail').text("Không đúng định dạng email!")
        } else {
            $('#dialog-thongtincanhan #erroremail').text("*")
        }
    })
    $('#dialog-thongtincanhan #btnHinhanh').click(function() {
        $('#dialog-thongtincanhan #file').click()
    })
    $('#dialog-thongtincanhan #file').change(function(e) {
        if (e.target.files.length > 0) {
            file = e.target.files[0]
            if (/image\/.+/.test(file.type)) {
                if (file.size / 1048576 <= 2) {
                    reader = new FileReader()
                    reader.onload = function(e) {
                        $('#dialog-thongtincanhan #hinhanh').attr('src', e.target.result)
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
    //
    $('#dialog-thongtincanhan #btnLuu').click(function() {
        let check = true

        if (check == true && $('#dialog-thongtincanhan #errorsodienthoai').text().trim() != "*") {
            check = false
            alert($('#dialog-thongtincanhan #errorsodienthoai').text())
            $('#dialog-thongtincanhan #sodienthoai').focus()
        }
        if (check == true && $('#dialog-thongtincanhan #erroremail').text().trim() != "*") {
            check = false
            alert($('#dialog-thongtincanhan #erroremail').text())
            $('#dialog-thongtincanhan #email').focus()
        }
        if (check == true && sodienthoai != '-999') {
            let hinhanhhientai = `<?= isset($_SESSION['nguoidung']['hinhanh']) ? $_SESSION['nguoidung']['hinhanh'] : 'nguoidung.png' ?>`
            let sodienthoaihientai = `<?= isset($_SESSION['nguoidung']['sodienthoai']) ? $_SESSION['nguoidung']['sodienthoai'] : -999 ?>`
            let hinhanh = $('#dialog-thongtincanhan #file').get(0).files.length > 0 ? uploadFile($('#dialog-thongtincanhan #file').get(0).files, 'nguoidung')[0] : hinhanhhientai
            let sodienthoai = $('#dialog-thongtincanhan #sodienthoai').val()
            let tenhienthi = $('#dialog-thongtincanhan #tenhienthi').val()
            let email = $('#dialog-thongtincanhan #email').val()
            let diachi = $('#dialog-thongtincanhan #diachi').val()
            $.post("ajax.php?controller=cnguoidung&action=updateNguoidungBySodienthoai", {
                sodienthoaihientai: sodienthoaihientai,
                sodienthoai: sodienthoai,
                tenhienthi: tenhienthi,
                email: email,
                diachi: diachi,
                hinhanh: hinhanh,
                hinhanhhientai: hinhanhhientai
            }, function(data) {
                dataSet = JSON.parse(data)
                status = dataSet['status']
                message = dataSet['message']
                alert(message)
                if (status == 'true') {
                    dialog_thongtincanhan.dialog('close')
                    $('#tenhienthinguoidung').text(tenhienthi)
                    $('#hinhanhnguoidung').attr('src', path_img_nguoidung + hinhanh)
                }
            })
        }
    })
</script>