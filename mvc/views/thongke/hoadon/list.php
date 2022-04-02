<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách hóa đơn</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <table id="tb_hoadon"></table>
            </div>
        </div>
    </div>
</div>

<!--  -->

<script>
    var stt = 1
    tb_hoadon = $('#tb_hoadon').dataTable({
        autoWidth: true,
        iniiComplete: function() {

        },
        columns: [{
            title: 'STT',
            data: '',
            sClass: 'center',
            render: function() {
                return stt++
            }
        }, {
            title: 'Ngày tạo',
            data: 'ngaytaohoadon',
            render: function(data, type, row, meta) {
                return moment(data).format('DD-MM-YYYY')
            }
        }, {
            title: 'Nhân viên tạo',
            data: 'nhanvientaohoadon'
        }, {
            title: 'Ngày thanh toán',
            data: 'ngaythanhtoanhoadon',
            render: function(data, type, row, meta) {
                if (data != null) {
                    return moment(data).format("DD-MM-YYYY")
                } else {
                    return ''
                }
            }
        }, {
            title: "Nhân viên thanh toán",
            data: 'nhanvienthanhtoanhoadon',
            render: function(data, type, row, meta) {
                if (row['ngaythanhtoanhoadon'] != null) {
                    return data
                } else {
                    return ''
                }
            }
        }, {
            title: 'Tổng tiền',
            data: 'tongtien'
        }, {
            title: 'Trạng thái',
            data: 'trangthai'
        }, {
            title: '',
            data: 'idhoadon',
            orderable: false,
            render: function(data) {
                return `<a class="btn btn-info btn-sm" href="?controller=choadon&action=detail&idhoadon=${data}">
                <i class="fa fa-eye"></i> Xem
                </a>`
            }
        }, ],
        ajax: urlPost('choadon', 'gethoadon')
    })
</script>