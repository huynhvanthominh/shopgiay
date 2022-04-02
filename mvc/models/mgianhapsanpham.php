<?php
class mgianhapsanpham extends database
{
    private $table = "gianhapsanpham";
    //get gia nhap san pham by id san pham
    public function getGianhapsanphamByIdsanpham($idsanpham)
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = ['idsanpham'];               // dieu kien where column
        $wherev = [$idsanpham];               // dieu kien where value
        $object = [];               // dieu kien object 1 la OR || 0 la And
        $sortc = 'idgianhapsanpham';              // sap xem bo cot
        $sort = 0;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = 1;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //add gia nhap nhap san pham
    public function addGianhapsanpham($idsanpham, $gianhapsanpham, $ngaynhapsanpham, $nhanviennhapsanpham)
    {
        $table = "$this->table";
        $column = ['idsanpham', 'gianhapsanpham', 'ngaynhapsanpham', 'nhanviennhapsanpham'];
        $value = [$idsanpham, $gianhapsanpham, $ngaynhapsanpham, $nhanviennhapsanpham];
        return $this->insert($table, $column, $value);
    }
}
