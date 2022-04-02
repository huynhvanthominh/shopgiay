<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-user-plus"></i>
                    Thông tin khách hàng
                </h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!--  -->
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="sodienthoai">Số điện thoại <span class="text-danger">*</span> : <span class="text-danger" id="errorSodienthoai"></span></label>
                        <input readonly class="form-control" type="text" name="sodienthoai" id="sodienthoai" onchange="checkSodienthoai()">
                    </div>
                    <div class="col-lg-6">
                        <label for="tenkhachhang">Tên khách hàng:</label>
                        <input readonly class="form-control" type="text" name="tenkhachhang" id="tenkhachhang">
                    </div>
                </div>
                <!--  -->
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="diachi">Địa chỉ:</label>
                        <input readonly class="form-control" type="text" name="diachi" id="diachi">
                    </div>
                    <div class="col-lg-6">
                        <label for="email">Email:</label>
                        <input readonly class="form-control" type="text" name="email" id="email">
                    </div>
                </div>
                <!--  -->
                <div class="form-group row">
                    <div class="col-lg-8"></div>
                    <div class="col-lg-4">
                        <button class="btn btn-lg btn-secondary" onclick="closeForm()">
                            <i class="fa fa-times"></i>
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
    var idkhachhang
    loadStart([
        idkhachhang = getValUrl("idkhachhang"),
        loadKhachhang()
    ])
    //close form
    function closeForm() {
        location.replace("?controller=ckhachhang&action=list")
    }
    //load thong tin khach hang
    function loadKhachhang() {
        $.post(urlPost("ckhachhang", "getKhachhangByIdkhachhang"), {
            idkhachhang
        }, function(data) {
            dataSet = JSON.parse(data)
            khachhang = dataSet['khachhang']
            kh = khachhang[0]
            setVal(kh, 'sodienthoai')
            setVal(kh, 'tenkhachhang')
            setVal(kh, 'diachi')
            setVal(kh, 'email')

        })
    }
</script>