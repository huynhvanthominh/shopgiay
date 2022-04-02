<?php
class mchitietsanpham extends database
{
    private $table =  "chitietsanpham";
    public function getChitietsanpham()
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = [];               // dieu kien where column
        $wherev = [];               // dieu kien where value
        $object = [];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //get chi tiet san pham by id san pham

    public function getChitietsanphamByIdsanpham($idsanpham)
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
    //add chi tiet san pham
    public function addChitietsanpham($idsanpham, $xuatxu, $thuonghieu, $ngaysanxuat, $thoigianbaohanh)
    {
        $table = "$this->table";
        $column = ['idsanpham', 'xuatxu', "thuonghieu", "ngaysanxuat", 'thoigianbaohanh'];
        $value = [$idsanpham, $xuatxu, $thuonghieu, $ngaysanxuat, $thoigianbaohanh];
        return $this->insert($table, $column, $value);
    }
    //edit chi tiet san pham by id san pham
    public function updateChitietsanphamByIdsanpham($idsanpham, $xuatxu, $thuonghieu, $ngaysanxuat, $thoigianbaohanh)
    {
        $table = "$this->table";
        $column = ['xuatxu', "thuonghieu", "ngaysanxuat", 'thoigianbaohanh'];
        $value = [$xuatxu, $thuonghieu, $ngaysanxuat, $thoigianbaohanh];
        $wherec = ['idsanpham'];
        $wherev = [$idsanpham];
        $object = [];
        return $this->update($table, $column, $value, $wherec, $wherev, $object);
    }
}
