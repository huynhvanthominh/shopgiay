<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Danh sách shop</h3>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <table id="tb-shop" class="display"></table>
            </div>
        </div>
    </div>
</div>
<!--  -->
<div id="dialog-thongtinshop">
    <div class="row">
        <div class="card col-lg-12 mx-auto">
            <div class="card-text mt-4">
                <h1 class="text-center" id="title-tenshop">TÊN SHOP</h1>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-6">
                        <div class="col-lg-12 my-1">
                            <label for="">Tên shop: <span class="text-danger" id="errortenshop">*</span></label>
                            <input readonly type="text" class="form-control" name="" id="tenshop">
                        </div>
                        <div class="col-lg-12 my-1">
                            <label for="">Số điện thoại: <span class="text-danger" id="errorsodienthoai">*</span></label>
                            <input readonly type="text" class="form-control" name="" id="sodienthoai">
                        </div>


                        <div class="col-lg-12 my-1">
                            <label for="">Email: <span class="text-danger" id="erroremail">*</span></label>
                            <input readonly type="text" class="form-control" name="" id="email">
                        </div>
                        <div class="col-lg-12 my-1">
                            <label for="">Địa chỉ: <span class="text-danger">*</span></label>
                            <input readonly type="text" class="form-control" name="" id="diachi">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row text-center">
                            <div class="col-lg-12 my-1">
                                <span>Ảnh đại diện shop</span>
                            </div>
                            <div class="col-lg-12 my-1 mb-2">
                                <span class="d-block border" style="height: 200px;">
                                    <label for="file" class="d-block" style="height: 200px;">
                                        <button title="Click vào đây để thay đổi ảnh đại diện shop" class="w-100 border-0" style="height: 200px;" id="btnHinhanh">
                                            <img class="rounded mx-auto d-block" src="./public/img/nguoidung/nguoidung.png" alt="" id="hinhanh" style="max-height: 200px; max-width: 200px;">
                                        </button>
                                    </label>
                                </span>
                            </div>
                            <div class="col-lg-12 btn-group mt-3">
                                <button class="w-100 btn btn-secondary ml-1" id="thoat">
                                    Thoát
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-car"></i>
                    Danh sách sản phẩm
                </h3>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="from-group row">
                    <div class="col-lg-12">
                        <table id="tb-sanpham" class="display"></table>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <!--  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->


<!--  -->
<div id="formThongtinsanpham">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-6">
                <label for="tensanpham">Tên sản phẩm : <span class="text-danger">*</span></label>
                <input class="form-control" type="text" id="tensanpham">
            </div>
            <div class="col-lg-6">
                <label for="loaisanpham">Loại sản phẩm:</label>
                <select class="form-control" name="loaisanpham" id="idloaisanpham">
                    <!-- <option value=""></option> -->
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <label for="soluong">Số lượng:</label>
                <input class="form-control" value="10" type="number" id="soluong">
            </div>
            <div class="col-lg-6">
                <label for="giasanpham">Giá sản phẩm:</label>
                <input class="form-control" value="0" type="number" id="giasanpham">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12" id="sizesanpham">
                <label for="giasanpham">Size:</label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                <label for="motasanpham">Mô tả sản phẩm</label>
                <textarea id="motasanpham" class="md-textarea form-control" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <div id="showhinhanh">
                    <div id="tamp">
                        <!-- <button id="tamp-hinhanh"><img id="img" src="" alt=""></button>                     -->
                    </div>
                </div>
            </div>

        </div>
        <hr>
        <!--  -->
        <div class="form-group row">
            <div class="col-lg-6">
                <label for="xuatxu">Xuất xứ:</label>
                <input class="form-control" type="text" id="xuatxu" name="xuatxu">
            </div>
            <div class="col-lg-6">
                <label for="thuonghieu">Thương hiệu:</label>
                <input class="form-control" type="text" name="thuonghieu" id="thuonghieu">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <label for="ngaysanxuat">Ngày sản xuất:</label>
                <input class="form-control" type="date" id="ngaysanxuat" name="ngaysanxuat">
            </div>
            <div class="col-lg-6">
                <label for="thoigianbaohanh">Thời gian bảo hành:</label>
                <input class="form-control" type="text" name="thoigianbaohanh" id="thoigianbaohanh">
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <div class="col-lg-8">
                <div id="showListhinhanh">
                    <div id="tamp" class="btn-group">
                        <!-- <button id="tamp-hinhanh"><img id="img" src="" alt=""></button>                     -->
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!--  -->
        <div class="form-group row">
            <div class="col-lg-6">
                <!--  -->
            </div>
            <div class="col-lg-6" id="">
                <button class="btn btn-lg btn-secondary float-right" id="btnThoatthongtinsanpham">
                    <i class="fas fa-times"></i>
                    Thoát
                </button>
            </div>
        </div>
    </div>

</div>
<script>
    //
    var idshop = ``
    var tb_Sanpham
    var sizegiayhientai = []
    var hinhanhsanphamhientai = []
    //
    $('#dialog-thongtinshop #btnHinhanh').click(function() {
        $('#dialog-thongtinshop #file').click()
    })
    //
    $('#dialog-thongtinshop #file').change(function(e) {
        if (e.target.files.length > 0) {
            file = e.target.files[0]
            if (/image\/.+/.test(file.type)) {
                if (file.size / 1048576 <= 2) {
                    changeImg($(this), $('#dialog-thongtinshop #hinhanh'))
                } else {
                    alert("Vui lòng chọn hình ảnh không vượt quá 2 MiB")
                }
            } else {
                alert("Vui lòng chọn file hình ảnh")
            }
        }

    })
    //load thong tin shop
    function loadThongtinshop(idshop) {
        idshop = idshop
        $.post(urlPost('cshop', 'getShopByIdshop'), {
            idshop: idshop
        }, function(data) {
            dataSet = JSON.parse(data)
            shop = dataSet.data
            s = shop[0]
            $('#dialog-thongtinshop #title-tenshop').text(s.tenshop)
            $('#dialog-thongtinshop #tenshop').val(s.tenshop)
            $('#dialog-thongtinshop #sodienthoai').val(s.sodienthoai)
            $('#dialog-thongtinshop #email').val(s.email)
            $('#dialog-thongtinshop #diachi').val(s.diachi)
            $('#dialog-thongtinshop #hinhanh').attr('src', path_img_shop + s.hinhanh)
            tb_Sanpham = $('#tb-sanpham').DataTable({
                'destroy': true,
                drawCallback: function() {
                    $('#tb-sanpham a[data-view]').click(function() {
                        viewSanpham($(this))
                    })
                    $('#tb-sanpham a[data-delete]').on('click', function() {
                        deleteSanpham($(this))
                    })
                },
                columns: [{
                    title: "Hình ảnh",
                    data: 'hinhanh',
                    orderable: false,
                    sClass: 'tb-img',
                    render: function(data, type, row, meta) {
                        if (data.length == 0) {
                            data = "sanpham.png"
                        }
                        return `<img src="${path_img_sanpham+data}" alt="">`
                    }
                }, {
                    title: "Tên sản phẩm",
                    data: 'tensanpham'
                }, {
                    title: "Loại sản phẩm",
                    data: "tenloaisanpham"
                }, {
                    title: "Giá thành",
                    data: 'giasanpham',
                    render: function(data) {
                        return data + " VNĐ"
                    }
                }, {
                    title: "Số lượng",
                    data: 'soluong'
                }, {
                    title: "",
                    data: 'idsanpham',
                    orderable: false,
                    render: function(data, type, row, meta) {
                        return `<a class="btn btn-primary" data-view="${data}"
                            href="javascript:void(0)">
                            <i class="fas fa-eye"></i> Xem
                        </a>`
                    }
                }, {
                    title: "",
                    data: 'idsanpham',
                    orderable: false,
                    render: function(data, type, row, meta) {
                        return `<a class="btn btn-danger" data-delete="${data}"
                                    href="javascript:void(0)" >
                                    <i class="fas fa-trash"></i> Xóa
                        </a>`
                    }
                }],
                "ajax": {
                    url: "ajax.php?controller=csanpham&action=getSanphamByShop",
                    type: "POST",
                    data: {
                        idshop: idshop
                    }
                }
            })
        })
    }
    $('#dialog-thongtinshop #thoat').click(function() {
        dialog_thongtinshop.dialog('close')
    })
    //format dialog thong tin shop
    dialog_thongtinshop = $("#dialog-thongtinshop").dialog({
        autoOpen: false,
        title: 'Thông tin shop',
        width: '80%',
        modal: true
    });
    // 
    tbShop = $('#tb-shop').DataTable({
        drawCallback: function() {
            $('#tb-shop a[data-delete]').on('click', function() {
                deleteShop($(this))
            })
            $('#tb-shop a[data-view]').on('click', function() {
                idshop = $(this).data('view')
                loadThongtinshop(idshop)
                dialog_thongtinshop.dialog('open')
            })
        },
        columns: [{
            title: '',
            orderable: false,
            data: 'hinhanh',
            sClass: 'tb-img',
            render: function(data) {
                return `<img src="${path_img_shop + data}" alt="">`
            }
        }, {
            title: "Tên shop",
            data: 'tenshop'
        }, {
            title: "Chủ shop",
            data: 'tenhienthi'
        }, {
            title: "",
            data: 'idshop',
            orderable: false,
            render: function(data, type, row, meta) {
                return `<a class="btn btn-primary " data-view="${data}">
                            <i class="fas fa-eye"></i> Xem
                        </a>
                        <a class="btn btn-danger" data-delete="${data}"
                                    href="javascript:void(0)" >
                                    <i class="fas fa-trash"></i> Xóa
                        </a>
                        `
            }
        }],
        ajax: urlPost('cshop', 'getShop'),
    })
    //
    function deleteShop(row) {
        idshop = row.data('delete')
        $.post(urlPost('cshop', 'deleteShopByIdshop'), {
            idshop: idshop
        }, function(data) {
            dataSet = JSON.parse(data)
            status = dataSet['status']
            message = dataSet['message']
            alert(message)
            if (status == 'true') {
                tbShop.ajax.reload()
            }
        })
    }

    function viewSanpham(row) {
        idsanpham = row.data('view')
        tr = row.closest('tr')
        formThongtinsanpham.dialog('open')
        loadLoaisanpham()
        loadSanpham()
        loadChitietsanpham()
        loadSizegiayByIdsanpham()
        loadHinhanhsanpham()
        $('#formThongtinsanpham :input').prop('disabled', true)
        $("#btnThoatthongtinsanpham").prop('disabled', false)
    }
    formThongtinsanpham = $("#formThongtinsanpham").dialog({
        autoOpen: false,
        modal: true,
        title: 'Thông tin sản phẩm',
        width: '80%',
    });

    function loadLoaisanpham() {
        $.post(urlPost('cloaisanpham', 'getLoaisanpham'), {}, function(data) {
            dataSet = JSON.parse(data)
            lsp = dataSet['data']
            lsp.forEach(function(item) {
                idloaisanpham = item['idloaisanpham']
                tenloaisanpham = item['tenloaisanpham']
                $('#idloaisanpham').append(`<option value="${idloaisanpham}">${tenloaisanpham}</option>`)
            })
        })
    }

    function loadSize() {
        sizesanpham.empty()
        for (i = sizemin; i < sizemax; i++) {
            sizesanpham.append(`
                <div class="form-check form-check-inline mx-2">
                    <input class="form-check-input" type="checkbox" id="size-${i}" value="${i}">
                    <label class="form-check-label" for="size-${i}">${i}</label>
                </div>
            `)
        }
    }
    //
    function loadSanpham() {
        $.post(urlPost('csanpham', 'getSanphamByIdsanpham'), {
            idsanpham: idsanpham
        }, function(data) {
            dataSet = JSON.parse(data)
            sanpham = dataSet['data']
            sp = sanpham[0]
            setVal(sp, 'tensanpham')
            setVal(sp, 'idloaisanpham')
            setVal(sp, 'soluong')
            setVal(sp, 'giasanpham')
            setVal(sp, 'motasanpham')
            hinhanh = sp['hinhanh']
            hinhanhhientai = hinhanh
            $('#tamp').empty()
            if (hinhanh != null && hinhanh.length > 0) {
                $('#tamp').append(`<button id="tamp-hinhanh"><img id="img" src="${path_img_sanpham+hinhanh}" alt=""></button>`);
            }
        })
    }
    //
    function loadChitietsanpham() {
        $.post(urlPost('cchitietsanpham', 'getChitietsanphamByIdsanpham'), {
            idsanpham: idsanpham
        }, function(data) {
            dataSet = JSON.parse(data)
            chitietsanpham = dataSet['data']
            ctsp = chitietsanpham[0]
            setVal(ctsp, 'xuatxu')
            setVal(ctsp, 'thuonghieu')
            setVal(ctsp, 'ngaysanxuat')
            setVal(ctsp, 'thoigianbaohanh')
        })
    }
    //
    function loadSizegiayByIdsanpham() {
        $.post(urlPost('csizegiay', 'getSizegiayByIdsanpham'), {
            idsanpham: idsanpham
        }, function(data) {
            dataSet = JSON.parse(data)
            sizegiay = dataSet['data']
            sizegiay.forEach(function(item) {
                size = item['size']
                sizegiayhientai.push(size)
                $('#size-' + size).prop('checked', true)
            })
        })
    }
    //
    function loadHinhanhsanpham() {
        $.post(urlPost('chinhanhsanpham', "getHinhanhsanphamByIdsanpham"), {
            idsanpham: idsanpham
        }, function(data) {
            dataSet = JSON.parse(data)
            hinhanhsanpham = dataSet['data']
            if (hinhanhsanpham.length > 0) {
                $('#showListhinhanh #tamp').empty()
                hinhanhsanpham.forEach(function(item) {
                    hinhanhsanphamhientai.push(item['hinhanh'])
                    src = path_img_sanpham + item['hinhanh']
                    $('#showListhinhanh #tamp').append(`
                        <button id="tamp-hinhanh">
                            <img id="img" src="${src}" alt="">
                        </button>
                    `)
                })
            }
        })
    }

    function deleteSanpham(row) {
        idsanpham = row.data('delete')
        tr = row.closest('tr')
        choice = confirm(`Bạn có chắc muốn xóa sản phẩm "${tr.find('td:nth-child(2)').text().trim()}"?`)
        if (choice) {
            $.post(urlPost('csanpham', 'deleteSanphamByIdsanpham'), {
                idsanpham: idsanpham
            }, function(data) {
                if (data == 1) {
                    alert("Xóa sản phẩm thành công!")
                    tb_Sanpham.ajax.reload()
                } else {
                    alert("Xóa sản phẩm thất bại")
                    console.log(data)
                }
            })
        }
    }
    $('#btnThoatthongtinsanpham').click(function() {
        formThongtinsanpham.dialog('close')
    })
</script>