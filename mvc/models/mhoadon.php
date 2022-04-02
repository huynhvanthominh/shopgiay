<?php
class mhoadon extends database
{
    private $table = "hoadon";
    // get hoa don
    public function getHoadon()
    {
        $query = "SELECT tennhanvien as nhanvienthanhtoanhoadon, a.* from nhanvien, hoadon, (SELECT tennhanvien as nhanvientaohoadon, a.* FROM hoadon, nhanvien, (SELECT idhoadon,ngaytaohoadon, ngaythanhtoanhoadon, tongtien, trangthai, tenkhachhang FROM hoadon, khachhang where hoadon.idkhachhang = khachhang.idkhachhang) as a WHERE hoadon.idhoadon = a.idhoadon and hoadon.idnhanvientaohoadon = nhanvien.idnhanvien) as a WHERE nhanvien.idnhanvien = hoadon.idnhanvienthanhtoanhoadon and a.idhoadon = hoadon.idhoadon";
        $conn = $this->connect();
        $stmt = mysqli_prepare($conn, $query);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = [];
        while ($row = $rs->fetch_array()) {
            $data[] = $row;
        }
        $stmt->close();
        $this->closeConnect($conn);
        return $data;
    }
    //
    public function getHoadonByIdnguoidung($idnguoidung)
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [""];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = ['idnguoidung'];               // dieu kien where column
        $wherev = [$idnguoidung];               // dieu kien where value
        $object = [0];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //get hoa don by id hoa don
    public function getHoadonByIdhoadon($idhoadon)
    {
        $table = [$this->table, "thongtinnhanhang", 'nguoidung', "diachinhanhang"];    // ten table
        $column = [
            "hoadon.idhoadon",
            "hoadon.ngaytaohoadon",
            "hoadon.ngaythanhtoanhoadon",
            "hoadon.phuongthucthanhtoan",
            "hoadon.trangthai",
            "hoadon.tongtien",
            "nguoidung.tenhienthi",
            "thongtinnhanhang.sodienthoai",
            "diachinhanhang.diachi",
        ];            // cot hien thi
        $jionc = ['hoadon.idhoadon', 'hoadon.idnguoidung', 'thongtinnhanhang.diachi'];                // dieu kien jion
        $jionv = ['thongtinnhanhang.idhoadon', 'nguoidung.idnguoidung', 'diachinhanhang.iddiachinhanhang'];                // dieu kien jion
        $wherec = ['hoadon.idhoadon'];               // dieu kien where column
        $wherev = [$idhoadon];               // dieu kien where value
        $object = [0];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //get hoa don chua thanh toan by id khach hang
    public function getHoadonByIdkhachhang($idkhachhang)
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [""];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = ['idkhachhang', 'idnhanvienthanhtoanhoadon'];               // dieu kien where column
        $wherev = [$idkhachhang, "0"];               // dieu kien where value
        $object = [0];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //get hoa don new
    public function getHoadonNew()
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = [];               // dieu kien where column
        $wherev = [];               // dieu kien where value
        $object = [];               // dieu kien object 1 la OR || 0 la And
        $sortc = 'idhoadon';              // sap xem bo cot
        $sort = 0;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = 1;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //
    public function getHoadonHoantatByIdshop($idshop)
    {
        $query = "SELECT * FROM hoadon WHERE (hoadon.trangthai = 2) and hoadon.idshop = ?";
        $conn = $this->connect();
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 's', $idshop);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = [];
        while ($row = $rs->fetch_array()) {
            $data[] = $row;
        }
        $stmt->close();
        $this->closeConnect($conn);
        return $data;
    }
    //
    public function getHoadonChuahoantatByIdshop($idshop)
    {
        $query = "SELECT * FROM hoadon WHERE (hoadon.trangthai = 0 or hoadon.trangthai = 1) and hoadon.idshop = ?";
        $conn = $this->connect();
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 's', $idshop);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = [];
        while ($row = $rs->fetch_array()) {
            $data[] = $row;
        }
        $stmt->close();
        $this->closeConnect($conn);
        return $data;
    }
    //get hoa don chua thanh toan by id khach hang
    public function getHoadonChuathanhtoanByIdKhachhang($idkhachhang)
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = ['idkhachhang', 'idnhanvienthanhtoanhoadon'];               // dieu kien where column
        $wherev = [$idkhachhang, "0"];               // dieu kien where value
        $object = [0];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //add hoa don
    public function addHoadon($ngaytaohoadon, $idnguoidung, $tongtien, $phuongthucthanhtoan, $trangthai, $idshop)
    {
        $table = "$this->table";
        $column = ['ngaytaohoadon', 'idnguoidung', "tongtien", "phuongthucthanhtoan", "trangthai", 'idshop'];
        $value = [$ngaytaohoadon, $idnguoidung, $tongtien, $phuongthucthanhtoan, $trangthai, $idshop];
        return $this->insert($table, $column, $value);
    }
    //edit hoa don
    public function updateHoadonByIdhoadon($idhoadon, $idnhanvienthanhtoanhoadon, $ngaythanhtoanhoadon, $tongtien, $phuongthucthanhtoan, $idkhachhang)
    {
        $table = "$this->table";
        $column = ['trangthai', 'idnhanvienthanhtoanhoadon', 'ngaythanhtoanhoadon', 'tongtien', 'phuongthucthanhtoan', 'idkhachhang'];
        $value = ['Đã thanh toán', $idnhanvienthanhtoanhoadon, $ngaythanhtoanhoadon, $tongtien, $phuongthucthanhtoan, $idkhachhang];
        $wherec = ['idhoadon'];
        $wherev = [$idhoadon];
        $object = [0];
        return $this->update($table, $column, $value, $wherec, $wherev, $object);
    }
    //
    public function updateTrangthaiHoadon($idhoadon, $trangthai, $ngaythanhtoanhoadon)
    {
        $table = "$this->table";
        $column = ['trangthai', 'ngaythanhtoanhoadon'];
        $value = [$trangthai, $ngaythanhtoanhoadon];
        $wherec = ['idhoadon'];
        $wherev = [$idhoadon];
        $object = [0];
        return $this->update($table, $column, $value, $wherec, $wherev, $object);
    }
}
