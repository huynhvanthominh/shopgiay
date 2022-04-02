<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Màu sắc</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-6">
                        <div class="card px-2 mb-2">
                            <div class="card-title text-center mt-2">
                                <h5>Header</h5>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="">Background:</label>
                                    <input type="color" class="form-control" name="" id="choice-color-header-background">
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Text:</label>
                                    <input type="color" class="form-control" name="" id="choice-color-header-text">
                                </div>
                            </div>
                        </div>
                        <div class="card px-2 mb-2">
                            <div class="card-title text-center mt-2">
                                <h5>Body</h5>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="">Background:</label>
                                    <input type="color" class="form-control" name="" id="choice-color-body-background">
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Text:</label>
                                    <input type="color" class="form-control" name="" id="choice-color-body-text">
                                </div>
                            </div>
                        </div>
                        <div class="card px-2 mb-2">
                            <div class="card-title text-center mt-2">
                                <h5>Nav</h5>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="">Background:</label>
                                    <input type="color" class="form-control" name="" id="choice-color-nav-background">
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Text:</label>
                                    <input type="color" class="form-control" name="" id="choice-color-nav-text">
                                </div>
                            </div>
                        </div>
                        <div class="card px-2 mb-2">
                            <div class="card-title text-center mt-2">
                                <h5>Banner</h5>
                            </div>
                            <div class="row" id="show-banner">
                                <!-- <div class="col-lg-6 mb-2">
                                    <button class="bg-white w-100 h200px"><img class="mw-100 mh-100" src="./public/img/logo.png" alt="">
                                    </button>
                                    <button class="btn-delete btn btn-danger">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div> -->
                                <div class="col-lg-6 mb-2">
                                    <input type="file" class="d-none" id="addfile">
                                    <button class="btn btn-outline-primary  w-100 h200px" id="addbanner">
                                        <i class="fas fa-plus fa-5x"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 border px-0" id="body-shop">
                        <nav class="navbar navbar-expand topbar mb-4 static-top shadow" id="header-shop">
                            <div class="container">
                                <a class="navbar-brand" href="#"><img src="./public/img/logo.png" class="img-responsive" alt="" height="50"></a>
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
                                                <span class="mr-2 d-none d-lg-inline text-gray-600 small" id='tenhienthinguoidung'>
                                                    <!--  -->
                                                </span>
                                                <img class="img-profile rounded-circle" src="./public/img/nguoidung/<?= $_SESSION['nguoidung']['hinhanh'] ?>" id="hinhanhnguoidung">
                                            </a>
                                            <!-- Dropdown - User Information -->
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <div class="row w-100" id="banner">
                            <div class="col-lg-12 fixed-start mb-4 ml-2" >
                                <div id="carouselExampleControls" class="carousel slide"  data-ride="carousel" >
                                    <div class="carousel-inner" id="content" >
                                        <!--  -->
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" >
                                        <span class="carousel-control-prev-icon" aria-hidden="true" ></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" >
                                        <span class="carousel-control-next-icon" aria-hidden="true" style="height: 5px;"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <div class="card ml-4 w-100">
                                <nav class="navbar  justify-content-end" id="nav-shop">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item dropdown mx-2">
                                            <select class="custom-select" id="loaisanpham">
                                                <option selected value="0">Loại sản phẩm</option>
                                                <option selected value="0">Tất cả</option>
                                            </select>
                                        </li>
                                        <li class="nav-item dropdown mx-2">
                                            <select class="custom-select" id="sapxepgia">
                                                <option value="1" selected>Giá tăng dần</option>
                                                <option value="0">Giá giảm dần</option>
                                            </select>
                                        </li>
                                        <form class="form-inline mx-2">
                                            <input id="tensanpham" class="form-control mr-sm-2 " type="text" placeholder="Tên sản phẩm...">
                                            <button class="btn bg-white border my-2 my-sm-0 mx-2" type="button" id="timkiemsanpham">Lọc</button>
                                        </form>
                                    </ul>
                                </nav>
                                <div class="row" id="content-sanpham">
                                    <div class="col-lg-6 my-2">
                                        <div class="card h-100 w-100">
                                            <img class="card-img-top" src="./public/img/sanpham/Nike/25.jpg" alt="Card image cap">
                                            <div class="card-body">
                                                <h4 class="card-title text-secondary">NIKE AIR MAX PRO</h4>
                                                <p class="card-text text-secondary">1.000.000.000 VNĐ</p>
                                                <a href="?controller=cview&amp;action=info&amp;idsanpham=44" class="btn btn-primary float-right">Xem chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 my-2">
                                        <div class="card h-100 w-100">
                                            <img class="card-img-top" src="./public/img/sanpham/Nike/21.jpg" alt="Card image cap">
                                            <div class="card-body">
                                                <h4 class="card-title text-secondary">NIKE AIR MAX PRO II</h4>
                                                <p class="card-text text-secondary">2.000.000 VNĐ</p>
                                                <a href="?controller=cview&amp;action=info&amp;idsanpham=45" class="btn btn-primary float-right">Xem chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12 nav justify-content-end">
                        <button class="btn btn-primary btn-lg" id="save-header">
                            <i class="fa fa-save" aria-hidden="true"></i>
                            Lưu
                        </button>
                        <button class="btn btn-info btn-lg btn-lg ml-2" id="refresh-header">
                            <i class="fa fa-sync-alt" aria-hidden="true"></i>
                            Khôi phục
                        </button>
                        <button class="btn btn-secondary btn-lg ml-2" onclick="closeForm()">
                            <i class="fa fa-times" aria-hidden="true"></i>
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
    // key
    const idshop = `<?= $_SESSION['shop']['idshop'] ?>`
    const color_default = '#f8f9fa'
    const path_img_banner = './public/img/banner/'
    var length_banner = 1
    var color_header_background_current = ``
    var color_body_background_current = ``
    var color_nav_background_current = ``
    var color_header_text_current = ``
    var color_body_text_current = ``
    var color_nav_text_current = ``
    //
    loadGiaodien()
    loadBanner()
    //
    function loadGiaodien() {
        $.post(urlPost('cgiaodien', 'getGiaodienByIdshop'), {
            idshop: idshop
        }, function(data) {
            dataSet = JSON.parse(data)
            giaodien = dataSet['data']
            gd = giaodien[0]
            color_header_background_current = giaodien.length > 0 ? gd.backgroundheader : color_default
            color_header_text_current = giaodien.length > 0 ? gd.textheader : color_default
            color_body_background_current = giaodien.length > 0 ? gd.backgroundbody : color_default
            color_body_text_current = giaodien.length > 0 ? gd.textbody : color_default
            color_nav_background_current = giaodien.length > 0 ? gd.backgroundnav : color_default
            color_nav_text_current = giaodien.length > 0 ? gd.textnav : color_default
            // header
            $('#choice-color-header-background').val(color_header_background_current)
            $('#header-shop').css('background-color', color_header_background_current)
            $('#choice-color-header-text').val(color_header_text_current)
            $('#header-shop').each(function() {
                $('#header-shop a').css('color', $('#choice-color-header-text').val())
                $('#header-shop span').css('color', $('#choice-color-header-text').val())
            })
            // body
            $('#choice-color-body-background').val(color_body_background_current)
            $('#body-shop').css('background-color', color_body_background_current)
            $('#choice-color-body-text').val(color_body_text_current)
            $('#body-shop').css('color', color_body_text_current)
            // nav
            $('#choice-color-nav-background').val(color_nav_background_current)
            $('#nav-shop').css('background-color', color_nav_background_current)
            $('#choice-color-nav-text').val(color_nav_text_current)
            $('#nav-shop select').css('color', $('#choice-color-nav-text').val())
            $('#nav-shop button').css('color', $('#choice-color-nav-text').val())
            $('#nav-shop input').css('color', $('#choice-color-nav-text').val())
        })

    }
    //
    function loadBanner() {
        $('#banner #content').empty()
        $.post(urlPost('cbanner', 'getBannerByIdshop'), {}, function(data) {
            dataSet = JSON.parse(data)
            banner = dataSet['data']
            isFirst = true
            length_banner = banner.length
            banner.forEach(function(item) {
                length_banner++
                $('#show-banner').prepend(`
                    <div class="col-lg-6 mb-2" id="banner-${length_banner}">
                        <button class="bg-white w-100 h200px">
                            <img class="mw-100 mh-100" src="${path_img_banner + item.hinhanh}" alt="">
                        </button>
                        <button class="btn-delete btn btn-danger" onclick="deleteBanner(${length_banner},'${item.hinhanh}')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `)
                if (isFirst == true) {
                    isFirst = false
                    $('#banner #content').append(`
                        <div class="carousel-item active" id="slide-banner-${length_banner}">
                            <button class="h300px w-100">
                                <img src="${path_img_banner + item.hinhanh}" class="img-responsive mw-100 mh-100" alt="" id="">
                            </button>
                        </div>
                    `)
                } else {
                    $('#banner #content').prepend(`
                        <div class="carousel-item" id="slide-banner-${length_banner}">
                            <button class="h300px w-100">
                                <img src="${path_img_banner + item.hinhanh}" class="img-responsive mw-100 mh-100" alt="" id="">
                            </button>
                        </div>
                    `)
                }
            })
        })
    }
    //
    function deleteBanner(length_banner, hinhanh) {
        $.post(urlPost('cbanner', 'deleteBannerByHinhanh'), {
            hinhanh: hinhanh
        }, function(data) {
            dataSet = JSON.parse(data)
            status = dataSet['status']
            message = dataSet['message']
            if (status == 'true') {
                location.reload()
            }
        })
    }
    // header
    $('#choice-color-header-background').change(function() {
        $('#header-shop').css('background-color', $(this).val())
    })
    $('#choice-color-header-text').change(function() {
        $('#header-shop').each(function() {
            $('#header-shop a').css('color', $('#choice-color-header-text').val())
        })
    })
    // body
    $('#choice-color-body-background').change(function() {
        $('#body-shop').css('background', $(this).val())
    })
    //nav
    $('#choice-color-nav-background').change(function() {
        $('#nav-shop').css('background', $(this).val())
    })
    $('#choice-color-nav-text').change(function() {
        $('#nav-shop').each(function() {
            $('#nav-shop select').css('color', $('#choice-color-nav-text').val())
            $('#nav-shop button').css('color', $('#choice-color-nav-text').val())
            $('#nav-shop input').css('color', $('#choice-color-nav-text').val())
        })
    })
    // add banner
    $('#addbanner').click(function() {
        $('#addfile').click()
    })
    $('#addfile').change(function() {
        if ($(this).get(0).files.length > 0) {
            hinhanh = uploadFile($(this).get(0).files, 'banner')[0]
            $.post(urlPost('cbanner', 'addBanner'), {
                hinhanh: hinhanh
            }, function(data) {
                $('#show-banner').prepend(`
                    <div class="col-lg-6 mb-2" id="banner-${length_banner}">
                        <button class="bg-white w-100 h200px">
                            <img class="mw-100 mh-100" src="${path_img_banner + hinhanh}">
                        </button>
                        <button class="btn-delete btn btn-danger" onclick="deleteBanner(${length_banner},'${hinhanh}')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `)
                if (length_banner == 0) {
                    $('#banner #content').prepend(`
                        <div class="carousel-item active" id="slide-banner-${length_banner}">
                            <button class="w-100 h300px">
                                <img src="${path_img_banner + hinhanh}" class="img-responsive mw-100 mh-100" alt="" id="">
                            </button>
                        </div>
                    `)
                } else {
                    $('#banner #content').prepend(`
                        <div class="carousel-item" id="slide-banner-${length_banner}">
                            <button class="w-100 h300px">
                                <img src="${path_img_banner + hinhanh}" class="img-responsive mw-100 mh-100" alt="" id="">
                            </button>
                        </div>
                    `)
                }
                length_banner++
            })
        }
    })
    //
    //
    $('#refresh-header').click(function() {
        //
        $('#choice-color-header-background').val(color_header_background_current)
        $('#header-shop').css('background-color', color_header_background_current)
        $('#choice-color-header-text').val(color_header_text_current)
        $('#header-shop').css('color', color_header_text_current)
        //
        $('#choice-color-body-background').val(color_body_background_current)
        $('#body-shop').css('background-color', color_body_background_current)
        $('#choice-color-body-text').val(color_body_text_current)
        $('#body-shop').css('color', color_body_text_current)
        //
        $('#choice-color-nav-background').val(color_nav_background_current)
        $('#nav-shop').css('background-color', color_nav_background_current)
        $('#choice-color-nav-text').val(color_nav_text_current)
        $('#nav-shop').css('color', color_nav_text_current)
    })
    $('#save-header').click(function() {
        //
        let backgroundheader = $('#choice-color-header-background').val()
        let textheader = $('#choice-color-header-text').val()
        //
        let backgroundbody = $('#choice-color-body-background').val()
        let textbody = $('#choice-color-body-text').val()
        //
        let backgroundnav = $('#choice-color-nav-background').val()
        let textnav = $('#choice-color-nav-text').val()
        //
        $.post(urlPost('cgiaodien', 'updateGiaodien'), {
            backgroundheader: backgroundheader,
            textheader: textheader,
            backgroundbody: backgroundbody,
            textbody: textbody,
            backgroundnav: backgroundnav,
            textnav: textnav
        }, function(data) {
            dataSet = JSON.parse(data)
            message = dataSet['message']
            status = dataSet['status']
            alert(message)
            if (status == 'true') {
                closeForm()
            }
        })
    })
</script>