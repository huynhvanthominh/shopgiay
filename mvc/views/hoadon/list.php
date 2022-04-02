<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary" id="title">Danh sách hóa đơn</h3>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <table id="tb-hoadon" class="display nowrap"></table>
            </div>
        </div>
    </div>
</div>

<!--Form chi tiet hoa don  -->
<div id="dialog-chitiethoadon">
    <div class="row my-4 mx-4">
        <div class="col-md-6 my-2">
            <label for="">Ngày tạo hóa đơn</label>
            <input type="text" class="form-control" id="ngaytaohoadon">
        </div>
        <div class="col-md-6 my-2">
            <label for="">Ngày hoàn tất</label>
            <input type="text" class="form-control" id="ngaythanhtoanhoadon">
        </div>
        <div class="col-md-6 my-2">
            <label for="">Họ tên người nhận</label>
            <input type="text" class="form-control" id="hotennguoinhan">
        </div>
        <div class="col-md-6 my-2">
            <label for="">Số điện thoại người nhận</label>
            <input type="text" class="form-control" id="sodienthoainguoinhan">
        </div>
        <div class="col-md-6 my-2">
            <label for="">Địa chỉ nhận hàng</label>
            <input type="text" class="form-control" id="diachinhanhang">
        </div>
        <div class="col-md-6 my-2">
            <label for="">Phương thức thanh toán</label>
            <input type="text" class="form-control" id="phuongthucthanhtoan">
        </div>
        <div class="col-md-6 my-2">
            <label for="">Trạng thái</label>
            <input type="text" class="form-control" id="trangthai">
        </div>
        <div class="col-md-6 my-2">
            <label for="">Tổng tiền</label>
            <input type="text" class="form-control" id="tongtien">
        </div>
        <hr>
    </div>
    <hr class="d-block my-4">
    <div class="row mx-2 my-3">
        <div class="col-12">
            <table id="tb-chitiethoadon" class="display"></table>
        </div>
    </div>
    <hr>
    <div class="row my-2 mx-2">
        <div class="col-12 nav justify-content-end">
            <button class="btn btn-secondary" id="thoat">
                <i class="fas fa-times"></i>
                Thoát
            </button>
        </div>
    </div>
</div>
<!--  -->
<script>
    var idhoadon = ''
    var controller = "choadon"
    var check_capnhattrangthai = true
    var check_huyhoadon = true
    var action = getValUrl('action')
    if (action == 'listHoadonChuahoantat') {
        action = 'getHoadonChuahoantatByIdshop'
        $('#title').text("Danh sách hóa đơn chưa hoàn thành")
    } else if (action == "lichsumuahang") {
        $('#title').text("Lịch sử mua hàng")
        action = "getHoadonByIdnguoidung"
        check_huyhoadon = false
        check_capnhattrangthai = false
    } else {
        action = 'getHoadonHoantatByIdshop'
        check_capnhattrangthai = false
        check_huyhoadon = false
        $('#title').text("Danh sách hóa đơn đã hoàn thành")
    }
    //
    tb_hoadon = $('#tb-hoadon').DataTable({
        autoWidth: true,
        drawCallback: function() {
            $('#tb-hoadon a[data-delete]').click(function() {
                let idhoadon = $(this).data('delete')
                let trangthai = $(this).data('trangthai')
                if (trangthai > 0) {
                    alert("Đang giao hàng, nên không được phép hủy !")
                } else {
                    choice = confirm("Có chắc muốn hủy hóa đơn này?")
                    if (choice) {
                        let trangthai = -2
                        updateTrangthaiHoadon(idhoadon, trangthai)
                    }
                }
            })
            $('#tb-hoadon a[data-view]').click(function() {
                loadThongtinhoadon($(this))
            })
        },
        columns: [{
                title: 'Ngày tạo hóa đơn',
                data: 'ngaytaohoadon',
                render: data => {
                    return formatDate(data)
                }
            }, {
                title: "Phương thức thanh toán",
                data: "phuongthucthanhtoan",
                render: data => {
                    if (data == 'tm') {
                        return `Tiền mặt`
                    }
                    else if(data == 'ol'){
                        return 'Thanh toán online'
                    }
                }
            }, {
                title: "Tổng tiền",
                data: 'tongtien',
                render:data=>{
                    return formatTien(data) + " VNĐ"
                }
            }, {
                title: "Trạng thái",
                data: 'trangthai',
                render: data => {
                    if (data == 0) {
                        return `Đang xử lý`
                    } else if (data == 1) {
                        return `Đang giao hàng`
                    } else if (data == 2) {
                        return `Đã hoàn tất`
                    }
                }
            }, {
                title: "Cập nhật trạng thái",
                data: 'trangthai',
                sClass: "text-center",
                visible: check_capnhattrangthai,
                orderable: false,
                render: function(data, type, row, meta) {
                    idhoadon = row.idhoadon
                    if (data == 0) {
                        return `
                                <a class="btn btn-primary" onclick="updateTrangthaiHoadon(${row.idhoadon}, ${data})">
                                    <i class="fas fa-pen"></i>
                                    Đã xử lý
                                </a>
                        `
                    } else {
                        return `
                                <a class="btn btn-success" onclick="updateTrangthaiHoadon(${row.idhoadon}, ${data})">
                                    <i class="fas fa-pen"></i>
                                    Đã giao hàng
                                </a>
                        `

                    }
                }
            }, {
                title: "",
                sClass: "text-center",
                orderable: false,
                data: 'idhoadon',
                render: function(data, type, row, meta) {
                    return `
                        <a class="btn btn-success" data-view=${data} data-ngaythanhtoanhoadon=${row.ngaythanhtoanhoadon}>
                                <i class="fas fa-eye"></i>
                                Xem chi tiết
                            </a>`
                }
            }, {
                title: "",
                sClass: "text-center",
                orderable: false,
                data: 'idhoadon',
                visible: check_huyhoadon,
                render: function(data, type, row, meta) {
                    return `
                            <a class="btn btn-danger" data-delete=${data} data-trangthai=${row.trangthai}>
                                <i class="fas fa-trash"></i>
                                Hủy hóa đơn
                            </a>
                            `
                }
            }

        ],
        ajax: urlPost(controller, action)
    })

    function updateTrangthaiHoadon(idhoadon, trangthai) {
        trangthai = parseInt(trangthai) + 1
        $.post(urlPost('choadon', 'updateTrangthaiHoadon'), {
            idhoadon: idhoadon,
            trangthai: trangthai
        }, function(data) {
            dataSet = JSON.parse(data)
            status = dataSet['status']
            message = dataSet['message']
            alert(message)
            if (status == 'true') {
                tb_hoadon.ajax.reload()
            }
        })
    }
    //

    //
    dialog_chitiethoadon = $('#dialog-chitiethoadon').dialog({
        autoOpen: false,
        width: '80%',
        title: "Chi tiết hóa đơn",
        modal: true
    })
    //
    function loadThongtinhoadon(row) {
        idhoadon = row.data('view')
        $.post(urlPost('choadon', 'getHoadonByIdhoadon'), {
            idhoadon: idhoadon
        }, function(data) {
            alert(data)
            dataSet = JSON.parse(data)
            hoadon = dataSet['data']
            hd = hoadon[0]
            $('#dialog-chitiethoadon input').attr('readonly', 'true')
            $('#dialog-chitiethoadon #ngaytaohoadon').val(formatDate(hd.ngaytaohoadon))
            if (hd.ngaythanhtoanhoadon != null) {
                $('#dialog-chitiethoadon #ngaythanhtoanhoadon').val(formatDate(hd.ngaythanhtoanhoadon))
            } else {
                $('#dialog-chitiethoadon #ngaythanhtoanhoadon').val("")
            }
            $('#dialog-chitiethoadon #hotennguoinhan').val(hd.tenhienthi)

            $('#dialog-chitiethoadon #sodienthoainguoinhan').val(hd.sodienthoai)
            $('#dialog-chitiethoadon #diachinhanhang').val(hd.diachi)
            if (hd.phuongthucthanhtoan == 'tm') {
                $('#dialog-chitiethoadon #phuongthucthanhtoan').val("Tiền mặt")
            } else {
                $('#dialog-chitiethoadon #phuongthucthanhtoan').val("Thanh toán online")
            }
            if (hd.trangthai == 0) {
                $('#dialog-chitiethoadon #trangthai').val("Đang xử lý")
            } else if (hd.trangthai == 1) {
                $('#dialog-chitiethoadon #trangthai').val("Đang giao hàng")
            } else {
                $('#dialog-chitiethoadon #trangthai').val("Đã hoàn thành")
            }
            $('#dialog-chitiethoadon #tongtien').val(formatTien(hd.tongtien) + " VNĐ")
        })
        dialog_chitiethoadon.dialog('open')
        tb_chitiethoadon = $('#tb-chitiethoadon').DataTable({
            'destroy': true,
            "autoWidth": true,
            columns: [{
                title: 'Hình ảnh',
                data: 'hinhanh',
                sClass: 'tb-img',
                render: function(data) {
                    if (data.length == 0) {
                        data == 'xehoi.png'
                    }
                    return `<img src="${path_img_sanpham + data}" alt="">`
                }
            }, {
                title: 'Tên sản phẩm',
                data: 'tensanpham'
            }, {
                title: "Size",
                data: 'size'
            }, {
                title: 'Số lượng',
                data: 'soluong'
            }, {
                title: 'Giá thành',
                data: 'giasanpham'
            }, {
                title: 'Thành tiền',
                data: 'thanhtien'
            }],
            ajax: {
                "url": urlPost('cchitiethoadon', 'getChitiethoadonByIdhoadon'),
                "type": "POST",
                data: {
                    'idhoadon': idhoadon
                }
            }
        })
    }
    //
    $('#dialog-chitiethoadon #thoat').click(function() {
        dialog_chitiethoadon.dialog('close')
    })
    //
</script>