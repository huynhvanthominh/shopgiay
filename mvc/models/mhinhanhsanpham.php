<?php
class mhinhanhsanpham extends database
{
    private $table = "hinhanhsanpham";
    //get hinh anh san pham by id san pham
    public function getHinhanhsanphamByIdsanpham($idsanpham)
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
    //add hinh anh san pham
    public function addHinhanhsanpham($idsanpham, $hinhanh)
    {
        $table = "$this->table";
        $column = ['idsanpham', "hinhanh"];
        $value = [$idsanpham, $hinhanh];
        return $this->insert($table, $column, $value);
    }
    //
    public function deleteHinhanhsanphamByIdsanpham($idsanpham)
    {
        $table = "$this->table";
        $wherec = ['idsanpham'];
        $wherev = [$idsanpham];
        $object = [];
        return $this->delete($table, $wherec, $wherev, $object);
    }
}
