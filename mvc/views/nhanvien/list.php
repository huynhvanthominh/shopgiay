<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Danh sách nhân viên</h3>
                <a href="?controller=cnhanvien&action=add" class="btn btn-md btn-primary">
                    <i class="fas fa-user-plus"></i>
                    Thêm nhân viên
                </a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <table id="tbNhanvien"></table>
            </div>
        </div>
    </div>
</div>

<!--  -->

<script>
    tb_Nhanvien = $('#tbNhanvien').DataTable({
        autoWidth: true,
        destroy: true,
        initComplete: function() {
            $('a[data-delete]').on('click', function() {
                deleteNhanvien($(this))
            })
        },
        columns: [{
            title: "Hình ảnh",
            orderable: false,
            sClass: "tb-img",
            data: 'hinhanh',
            render: function(data, type, row, meta) {
                return `<img src="/cuahangxehoi/public/img/nhanvien/${data}" alt="">`
            }
        }, {
            title: "Tên nhân viên",
            data: "tennhanvien"
        }, {
            title: "Tài khoản",
            data: 'taikhoan'
        }, {
            title: 'Email',
            data: 'email'
        }, {
            title: "Chức vụ",
            data: 'chucvu'
        }, {
            title: "",
            orderable: false,
            data: "idnhanvien",
            render: function(data, type, row, meta) {
                return `<a class="btn btn-info btn-sm" data-view="${data}"
                                    href="?controller=cnhanvien&action=detail&idnhanvien=${data}">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Xem
                                </a>`
            }
        }, {
            title: "",
            data: 'idnhanvien',
            orderable: false,
            render: function(data, type, row, meta) {
                return `<a class="btn btn-primary btn-sm" data-edit="${data}"
                                    href="?controller=cnhanvien&action=edit&idnhanvien=${data}">
                                    <i class="fas fa-pencil-alt"></i> Sửa
                                </a>`
            }
        }, {
            title: "",
            orderable: false,
            data: 'idnhanvien',
            render: function(data, type, row, meta) {
                return `<a class="btn btn-danger btn-sm" data-delete="${data}"
                                    href="javascript:void(0)">
                                    <i class="fas fa-trash"></i> Xóa
                                </a>`
            }
        }],
        "ajax": "ajax.php?controller=cnhanvien&action=getNhanvien",
    })

    function deleteNhanvien(row) {
        idnhanvien = row.data('delete')
        tr = row.closest('tr');
        taikhoan = tr.find("td:nth-child(3)").text().trim()
        if (taikhoan == 'admin123') {
            alert('Tài khoản này không thể xóa!')
        } else {
            tenhanvien = tr.find("td:nth-child(2)").text().trim()
            choice = confirm(`Bạn có chắc muốn xóa nhân viên ${tenhanvien} phải không?`)
            if (choice) {
                $.post(urlPost('cnhanvien', 'delelteNhanvienByIdnhanvien'), {
                    idnhanvien: idnhanvien
                }, function(data) {
                    if (data == 1) {
                        alert("Xóa thành công!")
                        tb_Nhanvien.row(tr).remove().draw()
                    } else {
                        alert("Xóa thất bại!")
                    }
                })
            }
        }
    }
</script>