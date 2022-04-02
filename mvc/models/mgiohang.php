<?php
class mgiohang extends database
{
    private $table = "giohang";
    //
    public function getGiohangByIdnguoidung($nguoidung)
    {
        $table = [$this->table, 'sanpham', 'sizegiay'];    // ten table
        $column = [
            "giohang.idgiohang",
            "giohang.soluong",
            "giohang.thanhtien",
            "sanpham.tensanpham",
            "sanpham.hinhanh",
            "sanpham.idsanpham",
            "sanpham.soluong as tonkho, sanpham.giasanpham",
            "sanpham.shop as idshop",
            "sizegiay.idsizegiay",
            "sizegiay.size"
        ];            // cot hien thi
        $jionc = ['giohang.idsanpham', 'giohang.idsizegiay'];                // dieu kien jion
        $jionv = ['sanpham.idsanpham', 'sizegiay.idsizegiay'];                // dieu kien jion
        $wherec = ['nguoidung'];               // dieu kien where column
        $wherev = [$nguoidung];               // dieu kien where value
        $object = [];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //
    public function getGiohangByIdsizegiay($idsizegiay)
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = ['idsizegiay'];               // dieu kien where column
        $wherev = [$idsizegiay];               // dieu kien where value
        $object = [];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //
    public function getGiohangByIdsanpham($idsanpham)
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = ['idsanpham'];               // dieu kien where column
        $wherev = [$idsanpham];               // dieu kien where value
        $object = [];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    public function addGiohang($nguoidung, $idsanpham, $soluong, $thanhtien, $idsizegiay)
    {
        $table = "$this->table";    // ten table
        $column = ['nguoidung', 'idsanpham', 'soluong', 'thanhtien', 'idsizegiay'];               // ten cot
        $value = [$nguoidung, $idsanpham, $soluong, $thanhtien, $idsizegiay];                // gia tri cua cot
        return $this->insert($table, $column, $value);
    }
    //
    public function updateGiohangByIdgiohang($idgiohang, $soluong, $thanhtien)
    {
        $table = "$this->table";    //ten table
        $column = ['soluong', 'thanhtien'];               // ten cot can thay doi
        $value = [$soluong, $thanhtien];                // gia tri cua cot thay doi
        $wherec = ['idgiohang'];               // ten cot dieu kien
        $wherev = [$idgiohang];               // gia tri cua cot dieu kien
        $object = [];               // 0: end || 1: or
        return $this->update($table, $column, $value, $wherec, $wherev, $object);
    }
    public function deleteGiohangByIdsizegiay($idsizegiay)
    {
        $table = "$this->table";
        $wherec = ['idsizegiay'];
        $wherev = [$idsizegiay];
        $object = [];
        return $this->delete($table, $wherec, $wherev, $object);
    }
    //
    public function deleteGiohangByIdgiohang($idgiohang)
    {
        $table = "$this->table";
        $wherec = ['idgiohang'];
        $wherev = [$idgiohang];
        $object = [];
        return $this->delete($table, $wherec, $wherev, $object);
    }
}
