const path_img_sanpham = './public/img/sanpham/'
const path_img_nguoidung = './public/img/nguoidung/'
const path_img_shop = './public/img/shop/'

// String consists of characters a through z, A through Z and 0 through 9
function checkTypeChar(string) {
    return /^[a-zA-Z0-9@.&]+$/.exec(string)
}
// String consists of numbers 0 through 9
function checkNumber(number) {
    return /^[0-9]+$/.exec(number)
}

function checkEmail(email) {
    return /^[a-zA-Z0-9]+@+[a-z]+\.[a-z.]+$/.exec(email)
}
// get value
function getVal(id) {
    return $('#' + id).val().trim()
}

function setVal(key, name) {
    val = key[name]
    $('#' + name).val(val)
}
// forcus
function setFocus(id) {
    return $('#' + id).focus()
}
// load data
function loadStart(arr) {
    arr.forEach(function(item) {
        document.onload = item
    })
}
//geturl
function getValUrl(key) {
    url = new URL(window.location.href)
    return url.searchParams.get(key)
}
//post
function urlPost(controller, action) {
    url = "ajax.php?controller=" + controller + "&action=" + action
    return url
}
//
function getFilenameUpload(name) {
    date = new Date()
    tamp = name.split(".")
    return tamp[0] + "_" + date.getHours() + "_" + date.getMinutes() + "_" + date.getSeconds() + "_" + date.getDate() + '_' + (date.getMonth() + 1) + '_' + date.getFullYear() + "." + tamp[1]
}
//
function copyFile(tenfile, folderold, foldernew) {
    $.post(urlPost('controller', 'copyFile'), {
        tenfile: tenfile,
        folderold: folderold,
        foldernew: foldernew
    }, function(data) {})
    return tenfile
}
//
function uploadFile(file, folder) {
    arrName = [];
    for (i = 0; i < file.length; i++) {
        data = new FormData()
        nameSave = getFilenameUpload(file[i].name)
        data.append('file', file[i])
        data.append('folder', folder)
        data.append('name', nameSave)
        arrName.push(nameSave)
        $.ajax({
            url: 'ajax.php?controller=controller&action=uploadFile',
            type: 'post',
            data: data,
            contentType: false,
            processData: false,
            success: function(data) {

            }
        });
    }
    return arrName
}

function index(id) {
    $('#' + id).focus()
}

function checkLength(value, name, min, max) {
    len = value.length
    check = true
    if (len < min) {
        check = false
        alert(name + " không được ít hơn " + min)
    }
    if (len > max) {
        check = false
        alert(name + " không được dài hơn " + max)
    }
    return check
}
//
function formatTien(number) {
    return number.toLocaleString('vi-VN')
}
//
function closeForm() {
    location.replace(document.referrer)
}
//
function changeImg(file, img) {
    hinhanh = file.get(0).files
    for (i = 0; i < hinhanh.length; i++) {
        read = new FileReader()
        read.onload = function(e) {
            src = e.target.result
            img.attr('src', src)
        }
        read.readAsDataURL(hinhanh[i])
    }
}
//
function formatDate(date) {
    return moment(date).format("DD-MM-YYYY")
}