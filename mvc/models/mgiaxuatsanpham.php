<?php
class mgiaxuatsanpham extends database
{
    private $table = "giaxuatsanpham";
    //get gia xuat san pham by id san pham
    public function getGiaxuatsanphamByIdsanpham($idsanpham)
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = ['idsanpham'];               // dieu kien where column
        $wherev = [$idsanpham];               // dieu kien where value
        $object = [];               // dieu kien object 1 la OR || 0 la And
        $sortc = 'idgiaxuatsanpham';              // sap xem bo cot
        $sort = 0;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = 1;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //add gia xuat san pham
    public function addGiaxuatsanpham($idsanpham, $giaxuatsanpham, $ngaynhapsanpham, $nhanviennhapsanpham)
    {
        $table = "$this->table";
        $column = ['idsanpham', "giaxuatsanpham", "ngayxuatsanpham", "nhanvienxuatsanpham"];
        $value = [$idsanpham, $giaxuatsanpham, $ngaynhapsanpham, $nhanviennhapsanpham];
        return $this->insert($table, $column, $value);
    }
}
