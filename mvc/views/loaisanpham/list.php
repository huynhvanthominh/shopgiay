<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Danh sách loại sản phẩm</h3>
                <a href="javascript:void(0)" class="btn btn-md btn-primary" id="themloaisanpham">
                    <i class="fas fa-user-plus"></i>
                    Thêm loại sản phẩm
                </a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <table class="display" id="tb_loaisanpham"></table>
            </div>
        </div>
    </div>
</div>

<!--  -->
<script>
    //
    let stt = 1;
    themloaisanpham = $('#themloaisanpham')
    themloaisanpham.click(function() {
        tenloaisanpham = prompt("Nhập tên loại sản phẩm mới:")
        if (tenloaisanpham.length > 0) {
            $.post(urlPost('cloaisanpham', 'addLoaisanpham'), {
                tenloaisanpham: tenloaisanpham
            }, function(data) {
                if (data == 1) {
                    stt = 1
                    alert('Thêm thành công!')
                    tb_loaisanpham.ajax.reload()
                } else {
                    alert('Cập nhật thất bại!')
                    console.log(data)
                }
            })
        }
    })
    // 
    function deleteLoaisanpham(row) {
        idloaisanpham = row.data('delete')
        tr = row.closest('tr')
        choice = confirm(`Có chắc muốn xóa "${tr.find("td:nth-child(2)").text().trim()}"!`)
        if (choice) {
            $.post(urlPost('cloaisanpham', 'deleteLoaisanphamByIdloaisanpham'), {
                idloaisanpham: idloaisanpham
            }, function(data) {
                if (data == 1) {
                    alert("Xóa thành công!")
                    stt = 1
                    tb_loaisanpham.row(tr).remove().draw()
                    tb_loaisanpham.ajax.reload()
                } else {
                    alert("Xóa thất bại!")
                    console.log(data)
                }
            })
        }
    }
    // 
    function editLoaisanpham(row) {
        idloaisanpham = row.data('edit')
        tr = row.closest('tr')
        newname = prompt('Nhập tên loại sản mới:')
        if (newname.length > 0) {
            choice = confirm(`Bạn có chắc muốn đổi tên "${tr.find("td:nth-child(2)").text().trim(0)}" thành "${newname}"?`)
            if (choice) {
                $.post(urlPost('cloaisanpham', 'editLoaisanphamByIdloaisanpham'), {
                    idloaisanpham: idloaisanpham,
                    tenloaisanpham: newname
                }, function(data) {
                    if (data == 1) {
                        stt = 1
                        alert("Cập nhật thành công!")
                        tb_loaisanpham.ajax.reload()

                    } else {
                        alert("Cập nhật thất bại!")
                        console.log(data)
                    }
                })
            }
        } else {
            alert("Tên loại sản phẩm không được để trống!")
        }
    }

    tb_loaisanpham = $('#tb_loaisanpham').DataTable({
        aotuWidth: true,
        "processing": true,
        drawCallback: function() {
            $('a[data-edit]').on('click', function() {
                editLoaisanpham($(this))
            })
            $('a[data-delete').on('click', function() {
                deleteLoaisanpham($(this))
            })
        },
        columns: [{
            title: 'STT',
            sClass: "center",
            render: function(data, type) {
                return stt++;
            }
        }, {
            title: 'Tên loại sản phẩm',
            data: 'tenloaisanpham',
        }, {
            title: '',
            data: 'idloaisanpham',
            orderable: false,
            render: function(data, type, row, meta) {
                return `<a href="javascript:void(0)" class="btn btn-sm btn-primary" data-edit=${data}>
                <i class="fa fa-pencil-alt" aria-hidden="true"></i> Sửa
                </a>`
            }
        }, {
            title: '',
            data: 'idloaisanpham',
            orderable: false,
            render: function(data, type, row, meta) {
                return `<a href="javascript:void(0)" class="btn btn-danger btn-sm" data-delete=${data}>
                <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                </a>`
            }
        }],
        ajax: urlPost('cloaisanpham', 'getLoaisanpham')
    })
</script>