<div class="row">
    <div class="col-lg-12 fixed-start mb-4">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./public/img/banner/8.png" class="img-responsive w-100 h-100" alt="" height="50" id="">
                </div>
                <div class="carousel-item">
                    <img src="./public/img/banner/7.png" class="img-responsive w-100 h-100" alt="" height="50" id="">
                </div>
                <div class="carousel-item">
                    <img src="./public/img/banner/4.png" class="img-responsive w-100 h-100" alt="" height="50" id="">
                </div>
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
    <div class="card my-4 text-light w-100">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-dark bg-dark">
                    <a class="navbar-brand text-white">Sản phẩm mới</a>
                    <form class="form-inline">
                        <a class="btn-floating mx-2 text-white" href="#slide-sanpham-new" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                        <a class="btn-floating mx-2 text-white" href="#slide-sanpham-new" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                    </form>
                </nav>
                <div class="carousel slide mt-0 carousel-light" id="slide-sanpham-new" data-ride="carousel">
                    <div class="carousel-inner" role="listbox" id="content-sanpham-new">
                        <!--  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
    <!--  -->
    <div class="card my-4 text-light w-100" id="card-sanpham-banchay">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-dark bg-dark">
                    <a class="navbar-brand text-white">Sản phẩm bán chạy</a>
                    <form class="form-inline">
                        <a class="btn-floating mx-2 text-white" href="#slide-sanpham-top" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                        <a class="btn-floating mx-2 text-white" href="#slide-sanpham-top" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                    </form>
                </nav>
                <div class="carousel slide mt-0 carousel-light" id="slide-sanpham-top" data-ride="carousel">
                    <div class="carousel-inner" role="listbox" id="content-sanpham-top">
                        <!--  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
    <!--  -->

    <div class="card bg-light bg-gradient border-0 w-100">
        <nav class="navbar navbar-dark bg-dark justify-content-end">
            <ul class="nav nav-pills">
                <li class="nav-item dropdown mx-2">
                    <select class="custom-select" id="loaisanpham">
                        <option selected value="0">Loại sản phẩm</option>
                        <option value="0">Tất cả</option>
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
    //
    var soluongsanpham = ''
    var start = 0
    var line = 4
    //
    //======================================= KEY
    //
    //
    //======================================= END KEY
    //
    //
    //======================================= CALL FUNCTOIN WHEN START
    //
    loadSlide()
    loadLoaisanpham()
    loadSanpham()
    loadSanphammoi()
    loadSanphambanchay()
    //
    //======================================= END CALL FUNCTOIN WHEN START
    //
    //
    //===================================== FUNCTION LOAD
    //
    $(document).ready(function() {
        $.post(urlPost('csanpham', 'getSanpham'), {}, function(data) {
            dataSet = JSON.parse(data)
            let sanpham = dataSet.data
            soluongsanpham = sanpham.length
            if ((soluongsanpham - line - start) <= 0) {
                $('#xemthem').remove()
            } else {
                $('#xemthem').text(`Xem thêm (${sanpham.length - line} sản phẩm còn lại)`)
            }

        })
    })
    //
    function loadSanphambanchay() {
        $.post(urlPost('csanpham', 'getSanphamBanchay'), {}, function(data) {
            dataSet = JSON.parse(data)
            sanpham = dataSet['data']
            row = 0;
            if (sanpham.length > 0) {
                for (i = 0; i < sanpham.length; i++) {
                    idsanpham = sanpham[i]['idsanpham']
                    tensanpham = sanpham[i]['tensanpham']
                    let giasanpham = formatTien(sanpham[i]['giasanpham']) + " VNĐ"
                    let hinhanh = path_img_sanpham + sanpham[i]['hinhanh']
                    if (i % 4 == 0) {
                        row++
                        if (row == 1) {
                            $('#content-sanpham-top').append(`
                            <div class="carousel-item active">
                                <div class="row" id="row-sanpham-top-${row}">
                                </div>
                            </div>
                        `)
                        } else {
                            $('#content-sanpham-top').append(`
                            <div class="carousel-item">
                                <div class="row" id="row-sanpham-top-${row}">
                                </div>
                            </div>
                        `)
                        }
                    }
                    $('#row-sanpham-top-' + row).append(`
                    <div class="col-lg-3">
                        <div class="card w-100 h-100">
                            <img class="card-img-top" src="${hinhanh}" alt="Card image cap">
                            <div class="card-body">
                                <a href="#"><h4 class="card-title">${tensanpham}</h4></a>
                                <p class="card-text text-secondary">${giasanpham}</p>
                                card's content.</p>
                                <a href="?controller=cview&action=info&idsanpham=${idsanpham}" class="btn btn-primary float-right">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                `)
                }
            } else {
                $('#card-sanpham-banchay').remove()
            }
        })
    }
    //
    function loadSanphammoi() {
        $.post(urlPost('csanpham', 'getTopSanphamNew'), {}, function(data) {
            dataSet = JSON.parse(data)
            sanpham = dataSet['data']
            row = 0;
            for (i = 0; i < sanpham.length; i++) {
                idsanpham = sanpham[i]['idsanpham']
                tensanpham = sanpham[i]['tensanpham']
                let hinhanh = path_img_sanpham + sanpham[i]['hinhanh']
                motasanpham = sanpham[i]['motasanpham']
                giasanpham = formatTien(sanpham[i]['giasanpham']) + " VNĐ"
                if (i % 4 == 0) {
                    row++
                    if (row == 1) {
                        $('#content-sanpham-new').append(`
                            <div class="carousel-item active">
                                <div class="row" id="row-sanpham-new-${row}">
                                </div>
                            </div>
                        `)
                    } else {
                        $('#content-sanpham-new').append(`
                            <div class="carousel-item">
                                <div class="row" id="row-sanpham-new-${row}">
                                </div>
                            </div>
                        `)
                    }
                }
                $('#row-sanpham-new-' + row).append(`
                    <div class="col-lg-3">
                        <div class="card h-100 w-100">
                            <img class="card-img-top" src="${hinhanh}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title text-secondary">${tensanpham}</h4>
                                <p class="card-text text-secondary">${giasanpham}</p>
                                <a href="?controller=cview&action=info&idsanpham=${idsanpham}" class="btn btn-primary float-right">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                `)
            }
        })
    }
    //
    $('#xemthem').click(function() {
        start += 4
        loadSanpham()
        if ((soluongsanpham - line - start) <= 0) {
            $(this).remove()
        } else {
            $('#xemthem').text(`Xem thêm (${soluongsanpham - line - start} sản phẩm còn lại)`)
        }

    })
    //
    function loadSanpham() {
        $.post(urlPost('csanpham', 'getSanphamLimit'), {
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
        $.post(urlPost('cloaisanpham', 'getLoaisanpham'), {

        }, function(data) {
            dataSet = JSON.parse(data)
            loaisanpham = dataSet['data']
            loaisanpham.forEach(function(item) {
                idloaisanpham = item['idloaisanpham']
                tenloaisanpham = item['tenloaisanpham']
                $('#loaisanpham').append(`
                    <option value="${idloaisanpham}">${tenloaisanpham}</option>
                `)
            })
        })
    }
    //
    function loadSanphamByIdloaisanpham(idloaisanpham) {
        console.log($('#content-sanpham').empty())
        console.log($('#content-sanpham'))
        console.log($('#content-sanpham').innerHTML)
        $.post(urlPost('csanpham', 'getSanphamByIdloaisanpham'), {
            idloaisanpham: idloaisanpham
        }, function(data) {
            dataSet = JSON.parse(data)
            sanpham = dataSet['data']
            sanpham.forEach(function(item) {
                idsanpham = item['idsanpham']
                src = path_img_sanpham + item['hinhanh']
                tensanpham = item['tensanpham']
                giasanpham = item['giasanpham']
                $('#content-sanpham').append(`
                <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card h-100 w-100">
                            <a href="ajax.php?controller=cview&action=info&idsanpham=${idsanpham}"><img class="card-img-top" src="${src}" alt="..." /></a>
                            <div class="card-body">
                                <h4 class="card-title"><a href="ajax.php?controller=cview&action=info&idsanpham=${idsanpham}">${tensanpham}</a></h4>
                                <h5>${giasanpham} VNĐ</h5>
                            </div>
                        </div>
                    </div>
                `)
            })
        })
    }
    // 
    function loadSlide() {
        $.post(urlPost('csanpham', 'getTopSanphamNew'), {},
            function(data) {
                dataSet = JSON.parse(data)
                sanpham = dataSet['data']
                isFirst = true
                sanpham.forEach(function(item) {
                    src = path_img_sanpham + item['hinhanh']
                    if (isFirst) {
                        isFirst = false
                        $('#content-slide-sanpham').append(`
                            <div class="carousel-item active">
                                <img class="rounded mx-auto d-block w-50" src="${src}" alt="" />
                            </div>
                        `)
                    } else {
                        $('#content-slide-sanpham').append(`
                            <div class="carousel-item">
                                <img class="rounded mx-auto d-block w-50" src="${src}" alt="" />
                            </div>
                        `)
                    }

                })
            })
    }
    $('#timkiemsanpham').click(function() {
        $('#content-sanpham').empty()
        query = `SELECT * FROM SANPHAM WHERE sanpham.xoa = 0 AND`
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
    })
    //
    //======================================= END FUNCTION LOAD
    //
</script>