<div class="row w-100">
    <div class="col-lg-12 ml-2 mb-4" id="banner">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" id="content">
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="card ml-4 w-100">
        <nav class="navbar  justify-content-end" id="nav">
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
                    <button class="btn btn-outline-light my-2 my-sm-0 mx-2" type="button" id="timkiemsanpham">Lọc</button>
                </form>
            </ul>
        </nav>
        <div class="row" id="content-sanpham">
            <!--  -->
        </div>
        <div class="row">
            <div class="col-12 text-center my-2">
                <button class="btn btn-success" id="xemthem"></button>
            </div>
        </div>
    </div>
</div>
<script>
    const idshop = `<?= $data ?>`
    const color_default = '#f8f9fa'
    const path_img_banner = './public/img/banner/'
    var soluongsanpham = ''
    var start = 0
    var line = 4
    loadGiaodien()
    loadBanner()
    loadSanpham()
    loadLoaisanpham()
    //
    $(document).ready(function() {
        $.post(urlPost('csanpham', 'getSanphamByShop'), {
            idshop: idshop
        }, function(data) {
            dataSet = JSON.parse(data)
            let sanpham = dataSet.data
            soluongsanpham = sanpham.length
            if ((soluongsanpham - line - start) <= 0) {
                $('#xemthem').remove()
            }
            $('#xemthem').text(`Xem thêm (${sanpham.length - line} sản phẩm còn lại)`)
        })
    })
    $('#xemthem').click(function() {
        start += 4
        loadSanpham()
        if ((soluongsanpham - line - start) <= 0) {
            $(this).remove()
        }
        $('#xemthem').text(`Xem thêm (${soluongsanpham - line - start} sản phẩm còn lại)`)
    })
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
            $('#header').css('background-color', color_header_background_current)
            $('#header').each(function() {
                $('#header #giohang').css('color', color_header_text_current)
                $('#header #tenhienthinguoidung').css('color', color_header_text_current)
            })
            // body
            $('#body').css('background-color', color_body_background_current)
            $('#body').css('color', color_body_text_current)
            // nav
            $('#nav').css('background-color', color_nav_background_current)
            $('#nav').each(function() {
                $('#nav select').css('color', color_nav_text_current)
                $('#nav button').css('color', color_nav_text_current)
                $('#nav input').css('color', color_nav_text_current)
            })
        })

    }
    //
    function loadBanner() {
        $.post(urlPost('cbanner', 'getBannerByIdshop'), {

        }, function(data) {
            dataSet = JSON.parse(data)
            banner = dataSet['data']
            isFirst = true
            if (banner.length == 0) {
                $('#banner').remove()
            } else {
                banner.forEach(function(item) {
                    if (isFirst == true) {
                        isFirst = false
                        $('#banner #content').append(`
                            <div class="carousel-item active">
                                <img src="${path_img_banner + item.hinhanh}" class="img-responsive w-100 h-100" alt="" height="50" id="">
                            </div>
                        `)
                    } else {
                        $('#banner #content').prepend(`
                            <div class="carousel-item" >
                                <img src="${path_img_banner + item.hinhanh}" class="img-responsive w-100 h-100" alt="" height="50" id="">
                            </div>
                        `)
                    }
                })
            }
        })
    }
    // 
    function loadSanpham() {
        $.post(urlPost('csanpham', 'getSanphamLimitByIdshop'), {
            idshop: idshop,
            start: start,
            line: line
        }, function(data) {
            dataSet = JSON.parse(data)
            sanpham = dataSet['data']
            sanpham.forEach(function(item) {
                idsanpham = item['idsanpham']
                src = path_img_sanpham + item['hinhanh']
                tensanpham = item['tensanpham']
                giasanpham = formatTien(item['giasanpham']) + " VNĐ"
                $('#content-sanpham').append(`
                <div class="col-lg-3 my-2">
                        <div class="card h-100 w-100">
                            <img class="card-img-top" src="${src}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title text-secondary">${tensanpham}</h4>
                                <p class="card-text text-secondary">${giasanpham}</p>
                                <a href="?controller=cview&action=info&idsanpham=${idsanpham}" class="btn btn-primary float-right">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                `)
            })
        })
    }
    //
    function loadLoaisanpham() {
        $.post(urlPost('cloaisanpham', 'getLoaisanpham'), {}, function(data) {
            dataSet = JSON.parse(data)
            loaisanpham = dataSet['data']
            loaisanpham.forEach(function(item) {
                idloaisanpham = item.idloaisanpham
                tenloaisanpham = item.tenloaisanpham
                $('#loaisanpham').append(`
                    <option value="${idloaisanpham}">${tenloaisanpham}</option>
                `)
            })
        })
    }
    $('#timkiemsanpham').click(function() {
        $('#content-sanpham').empty()
        query = `SELECT * FROM SANPHAM WHERE sanpham.xoa = 0 AND shop = '${idshop}' AND`
        loaisanpham = $('#loaisanpham').val()
        sapxepgia = $('#sapxepgia').val()
        tensanpham = $('#tensanpham').val().trim()
        if (loaisanpham == 0) {
            if (sapxepgia == 1) {
                query += ` tensanpham like '%${tensanpham}%' ORDER BY giasanpham ASC`
            } else {
                query += ` tensanpham like '%${tensanpham}%' ORDER BY giasanpham DESC`
            }
        } else {
            query += ` idloaisanpham = '${loaisanpham}' AND`
            if (sapxepgia == 1) {
                query += ` tensanpham like '%${tensanpham}%' ORDER BY giasanpham ASC`
            } else {
                query += ` tensanpham like '%${tensanpham}%' ORDER BY giasanpham DESC`
            }
        }
        $.post(urlPost('csanpham', 'timkiemSanpham'), {
            query: query
        }, function(data) {
            dataSet = JSON.parse(data)
            sanpham = dataSet['data']
            sanpham.forEach(function(item) {
                idsanpham = item['idsanpham']
                src = path_img_sanpham + item['hinhanh']
                tensanpham = item['tensanpham']
                giasanpham = formatTien(item['giasanpham']) + " VNĐ"
                $('#content-sanpham').append(`
                    <div class="col-lg-3 col-md-6 my-2">
                        <div class="card h-100 w-100">
                            <a href="ajax.php?controller=cview&action=info&idsanpham=${idsanpham}"><img class="card-img-top" src="${src}" alt="..." /></a>
                            <div class="card-body">
                                <h4 class="card-title"><a href="ajax.php?controller=cview&action=info&idsanpham=${idsanpham}">${tensanpham}</a></h4>
                                <h5>${giasanpham}</h5>
                                <a href="?controller=cview&action=info&idsanpham=${idsanpham}" class="btn btn-primary float-right">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                `)
            })
        })
    })
</script>