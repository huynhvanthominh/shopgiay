<div class="box">
    <div class="title">
        <h1>Đổi mật khẩu</h1>
    </div>
    <hr>
    <div class="r">
        <div class="c-2">
            <label for="taikhoan">Tài khoản:</label>
            <input type="text" id="taikhoan" readonly>
        </div>
        <div class="c-2">
            <label for="matkhauhientai">Mật khẩu hiện tại:</label>
            <input type="password" id="matkhauhientai">
        </div>
    </div>
    <div class="r">
        <div class="c-2">
            <label for="matkhau">Mật khẩu mới:</label>
            <input type="password" id="matkhau">
        </div>
        <div class="c-2">
            <label for="nhaplai">Nhập lại mật khẩu mới:</label>
            <input type="password" name="" id="nhaplai">
        </div>
    </div>
    <hr>
    <div class="r">
        <div class="c-2"></div>
        <div class="c-2">
            <button class="btn btn-lg btn-primary" id="doimatkhau">Đổi mật khẩu</button>
            <button class="btn-lg btn btn-secondary" id="closeForm">Thoát</button>
        </div>
    </div>
</div>

<script>
    function changePassword() {
        matkhau = $('#matkhau').val()
        taikhoan = '<?= $_SESSION['taikhoan'] ?>'
        $.post(urlPost('cnhanvien', 'updateMatkhauNhanvienByTaikhoan'), {
            taikhoan: taikhoan,
            matkhau: matkhau
        }, function(data) {
            if (data == 1) {
                alert("Đổi mật khẩu thành công!")
                closeForm()
            } else {
                alert("Đổi mật khẩu thất bại!")
                console.log(data)
            }
        })
    }
    taikhoan = '<?= $_SESSION['taikhoan'] ?>'
    $('#taikhoan').val(taikhoan)
    $('#doimatkhau').on('click', function() {
        matkhauhientai = $('#matkhauhientai').val()
        matkhau = $('#matkhau').val()
        nhaplai = $('#nhaplai').val()
        if (matkhau == nhaplai) {
            if (matkhau.length > 0) {
                $.post(urlPost('cnhanvien', 'getNhanvienByTaikhoanAndMatkhau'), {
                    taikhoan: taikhoan,
                    matkhau: matkhauhientai
                }, function(data) {
                    dataSet = JSON.parse(data)
                    if (dataSet.length > 0) {
                        changePassword()
                    } else {
                        alert("Mật khẩu hiện tại không đúng!")
                        setFocus('matkhauhientai')
                    }
                })
            } else {
                alert("Mật khẩu mới không được để trống!")
                setFocus('matkhau')
            }
        } else {
            alert("Nhập lại mật khẩu không đúng!")
            setFocus('nhaplai')
        }
    })
    $('#closeForm').on('click', function() {
        closeForm()
    })

    function closeForm() {
        location.replace(document.referrer)
    }
</script>