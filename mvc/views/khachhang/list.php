<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Danh sách khách hàng</h3>
                <a href="?controller=ckhachhang&action=add" class="btn btn-md btn-primary">
                    <i class="fa fa-user-plus"></i>
                    Thêm khách hàng</a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <table id="tb_khachhang"></table>
            </div>
        </div>
    </div>

</div>
<!--  -->
<script>
    function deleteKhachhang(row) {
        idkhachhang = row.data('delete')
        tr = row.closest('tr')
        choice = confirm(`Có chắc muốn xóa khách hàng "${tr.find("td:nth-child(2)").text().trim()}"!`)
        if (choice) {
            $.post(urlPost('ckhachhang', 'deleteKhachhangByIdkhachhang'), {
                idkhachhang: idkhachhang
            }, function(data) {
                if (data == 1) {
                    alert("Xóa khách hàng thành công!")
                    tb_Khachhang.row(tr).remove().draw()
                } else {
                    alert("Xóa khách hàng thất bại!")
                    console.log(data)
                }
            })
        }
    }
    tb_Khachhang = $('#tb_khachhang').DataTable({
        autoWidth: true,
        responsive: true,
        initComplete: function() {
            $('a[data-delete').on('click', function() {
                deleteKhachhang($(this))
            })
        },
        columns: [{
            title: 'Hình ảnh',
            orderable: false,
            data: 'hinhanh',
            sClass: 'tb-img',
            render: function(data, type, row, meta) {
                return `<img src="/cuahangxehoi/public/img/khachhang/${data}" alt="">`
            }
        }, {
            title: 'Tên khách hàng',
            data: 'tenkhachhang'
        }, {
            title: 'Số điện thoại',
            data: 'sodienthoai'
        }, {
            title: 'Email',
            data: 'email'
        }, {
            title: '',
            orderable: false,
            data: 'idkhachhang',
            render: function(data, type, row, meta) {
                return `<a href="?controller=ckhachhang&action=detail&idkhachhang=${data}" data-view=${data} class="btn btn-info btn-sm">
                <i class="fa fa-eye" aria-hidden="true"></i> Xem
                </a>`
            }
        }, {
            title: "",
            data: 'idkhachhang',
            orderable: false,
            render: function(data, type, row, meta) {
                return `<a href="?controller=ckhachhang&action=edit&idkhachhang=${data}" class="btn btn-primary btn-sm">
                <i class="fa fa-pencil-alt"></i>
                Sửa</a>`
            }
        }, {
            title: "",
            data: 'idkhachhang',
            render: function(data, type, row, meta) {
                return `<a data-delete=${data} class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i> Xóa
                </a>`
            }
        }],
        ajax: urlPost('ckhachhang', 'getKhachhang')
    })
</script>