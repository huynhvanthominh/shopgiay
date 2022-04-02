<?php
class mshop extends database
{
    private $table = "shop";
    //
    public function getShop()
    {
        $table = [$this->table, 'nguoidung'];    // ten table
        $column = [
            "shop.idshop",
            "shop.tenshop",
            "shop.hinhanh as hinhanh",
            'nguoidung.tenhienthi'
        ];            // cot hien thi
        $jionc = ['shop.nguoidung'];                // dieu kien jion
        $jionv = ['nguoidung.idnguoidung'];                // dieu kien jion
        $wherec = ['shop.xoa'];               // dieu kien where column
        $wherev = [0];               // dieu kien where value
        $object = [];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //
    public function getShopByIdshop($idshop)
    {
        $table = [$this->table, 'nguoidung'];    // ten table
        $column = [
            "shop.idshop",
            "shop.tenshop",
            "shop.hinhanh as hinhanh",
            "shop.sodienthoai",
            "shop.email",
            "shop.diachi",
            'shop.soluongsanpham',
            'nguoidung.tenhienthi',
        ];            // cot hien thi
        $jionc = ['shop.nguoidung'];                // dieu kien jion
        $jionv = ['nguoidung.idnguoidung'];                // dieu kien jion
        $wherec = ['shop.xoa', 'idshop'];               // dieu kien where column
        $wherev = [0, $idshop];               // dieu kien where value
        $object = [0];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //
    public function getShopByTenshop($tenshop)
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = ['tenshop', 'xoa'];               // dieu kien where column
        $wherev = [$tenshop, 0];               // dieu kien where value
        $object = [0];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //
    public function getShopByNguoidung($nguoidung)
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = ['nguoidung', 'xoa'];               // dieu kien where column
        $wherev = [$nguoidung, 0];               // dieu kien where value
        $object = [0];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //
    public function addShop($nguoidung, $tenshop, $sodienthoai, $email, $diachi, $hinhanh)
    {
        $table = "$this->table";    // ten table
        $column = ['nguoidung', 'tenshop', 'sodienthoai', 'email', 'diachi', 'hinhanh'];               // ten cot
        $value = [$nguoidung, $tenshop, $sodienthoai, $email, $diachi, $hinhanh];                // gia tri cua cot
        return $this->insert($table, $column, $value);
    }
    //
    public function updateSoluongsanphamShopByIdshop($idshop, $soluongsanpham)
    {
        $table = "$this->table";    //ten table
        $column = ['soluongsanpham'];               // ten cot can thay doi
        $value = [$soluongsanpham];                // gia tri cua cot thay doi
        $wherec = ['idshop'];               // ten cot dieu kien
        $wherev = [$idshop];               // gia tri cua cot dieu kien
        $object = [];               // 0: end || 1: or
        return $this->update($table, $column, $value, $wherec, $wherev, $object);
    }
    //
    public function updateShopByIdshop($idshop, $tenshop, $sodienthoai, $email, $diachi, $hinhanh)
    {
        $table = "$this->table";    //ten table
        $column = ['tenshop', 'sodienthoai', 'email', 'diachi', 'hinhanh'];               // ten cot
        $value = [$tenshop, $sodienthoai, $email, $diachi, $hinhanh];                // gia tri cua cot
        $wherec = ['idshop'];               // ten cot dieu kien
        $wherev = [$idshop];               // gia tri cua cot dieu kien
        $object = [];               // 0: end || 1: or
        return $this->update($table, $column, $value, $wherec, $wherev, $object);
    }
    //
    public function deleteShopByIdshop($idshop)
    {
        $table = "$this->table";    //ten table
        $column = ['xoa'];               // ten cot can thay doi
        $value = [1];                // gia tri cua cot thay doi
        $wherec = ['idshop'];               // ten cot dieu kien
        $wherev = [$idshop];               // gia tri cua cot dieu kien
        $object = [];               // 0: end || 1: or
        return $this->update($table, $column, $value, $wherec, $wherev, $object);
    }
}
