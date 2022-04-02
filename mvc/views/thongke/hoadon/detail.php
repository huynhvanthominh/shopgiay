<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-eye"></i>
                    Chi tiết hóa đơn
                </h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!--  -->
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="ngaytaohoadon">Ngày tạo hóa đơn:</label>
                        <input class="form-control" readonly type="date" id="ngaytaohoadon">
                    </div>
                    <div class="col-lg-6">
                        <label for="nhanvientaohoadon">Nhân viên tạo:</label>
                        <input class="form-control" readonly type="text" id="nhanvientaohoadon">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="ngaythanhtoanhoadon">Ngày thanh toán:</label>
                        <input class="form-control" readonly type="date" id="ngaythanhtoanhoadon">
                    </div>
                    <div class="col-lg-6">
                        <label for="nhanvienthanhtoanhoadon">Nhân viên thanh toán:</label>
                        <input class="form-control" readonly type="text" id="nhanvienthanhtoanhoadon">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="khachhang">Khách hàng:</label>
                        <input class="form-control" readonly type="text" name="" id="tenkhachhang">
                    </div>
                    <div class="col-lg-6">
                        <label for="tongtien">Tổng tiền:</label>
                        <input class="form-control" readonly type="text" id="tongtien">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="trangthai">Trạng thái:</label>
                        <input class="form-control" readonly type="text" id="trangthai">
                    </div>
                    <div class="col-lg-6">
                        <label for="phuongthucthanhtoan">Phương thức thanh toán:</label>
                        <input class="form-control" readonly type="text" id="phuongthucthanhtoan">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <table class="display" id="tb_chitiethoadon"></table>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-10"></div>
                    <div class="col-lg-2">
                        <button class="btn btn-secondary btn-lg" onclick="closeForm()"><i class="fa fa-times" aria-hidden="true"></i> Thoát</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  -->

<script>
    var idhoadon = getValUrl('idhoadon')
    //close form
    function closeForm() {
        location.replace(document.referrer)
    }
    //
    $.post(urlPost('choadon', 'getHoadonByIdhoadon'), {
        idhoadon: idhoadon
    }, function(data) {
        dataSet = JSON.parse(data)
        hoadon = dataSet['data']
        hd = hoadon[0]
        setVal(hd, 'ngaytaohoadon')
        setVal(hd, 'nhanvientaohoadon')
        setVal(hd, 'ngaythanhtoanhoadon')
        $('#ngaythanhtoanhoadon').val().length > 0 ? setVal(hd, 'nhanvienthanhtoanhoadon') : $('#nhanvienthanhtoanhoadon').val()
        setVal(hd, 'tenkhachhang')
        setVal(hd, 'tongtien')
        setVal(hd, 'trangthai')
        setVal(hd, 'phuongthucthanhtoan')
    })
    //
    tb_chitiethoadon = $('#tb_chitiethoadon').DataTable({
        columns: [{
            title: 'Hình ảnh',
            data: 'hinhanh',
            sClass: 'tb-img',
            render: function(data) {
                if (data.length == 0) {
                    data == 'xehoi.png'
                }
                return `<img src="${path + data}" alt="">`
            }
        }, {
            title: 'Tên sản phẩm',
            data: 'tensanpham'
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
</script>