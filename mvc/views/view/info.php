<div class="container">
    <div class="row card border-0 my-4">
        <div class="form-group row">
            <div class="col-lg-6">
                <div class="card h-100 w-100">
                    <button class="w-100 h400px border-0">
                        <img src="./public/img/logo.png" class="mw-100 mh-100" id="info-hinhanh">
                    </button>
                    <!-- <button class="border-0 w-100 bg-white" style="height: 300px;">
                        <img class="card-img-top" src="" alt="Card image cap" id="info-hinhanh">
                    </button> -->
                    <nav class="navbar navbar-dark w-100 justify-content-center">
                        <div class="row justify-content-center w-100" id="info-list-hinhanh">
                            <!-- <a class="btn btn-outline-warning mx-1 w-23 h50px my-1" href="#">
                                <img src="./public/img/logo.png" class="mw-100 mh-100">
                            </a>
                            <a class="btn btn-outline-warning mx-1 w-23 h50px my-1" href="#">
                                <img src="./public/img/logo.png" class="mw-100 mh-100">
                            </a>
                            <a class="btn btn-outline-warning mx-1 w-23 h50px my-1" href="#">
                                <img src="./public/img/nguoidung/nguoidung.png" class="mw-100 mh-100">
                            </a>
                            <a class="btn btn-outline-warning mx-1 w-23 h50px my-1" href="#">
                                <img src="./public/img/nguoidung/nguoidung.png" class="mw-100 mh-100">
                            </a> -->
                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card h-100 h-100">
                    <div class="card-body">
                        <h4 class="card-title" id="info-tensanpham">
                            <!--  -->
                        </h4>
                        <p class="card-text text-secondary" id="info-giasanpham">
                            <!--  -->
                        </p>
                        <p class="card-text text-secondary" id="info-motasanpham">
                            <!--  -->
                        </p>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <table>
                                    <tr>
                                        <td class="font-weight-bold">Xuất sứ:</td>
                                        <td id="tb-xuatxu" class="pl-2"> ádfsffsd</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Thương hiệu:</td>
                                        <td id="tb-thuonghieu" class="pl-2">đâsd</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Thời gian bảo hành:</td>
                                        <td id="tb-thoigianbaohanh" class="pl-2">áđâs</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="First group" id="info-size">

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-5 col-6">
                                <table>
                                    <tr>
                                        <td>
                                            <button class="btn btn-outline-primary" id="info-giam">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control text-center" name="" id="info-soluong" value="1">
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary" id="info-tang">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-7">
                                <div class="form-group row">
                                    <div class="col-12 mt-2">
                                        <p class="" id="info-tonkho">
                                            <!--  -->
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <button class="btn btn-primary float-left" id="btnThemvaogiohang" autofocus>
                                Thêm vào giỏ hàng
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="card mt-5 text-light w-100">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow">
                        <div class="container">
                            <a class="navbar-brand"><img src="./public/img/logo.png" id="img-hinhanhshop" class="img-responsive" alt="" height="50"></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <a class="navbar-brand" id="btn-tenshop">Tên shop</a>
                            <a class="btn btn-outline-success" type="button" id="btn-sanphamshop">Xem shop</a>
                            <div class="topbar-divider d-none d-sm-block"></div>
                            <a class="navbar-brand">Sản phẩm: <span class="navbar-brand" id="shop-soluongsanpham"></span></a>
                            <div class="collapse navbar-collapse" id="navbarResponsive">
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mb-4">
    <div class="row mb-4">
        <div class="card mb-4 text-light w-100">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-dark bg-dark">
                        <a class="navbar-brand" href="#">Sản phẩm của shop</a>
                        <form class="form-inline">
                            <a class="btn-floating mx-2 text-white" href="#slide-sanpham-shop" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                            <a class="btn-floating mx-2 text-white" href="#slide-sanpham-shop" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                        </form>
                    </nav>
                    <div class="carousel slide mt-0 carousel-light" id="slide-sanpham-shop" data-ride="carousel">
                        <div class="carousel-inner mt-1" role="listbox" id="content-sanpham-shop">
                            <!--  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container my-4">
    <div class="row my-4">
        <div class="card my-4 text-light w-100">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-dark bg-dark">
                        <a class="navbar-brand text-white">Sản phẩm cùng loại</a>
                        <form class="form-inline">
                            <a class="btn-floating mx-2 text-white" href="#slide-sanpham-cungloai" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                            <a class="btn-floating mx-2 text-white" href="#slide-sanpham-cungloai" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                        </form>
                    </nav>
                    <div class="carousel slide mt-0 carousel-light" id="slide-sanpham-cungloai" data-ride="carousel">
                        <div class="carousel-inner mt-1" role="listbox" id="content-sanpham-cungloai">
                            <!--  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // 
    //====================================  KEY
    //
    nullVal = -999
    idnguoidung = `<?= isset($_SESSION['nguoidung']['idnguoidung']) ? $_SESSION['nguoidung']['idnguoidung'] : -1 ?>`
    idsanpham = `<?= $data ?>`
    idloaisanpham = nullVal
    idshop = nullVal
    choicesizegiay = null
    var idsizegiay = ''
    infoSoluong = $('#info-soluong')
    infoGiam = $('#info-giam')
    infoTang = $('#info-tang')
    soluongtonkho = 0
    infogiasanpham = 0
    btnThemvaogiohang = $('#btnThemvaogiohang')
    // 
    //====================================  END KEY
    //
    // 
    //====================================  LOAD AFTER START
    //
    loadSanphamByIdsanpham()
    //
    //====================================  END LOAD AFTER START
    //
    //
    //====================================  FUNCTION LOAD
    // 
    function loadSanphamByIdsanpham() {
        $.post(urlPost('csanpham', 'getSanphamByIdsanpham'), {
            idsanpham: idsanpham
        }, function(data) {
            dataSet = JSON.parse(data)
            sanpham = dataSet['data']
            sp = sanpham[0]
            idsanpham = sp['idsanpham']
            idshop = sp['shop']
            $('#btn-sanphamshop').attr('href', '?controller=cview&action=sanphamshop&idshop=' + idshop)
            idloaisanpham = sp['idloaisanpham']
            tensanpham = sp['tensanpham']
            giasanpham = "Giá: " + formatTien(sp['giasanpham']) + " VNĐ"
            motasanpham = sp['motasanpham'].length > 0 ? "Mô tả: " + sp['motasanpham'] : ''
            infogiasanpham = sp['giasanpham']
            soluongtonkho = sp['soluong']
            $('#info-list-hinhanh').append(`
                <a class="btn btn-outline-warning mx-1 w-23 h50px my-1" onclick="itemImg('${sp['hinhanh']}')">
                    <img src="${path_img_sanpham + sp['hinhanh']}" class="mw-100 mh-100">
                </a>
            `)
            soluong = sp['soluong'] > 0 ? `Sản phẩm còn lại: ${sp['soluong']}` : "Tạm hết hạn"
            $('#info-hinhanh').attr('src', path_img_sanpham + sp['hinhanh'])
            $('#info-tensanpham').text(tensanpham)
            $('#info-giasanpham').text(giasanpham)
            $('#info-motasanpham').text(motasanpham)
            $('#info-tonkho').text(soluong)
            loadSanphamByIdloaisanpham()
            loadChitietsanphamByIdsanpham()
            loadSanphamByShop()
            loadSizegiay()
            loadThongtinShop()
            loadHinhanhsanphamByIdsanpham()
        })
    }
    //fun
    function itemImg(src) {
        $('#info-hinhanh').attr('src', path_img_sanpham + src)
    }
    //
    $('a[data-img]').click(function() {
        alert(this)
        console.log($(this))
    })
    //
    function loadHinhanhsanphamByIdsanpham() {
        $.post(urlPost('chinhanhsanpham', 'getHinhanhsanphamByIdsanpham'), {
            idsanpham: idsanpham
        }, function(data) {
            dataSet = JSON.parse(data)
            hinhanhsanpham = dataSet['data']
            hinhanhsanpham.forEach(function(item) {
                $('#info-list-hinhanh').append(`
                <a onclick="itemImg('${item['hinhanh']}')" class="btn btn-outline-warning mx-1 w-23 h50px my-1">
                    <img src="${path_img_sanpham + item['hinhanh']}" class="mw-100 mh-100">
                </a>
            `)
            })
        })
    }
    //
    function loadChitietsanphamByIdsanpham() {
        $.post(urlPost('cchitietsanpham', 'getChitietsanphamByIdsanpham'), {
            idsanpham: idsanpham
        }, function(data) {
            dataSet = JSON.parse(data)
            chitietsanpham = dataSet['data']
            ctsp = chitietsanpham[0]
            $('#tb-xuatxu').text(ctsp['xuatxu'])
            $('#tb-thuonghieu').text(ctsp['thuonghieu'])
            if (checkNumber(ctsp['thoigianbaohanh']) !== null) {
                $('#tb-thoigianbaohanh').text(ctsp['thoigianbaohanh'] + " tháng")
            } else {
                $('#tb-thoigianbaohanh').text(ctsp['thoigianbaohanh'])
            }
        })
    }
    // 
    function loadSizegiay() {
        $.post(urlPost('csizegiay', 'getSizegiayByIdsanpham'), {
            idsanpham: idsanpham
        }, function(data) {
            dataSet = JSON.parse(data)
            sizegiay = dataSet['data']
            sizegiay.forEach(function(item) {
                size = item.size
                $('#info-size').append(`
                    <input onclick="checksize()" type="radio" name="size" class="btn-check" id="size-${size}" data-size=${item.idsizegiay} value="${size}">
                    <label class="btn btn-outline-primary" for="size-${size}">${size}</label><br>   
                `)
            })
        })
    }
    //
    function loadSanphamByShop() {
        $.post(urlPost('csanpham', 'getSanphamByShop'), {
            idshop: idshop
        }, function(data) {
            dataSet = JSON.parse(data)
            sanpham = dataSet['data']
            row = 0;
            for (i = 0; i < sanpham.length; i++) {
                id = sanpham[i]['idsanpham']
                tensanpham = sanpham[i]['tensanpham']
                hinhanh = path_img_sanpham + sanpham[i]['hinhanh']
                if (i % 4 == 0) {
                    row++
                    if (row == 1) {
                        $('#content-sanpham-shop').append(`
                            <div class="carousel-item active">
                                <div class="row" id="row-sanpham-shop-${row}">
                                </div>
                            </div>
                        `)
                    } else {
                        $('#content-sanpham-shop').append(`
                            <div class="carousel-item">
                                <div class="row" id="row-sanpham-shop-${row}">
                                </div>
                            </div>
                        `)
                    }
                }
                $('#row-sanpham-shop-' + row).append(`
                    <div class="col-lg-3">
                        <div class="card w-100 h-100">
                            <img class="card-img-top" src="${hinhanh}" alt="Card image cap">
                            <div class="card-body">
                                <a href="#"><h4 class="card-title">${tensanpham}</h4></a>
                                <p class="card-text text-secondary">${formatTien(sanpham[i].giasanpham)} VNĐ</p>
                                card's content.</p>
                                <a href="?controller=cview&action=info&idsanpham=${id}" class="btn btn-primary float-right">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                `)
            }

        })
    }
    //
    function loadSanphamByIdloaisanpham() {
        $.post(urlPost('csanpham', 'getSanphamByIdloaisanpham'), {
            idloaisanpham: idloaisanpham
        }, function(data) {
            dataSet = JSON.parse(data)
            sanpham = dataSet['data']
            row = 0;
            for (i = 0; i < sanpham.length; i++) {
                id = sanpham[i]['idsanpham']
                tensanpham = sanpham[i]['tensanpham']
                hinhanh = path_img_sanpham + sanpham[i]['hinhanh']
                if (i % 4 == 0) {
                    row++
                    if (row == 1) {
                        $('#content-sanpham-cungloai').append(`
                            <div class="carousel-item active">
                                <div class="row" id="row-sanpham-cungloai-${row}">
                                </div>
                            </div>
                        `)
                    } else {
                        $('#content-sanpham-cungloai').append(`
                            <div class="carousel-item">
                                <div class="row" id="row-sanpham-cungloai-${row}">
                                </div>
                            </div>
                        `)
                    }
                }
                $('#row-sanpham-cungloai-' + row).append(`
                    <div class="col-lg-3">
                        <div class="card w-100 h-100">
                            <img class="card-img-top" src="${hinhanh}" alt="Card image cap">
                            <div class="card-body">
                                <a href="#"><h4 class="card-title">${tensanpham}</h4></a>
                                <p class="card-text text-secondary">${formatTien(sanpham[i].giasanpham)} VNĐ</p>
                                card's content.</p>
                                <a href="?controller=cview&action=info&idsanpham=${id}" class="btn btn-primary float-right">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                `)
            }

        })
    }
    //
    //====================================  END FUNCTION LOAD
    //
    //fun
    function checksize() {
        choicesizegiay = $(`input[name=size]:checked`).val()
        idsizegiay = $(`input[name=size]:checked`).data('size')
        $(`#info-size label`).addClass('bg-white')
        $(`#info-size label`).removeClass('text-white')
        $(`label[for=size-${choicesizegiay}]`).removeClass('bg-white')
        $(`label[for=size-${choicesizegiay}]`).addClass('bg-primary text-white')
        btnThemvaogiohang.keyup(function(e) {
            if (e.keyCode == 13) {
                e.preventDefault()
                btnThemvaogiohang.click()
            }
        })
    }

    function loadThongtinShop() {
        $.post(urlPost('cshop', 'getShopByIdshop'), {
            idshop: idshop
        }, function(data) {
            dataSet = JSON.parse(data)
            shop = dataSet['data']
            s = shop[0]
            $('#img-hinhanhshop').attr('src', path_img_shop + s['hinhanh'])
            $('#btn-tenshop').text(s['tenshop'])
            $('#shop-soluongsanpham').text(s['soluongsanpham'])
        })
    }
    btnThemvaogiohang.click(function() {
        if (idnguoidung != -1) {
            if (choicesizegiay === null) {
                alert("Vui lòng chọn size giày cần mua!")
            } else {
                $.post(urlPost('cgiohang', 'addGiohang'), {
                    idsanpham: idsanpham,
                    soluongtonkho: soluongtonkho,
                    soluong: infoSoluong.val(),
                    giasanpham: infogiasanpham,
                    idsizegiay: idsizegiay
                }, function(data) {
                    dataSet = JSON.parse(data)
                    status = dataSet.status
                    message = dataSet.message
                    alert(message)
                    if (status == 'true') {
                        location.reload()
                    }
                })
            }
        } else {
            alert("Vui lòng đăng nhập trước khi thêm!")
            location.assign('login.php')
        }
    })
    //
    infoSoluong.keypress(function(e) {
        key = String.fromCharCode(e.keyCode)
        if (checkNumber(key) === null) {
            e.preventDefault()
        }
    })
    infoSoluong.keyup(function(e) {
        if (e.keyCode == 13) {
            btnThemvaogiohang.click()
        }
        if (infoSoluong.val() > soluongtonkho) {
            infoSoluong.val(soluongtonkho)
        }
        if (infoSoluong.val() < 1) {
            infoSoluong.val(1)
        }
    })
    infoSoluong.change(function() {
        if (infoSoluong.val() < 1) {
            infoSoluong.val(1)
        }
    })
    //
    infoGiam.click(function() {
        if (infoSoluong.val() > 1) {
            infoSoluong.val(infoSoluong.val() - 1)
        }
    })
    //
    infoTang.click(function() {
        if (infoSoluong.val() < soluongtonkho) {
            infoSoluong.val(parseInt(infoSoluong.val()) + 1)
        }
    })
</script>