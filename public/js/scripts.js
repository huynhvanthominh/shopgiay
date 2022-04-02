function getVal(id) {
    return $('#' + id).val()
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