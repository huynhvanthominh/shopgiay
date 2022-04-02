<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-user-plus"></i>
                    Cập nhật thông tin khách hàng
                </h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!--  -->
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="sodienthoai">Số điện thoại <span class="text-danger">*</span> : <span class="text-danger" id="errorSodienthoai"></span></label>
                        <input class="form-control" type="text" name="sodienthoai" id="sodienthoai" onchange="checkSodienthoai()">
                    </div>
                    <div class="col-lg-6">
                        <label for="tenkhachhang">Tên khách hàng:</label>
                        <input class="form-control" type="text" name="tenkhachhang" id="tenkhachhang">
                    </div>
                </div>
                <!--  -->
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="diachi">Địa chỉ:</label>
                        <input class="form-control" type="text" name="diachi" id="diachi">
                    </div>
                    <div class="col-lg-6">
                        <label for="email">Email:</label>
                        <input class="form-control" type="text" name="email" id="email">
                    </div>
                </div>
                <!--  -->
                <div class="form-group row">
                    <div class="col-lg-8"></div>
                    <div class="col-lg-4">
                        <button class='btn btn-lg btn-primary' onclick="checkInput()">
                            <i class="fa fa-pencil-alt"></i>
                            Lưu</button>
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
    // -------------------------------KEY------------------------------- //
    var idkhachhang
    var sodienthoaiold
    loadStart([
        idkhachhang = getValUrl("idkhachhang"),
        loadKhachhang()
    ])
    // ------------------------------- LOAD ------------------------------- //
    //load thong tin khach hang
    function loadKhachhang() {
        $.post(urlPost("ckhachhang", "getKhachhangByIdkhachhang"), {
            idkhachhang
        }, function(data) {
            dataSet = JSON.parse(data)
            khachhang = dataSet['khachhang']
            kh = khachhang[0]
            sodienthoaiold = kh['sodienthoai']
            setVal(kh, 'sodienthoai')
            setVal(kh, 'tenkhachhang')
            setVal(kh, 'diachi')
            setVal(kh, 'email')
        })
    }
    // -------------------------------CLOSE------------------------------- //
    //close form
    function closeForm() {
        location.replace(document.referrer)
    }
    // ------------------------------- CHECK ------------------------------- //
    // check input
    function checkInput() {
        check = true
        sodienthoai = getVal('sodienthoai')
        tenkhachhang = getVal("tenkhachhang")
        diachi = getVal("diachi")
        email = getVal('email')
        if (sodienthoai.length != 10 && check == true) {
            check = false
            alert("Số điện thoại phải là 10 số")
            setFocus('sodienthoai')
        }
        if (document.getElementById('errorSodienthoai').innerText.length > 0 && check == true) {
            alert("Số điện thoại đã tồn tại !")
            setFocus("sodienthoai")
            check = false
        }
        if (checkNumber(sodienthoai) == null && check == true) {
            alert("Vui lòng nhập đúng định dạng số điện thoại !")
            check = false
            setFocus("sodienthoai")
        }
        if (tenkhachhang.length == 0 && check == true) {
            alert("Vui lòng nhập tên khách hàng")
            check = false
            setFocus('tenkhachhang')
        }
        if (checkEmail(email) == null && check == true && email.length > 0) {
            alert("Vui lòng nhập đúng định dạng email !")
            check = false
            setFocus('email')
        }
        if (check == true) {
            editKhachhang()
        }
    }
    //check so dien thoai co ton tai hay chua
    function checkSodienthoai() {
        sodienthoai = getVal("sodienthoai")
        if (sodienthoaiold != sodienthoai) {
            $.post("ajax.php?controller=ckhachhang&action=getKhachhangBySodienthoai", {
                sodienthoai: sodienthoai
            }, function(data) {
                khachhang = JSON.parse(data)
                if (khachhang.length > 0) {
                    document.getElementById('errorSodienthoai').innerHTML = "Số điện thoại đã tồn tại"
                } else {
                    document.getElementById('errorSodienthoai').innerHTML = ""
                }
            })
        } else {
            document.getElementById('errorSodienthoai').innerHTML = ""
        }
    }
    // ------------------------------- EDIT ------------------------------- //
    function editKhachhang() {
        $.post(urlPost("ckhachhang", "editKhachhangByIdkhachhang"), {
            idkhachhang,
            tenkhachhang,
            diachi,
            email,
            sodienthoai
        }, function(data) {
            if (data == 1) {
                alert("Cập nhật thành công !")
                closeForm()
            } else if (data == 0 || data == -1) {
                alert("Cập nhật thất bại !")
            } else {
                alert(data)
                console.log(data)
            }
        })
    }
</script>