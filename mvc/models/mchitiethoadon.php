<?php
class mchitiethoadon extends database
{
    private $table = "chitiethoadon";
    // get chi tiet hoa don chua thanh toan by id khach hang
    public function getChitiethoadonChuathanhtoanByIdkhachhang($idkhachhang)
    {
        $table = [$this->table, 'hoadon', 'sanpham'];    // ten table
        $column = ['sanpham.idsanpham', 'hoadon.idhoadon', "sanpham.hinhanh", 'sanpham.tensanpham', 'chitiethoadon.soluong', 'sanpham.giasanpham', 'chitiethoadon.thanhtien', 'chitiethoadon.idchitiethoadon'];            // cot hien thi
        $jionc = ['chitiethoadon.idhoadon', 'chitiethoadon.idsanpham'];                // dieu kien jion
        $jionv = ['hoadon.idhoadon', 'sanpham.idsanpham'];                // dieu kien jion
        $wherec = ['idkhachhang', 'hoadon.idnhanvienthanhtoanhoadon'];               // dieu kien where column
        $wherev = [$idkhachhang, "0"];               // dieu kien where value
        $object = [0];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //get chi tiet hoa don by id hoa don and id san pham
    public function getHoadonByIdhoadonAndIdsanpham($idhoadon, $idsanpham)
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = ['idhoadon', 'idsanpham'];               // dieu kien where column
        $wherev = [$idhoadon, $idsanpham];               // dieu kien where value
        $object = [0];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //
    public function getChitiethoadonByIdhoadon($idhoadon)
    {
        $table = [$this->table, 'sanpham', 'sizegiay'];    // ten table
        $column = [
            "chitiethoadon.idchitiethoadon",
            "chitiethoadon.soluong",
            "chitiethoadon.thanhtien",
            "sanpham.tensanpham",
            "sanpham.hinhanh",
            "sanpham.idsanpham",
            "sanpham.soluong as tonkho, sanpham.giasanpham",
            "sanpham.shop as idshop",
            "sizegiay.idsizegiay",
            "sizegiay.size"
        ];            // cot hien thi
        $jionc = ['chitiethoadon.idsanpham', 'chitiethoadon.idsizegiay'];                // dieu kien jion
        $jionv = ['sanpham.idsanpham', 'sizegiay.idsizegiay'];                // dieu kien jion
        $wherec = ['idhoadon'];               // dieu kien where column
        $wherev = [$idhoadon];               // dieu kien where value
        $object = [0];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //add chi tiet hoa don by id hoa don
    public function addChitiethoadon($idsanpham, $idhoadon, $giasanpham, $soluong, $thanhtien, $idsizegiay)
    {
        $table = "$this->table";
        $column = ['idsanpham', 'idhoadon', 'giasanpham', 'soluong', 'thanhtien', 'idsizegiay'];
        $value = [$idsanpham, $idhoadon, $giasanpham, $soluong, $thanhtien, $idsizegiay];
        return $this->insert($table, $column, $value);
    }
    //
    public function updateChitiethoadonByIdChitiethoadon($idchitiethoadon, $soluong, $thanhtien)
    {
        $table = "$this->table";
        $column = ['soluong', 'thanhtien'];
        $value = [$soluong, $thanhtien];
        $wherec = ['idchitiethoadon'];
        $wherev = [$idchitiethoadon];
        $object = [0];
        return $this->update($table, $column, $value, $wherec, $wherev, $object);
    }
    //edit chi tiet hoa don by id hoa don
    public function editChitiethoadonByIdhoadonAndByIdsanpham($idhoadon, $idsanpham, $soluong, $thanhtien)
    {
        $table = "$this->table";
        $column = ['soluong', 'thanhtien'];
        $value = [$soluong, $thanhtien];
        $wherec = ['idhoadon', 'idsanpham'];
        $wherev = [$idhoadon, $idsanpham];
        $object = [0];
        return $this->update($table, $column, $value, $wherec, $wherev, $object);
    }
}
