function checkSodienthoai(sodienthoai) {
    if (/^[0-9]+$/.exec(sodienthoai.val()) == null) {
        alert("Không đúng định dạng số điện thoại!")
        sodienthoai.focus()
    }

}