<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h3>
                <a href="javascript:void(0)" class="btn btn-md btn-primary" id="btnThemsanpham">
                    <i class="fas fa-cloud"></i>
                    Thêm sản phẩm</a>
            </div>
            <!-- Card Body -->
            <div class="card-body overflow-auto" data-spy="scroll">
                <table id="tb_Sanpham" class="display nowrap"></table>
            </div>
        </div>
    </div>
</div>
<!--  -->

<div id="formThongtinsanpham">
    <div class="row">
        <div class="card-body">
            <!--  -->
            <div class="form-group row">
                <div class="col-lg-6">
                    <label for="tensanpham">Tên sản phẩm : <span class="text-danger" id="errortensanpham">*</span></label>
                    <input class="form-control" type="text" id="tensanpham">
                </div>
                <div class="col-lg-6">
                    <label for="loaisanpham">Loại sản phẩm:</label>
                    <select class="form-control" name="loaisanpham" id="loaisanpham">
                        <!-- <option value=""></option> -->
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label for="soluong">Số lượng:</label>
                    <input class="form-control" value="10" min="0" type="number" id="soluong">
                </div>
                <div class="col-lg-6">
                    <label for="giasanpham">Giá sản phẩm:</label>
                    <input class="form-control" value="0" type="number" id="giasanpham">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-1">
                    <label for="sizesanpham">Size:</label>
                </div>
                <div class="col-lg-11" id="sizesanpham">
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
                    <label for="hinhanh">Hình ảnh:</label>
                    <input class="form-control" type="file" name="hinhanh" id="hinhanh" style="border: none;" accept="image/*">
                </div>
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
                    <select class="form-control" name="thuonghieu" id="thuonghieu">
                        <option value="Gucci ">Gucci</option>
                        <option value="Converse">Converse</option>
                        <option value="Adidas ">Adidas</option>
                        <option value="Nike ">Nike</option>
                        <option value="Giày da ">Giày da</option>
                        <option value="Prada">Prada</option>
                    </select>
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
                <div class="col-lg-4">
                    <label for="hinhanhsanpham">Hình ảnh:</label>
                    <input class="form-control-file" type="file" name="hinhanhsanpham" id="hinhanhsanpham" style="border: none;" multiple accept="image/*">
                </div>
                <div class="col-lg-8">
                    <div id="showListhinhanh">
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
                    <!--  -->
                </div>
                <div class="col-lg-6" id="button">
                    <!--  -->
                </div>
            </div>
        </div>

    </div>
</div>
<!--  -->
<script>
    //key
    nullVal = -999
    btnThemsanpham = $('#btnThemsanpham')
    loainguoidung = `<?= $_SESSION['nguoidung']['loainguoidung'] ?>`
    controller = `<?= $_REQUEST['controller'] ?>`
    action = `getSanpham`
    idsanpham = -999
    tensanphamhientai = ``
    tensanpham = $('#tensanpham')
    loaisanpham = $('#loaisanpham')
    soluong = $('#soluong')
    giasanpham = $('#giasanpham')
    sizesanpham = $('#sizesanpham')
    sizegiayhientai = []
    motasanpham = $('#motasanpham')
    hinhanh = $('#formThongtinsanpham #hinhanh')
    xuatxu = $('#xuatxu')
    thuonghieu = $('#thuonghieu')
    ngaysanxuat = $('#ngaysanxuat')
    thoigianbaohanh = $('#thoigianbaohanh')
    hinhanhsanpham = $('#formThongtinsanpham #hinhanhsanpham')
    btnLuuthongtinsanpham = $('#btnLuuthongtinsanpham')
    btnThemthongtinsanpham = $('#btnThemthongtinsanpham')
    hinhanhhientai = nullVal
    hinhanhsanphamhientai = []
    row = nullVal
    sizemin = 38
    sizemax = 44
    checkVisable = true


    // load start
    loadSize()
    if (controller == 'cview') {
        action = `getSanphamByShop`
        checkVisable = false
    } else {
        $('#formThongtinsanpham :input').prop('disabled', 'true')
        $("#btnLuuthongtinsanpham").remove()
        $('#formThongtinsanpham :input[type=file]').remove()
        $('#btnThoatthongtinsanpham').prop('disabled', false)
        $('#sizesanpham :input').prop('disabled', true)
        btnThemsanpham.remove()
    }


    url = `ajax.php?controller=csanpham&action=${action}`

    formThongtinsanpham = $("#formThongtinsanpham").dialog({
        autoOpen: false,
        modal: true,
        title: 'Thông tin sản phẩm',
        width: '60%',
        cache: false
    });

    // data table
    tb_Sanpham = $('#tb_Sanpham').DataTable({
        drawCallback: function() {
            $('a[data-view]').click(function() {
                viewSanpham($(this))
            })
            $('a[data-delete]').on('click', function() {
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
                    data = "xehoi.png"
                }
                return `<img src="./public/img/sanpham/${data}" alt="">`
            }
        }, {
            title: "Tên sản phẩm",
            data: 'tensanpham'
        }, {
            title: "Tên shop",
            data: "tenshop",
            visible: checkVisable
        }, {
            title: "Loại sản phẩm",
            data: "tenloaisanpham"
        }, {
            title: "Giá thành",
            data: 'giasanpham',
            render: function(data) {
                return formatTien(data) + " VNĐ"
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
        "ajax": url
    })


    // delete san pham
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



    // function
    function viewSanpham(row) {
        idsanpham = row.data('view')
        tr = row.closest('tr')
        formThongtinsanpham.dialog('open')
        $('#button').empty()
        $('#button').append(`
                    <button onclick="closedialog()" class="btn btn-lg btn-secondary float-right" id="btnThoatthongtinsanpham">
                        <i class="fas fa-times"></i>
                        Thoát
                    </button>`)
        if (controller == 'cview') {
            $('#button').append(`
            <button onclick="updateSanpham()" class="btn btn-primary btn-lg float-right mr-2" id="btnLuuthongtinsanpham">
                <i class="fas fa-folder"></i>
                Lưu</button>
            </button>`)
        }
        loadLoaisanpham()
        loadSanpham()
        loadChitietsanpham()
        loadSizegiayByIdsanpham()
        loadHinhanhsanpham()
        btnLuuthongtinsanpham = $('#btnLuuthongtinsanpham')
    }

    function loadLoaisanpham() {
        $.post(urlPost('cloaisanpham', 'getLoaisanpham'), {}, function(data) {
            dataSet = JSON.parse(data)
            lsp = dataSet['data']
            lsp.forEach(function(item) {
                idloaisanpham = item['idloaisanpham']
                tenloaisanpham = item['tenloaisanpham']
                loaisanpham.append(`<option value="${idloaisanpham}">${tenloaisanpham}</option>`)
            })
        })
    }
    //
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
        sizesanpham.append(`
                <div class="form-check form-check-inline mx-4">
                    <input class="form-check-input" type="checkbox" id="size-0" value="0">
                    <label class="form-check-label" for="size-0">Tất cả</label>
                </div>
            `)
    }
    //
    function nullThongtinsanpham() {

    }
    //
    function loadSanpham() {
        if (idsanpham != nullVal) {
            $.post(urlPost('csanpham', 'getSanphamByIdsanpham'), {
                idsanpham: idsanpham
            }, function(data) {
                dataSet = JSON.parse(data)
                sanpham = dataSet['data']
                sp = sanpham[0]
                tensanphamhientai = sp.tensanpham
                setVal(sp, 'tensanpham')
                loaisanpham.val(sp['idloaisanpham'])
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
            sizegiayhientai = []
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
                        <button style="display: inline;" id="tamp-hinhanh" style="">
                            <img id="img" src="${src}" alt="">
                        </button>
                    `)
                })
            }
        })
    }
    //
    //======================== END FUNCTION LOAD

    //======================== FUNCTION HANDLE
    //
    function checkAllSize(check) {
        for (i = sizemin; i < sizemax; i++) {
            $('#size-' + i).prop('checked', check)
        }
    }
    //

    //
    function updateSanpham() {
        row = 0
        if (tensanpham.val().length == 0) {
            alert("Tên sản phẩm không được để trống!")
            tensanpham.focus()
        } else {
            file = $('#formThongtinsanpham #hinhanh').get(0).files
            hinhanh = file.length > 0 ? uploadFile(file, "sanpham")[0] : hinhanhhientai
            $.post(urlPost('csanpham', 'updateSanphamByIdsanpham'), {
                idsanpham: idsanpham,
                tensanpham: tensanpham.val(),
                loaisanpham: loaisanpham.val(),
                soluong: soluong.val(),
                giasanpham: giasanpham.val(),
                motasanpham: motasanpham.val(),
                hinhanh: hinhanh,
                hinhanhhientai: hinhanhhientai
            }, function(data) {
                if (data > 0) {
                    row++
                    updateSizegiay()
                } else {
                    updateSizegiay()
                }
            })
        }
    }
    //
    function updateSizegiay() {
        size = []
        for (i = sizemin; i < sizemax; i++) {
            if ($('#size-' + i).prop('checked') == true) {
                size.push(i)
            }
        }
        $.post(urlPost('csizegiay', 'updateSizegiay'), {
            idsanpham: idsanpham,
            sizegiay: size,
            sizegiayhientai: sizegiayhientai
        }, function(data) {
            if (data > 0) {
                row++
                updateChitietsanpham()
            } else {
                updateChitietsanpham()
            }
        })
    }

    function updateChitietsanpham() {
        $.post(urlPost('cchitietsanpham', 'updateChitietsanphamByIdsanpham'), {
            idsanpham: idsanpham,
            xuatxu: xuatxu.val(),
            ngaysanxuat: ngaysanxuat.val(),
            thuonghieu: thuonghieu.val(),
            thoigianbaohanh: thoigianbaohanh.val()
        }, function(data) {
            if (data > 0) {
                row++
                updateHinhanhsanpham()
            } else {
                updateHinhanhsanpham()
            }
        })
    }
    //
    function updateHinhanhsanpham() {
        file = $('#hinhanhsanpham').get(0).files
        hinhanh = file.length > 0 ? uploadFile(file, 'sanpham') : hinhanhsanphamhientai
        $.post(urlPost('chinhanhsanpham', 'updateHinhanhsanphamByIdsanpham'), {
            idsanpham: idsanpham,
            hinhanhsanphamhientai: hinhanhsanphamhientai,
            hinhanh: hinhanh
        }, function(data) {
            if (data > 0) {
                row++
                endUpdateSanpham()
            } else {
                endUpdateSanpham()
            }
        })

    }
    //
    function endUpdateSanpham() {
        if (row > 0) {
            alert("Lưu thông tin thành công!")
            formThongtinsanpham.dialog('close')
            tb_Sanpham.ajax.reload()
        } else {
            alert("Lưu thông tin thất bại!")
        }
    }



    // event

    //
    btnThemsanpham.click(function() {
        $('#formThongtinsanpham :input').prop('value', '')
        $('#sizesanpham :input').prop('checked', true)
        $('#tamp').empty()
        $('#button').empty()
        $('#button').append(`
                    <button onclick="closedialog()" class="btn btn-lg btn-secondary float-right" id="btnThoatthongtinsanpham">
                        <i class="fas fa-times"></i>
                        Thoát
                    </button>
                    <button onclick="addSanpham()" class="btn btn-primary btn-lg float-right mr-2" id="btnThemthongtinsanpham">
                        <i class="fas fa-plus"></i>
                        Thêm</button>
                    </button>`)
        $('#showListhinhanh #tamp').empty()
        loadLoaisanpham()
        formThongtinsanpham.dialog('open')
    })
    //
    $('#size-0').click(function() {
        check = $('#size-0').prop('checked')
        checkAllSize(check)
    })
    // 
    $('#formThongtinsanpham #btnThoat').click(function() {
        location.replace(document.referrer)
    })
    //

    tensanpham.change(function() {
        if (tensanpham.val().length < 10) {
            $('#errortensanpham').text('Tên sản phẩm không được ít hơn 10 ký tự!')
        } else {
            if (tensanpham.val() != tensanphamhientai) {
                $.post(urlPost('csanpham', 'getSanphamByTensanphamAndIdshop'), {
                    tensanpham: tensanpham.val()
                }, function(data) {
                    dataSet = JSON.parse(data)
                    sanpham = dataSet.data
                    if (sanpham.length > 0) {
                        $('#errortensanpham').text('Sản phẩm đã tồn tại!')
                    } else {
                        $('#errortensanpham').text('*')
                    }
                })
            } else {
                $('#errortensanpham').text('*')
            }
        }
    })
    //
    function addSanpham() {
        row = 0
        if (tensanpham.val().length == 0) {
            alert("Tên sản phẩm không được để trống!")
            tensanpham.focus()
        } else if (soluong.val() < 10) {
            alert("Số lượng không được ít hơn 10!")
            soluong.focus()
        } else {
            hinhanh = uploadFile($('#formThongtinsanpham #hinhanh').get(0).files, "sanpham")[0]
            $.post(urlPost('csanpham', 'addSanpham'), {
                tensanpham: tensanpham.val(),
                loaisanpham: loaisanpham.val(),
                soluong: soluong.val(),
                giasanpham: giasanpham.val(),
                motasanpham: motasanpham.val(),
                hinhanh: hinhanh
            }, function(data) {
                row += data
                addSizegiay()
            })
        }
    }

    function addSizegiay() {
        size = []
        for (i = 38; i < 44; i++) {
            if ($('#size-' + i).prop('checked') == true) {
                size.push(i)
            }
        }
        $.post(urlPost('csizegiay', 'addSizegiay'), {
            sizegiay: size
        }, function(data) {
            row += data
            addChitietsanpham()
        })
    }

    function addChitietsanpham() {
        $.post(urlPost('cchitietsanpham', 'addChitietsanpham'), {
            xuatxu: xuatxu.val(),
            ngaysanxuat: ngaysanxuat.val(),
            thuonghieu: thuonghieu.val(),
            thoigianbaohanh: thoigianbaohanh.val()
        }, function(data) {
            row += data
            addHinhanhsanpham()
        })
    }

    function addHinhanhsanpham() {
        file = $('#hinhanhsanpham').get(0).files
        hinhanh = uploadFile(file, "sanpham")
        $.post(urlPost('chinhanhsanpham', 'addHinhanhsanpham'), {
            hinhanh: hinhanh
        }, function(data) {
            row += data
            endAddSanpham()
        })
    }

    function endAddSanpham() {
        if (row > 0) {
            alert("Thêm thành công!")
            formThongtinsanpham.dialog('close')
            tb_Sanpham.ajax.reload()
        } else {
            alert("Thêm thất bại!")
        }
    }
    //
    hinhanh.change(function() {
        $('#tamp').remove()
        $('#showhinhanh').append('<div id="tamp"></div>')
        hinhanh = $('#formThongtinsanpham #hinhanh').get(0).files
        for (i = 0; i < hinhanh.length; i++) {
            read = new FileReader()
            read.onload = function(e) {
                src = e.target.result
                $('#tamp').append('<button id="tamp-hinhanh"><img src="' + src + '" alt=""></button>');
            }
            read.readAsDataURL(hinhanh[i])
        }
    })
    //
    hinhanhsanpham.change(function() {
        hinhanh = $('#hinhanhsanpham').get(0).files
        if (hinhanh.length < 4) {
            $('#showListhinhanh #tamp').remove()
            $('#showListhinhanh').append('<div id="tamp"></div>')
            for (i = 0; i < hinhanh.length; i++) {
                read = new FileReader()
                read.onload = function(e) {
                    src = e.target.result
                    $('#showListhinhanh #tamp').append('<button style="display: inline;" id="tamp-hinhanh"><img src="' + src + '" alt=""></button>');
                }
                read.readAsDataURL(hinhanh[i])
            }
        } else {
            alert("Chỉ được chọn 3 ảnh!")
            $('#hinhanhsanpham').val('')
        }
    })

    function closedialog() {
        formThongtinsanpham.dialog('close')
    }
    //
    //======================== END EVENT
</script>