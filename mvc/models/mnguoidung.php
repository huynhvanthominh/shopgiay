<?php
class mnguoidung extends database
{
    private $table = "nguoidung";
    //
    public function getNguoidungBySodienthoatAndMatkhau($sodienthoai, $matkhau)
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = ['sodienthoai', 'matkhau'];               // dieu kien where column
        $wherev = [$sodienthoai, $matkhau];               // dieu kien where value
        $object = [0];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //
    public function getNguoidungNew()
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = [];               // dieu kien where column
        $wherev = [];               // dieu kien where value
        $object = [];               // dieu kien object 1 la OR || 0 la And
        $sortc = 'idnguoidung';              // sap xem bo cot
        $sort = 0;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = 1;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //
    public function getNguoidungBySodienthoai($sodienthoai)
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = ['sodienthoai'];               // dieu kien where column
        $wherev = [$sodienthoai];               // dieu kien where value
        $object = [];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //
    public function addNguoidung($sodienthoai, $tenhienthi, $matkhau, $email, $diachi, $hinhanh)
    {
        $table = "$this->table";    // ten table
        $column = ['sodienthoai', 'tenhienthi', 'matkhau', 'email', 'diachi', 'loainguoidung', 'hinhanh', 'xoa'];               // ten cot
        $value = [$sodienthoai, $tenhienthi, $matkhau, $email,  $diachi, 'kh', $hinhanh, 0];                // gia tri cua cot
        return $this->insert($table, $column, $value);
    }
    //
    public function updateNguoidungBySodienthoai($sodienthoaihientai, $sodienthoai, $tenhienthi, $email, $diachi, $hinhanh)
    {
        $table = "$this->table";    //ten table
        $column = ['sodienthoai', 'tenhienthi', 'email', 'diachi', 'hinhanh'];               // ten cot can thay doi
        $value = [$sodienthoai, $tenhienthi, $email, $diachi, $hinhanh];                // gia tri cua cot thay doi
        $wherec = ['sodienthoai'];               // ten cot dieu kien
        $wherev = [$sodienthoaihientai];               // gia tri cua cot dieu kien
        $object = [];               // 0: end || 1: or
        return $this->update($table, $column, $value, $wherec, $wherev, $object);
    }
    //
    public function doimatkhauBySodienthoai($sodienthoai, $matkhau)
    {
        $table = "$this->table";    //ten table
        $column = ['matkhau'];               // ten cot can thay doi
        $value = [$matkhau];                // gia tri cua cot thay doi
        $wherec = ['sodienthoai'];               // ten cot dieu kien
        $wherev = [$sodienthoai];               // gia tri cua cot dieu kien
        $object = [];               // 0: end || 1: or
        return $this->update($table, $column, $value, $wherec, $wherev, $object);
    }
}
