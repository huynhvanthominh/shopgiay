<?php
class mloaisanpham extends database
{
    private $table = "loaisanpham";
    // get all loai san pham
    public function getLoaisanpham()
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [""];                // dieu kien jion
        $jionv = [""];                // dieu kien jion
        $wherec = ["xoa"];               // dieu kien where column
        $wherev = [0];               // dieu kien where value
        $object = [];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //add loai san pham
    public function addLoaisanpham($tenloaisanpham)
    {
        $table = "$this->table";
        $column = ['tenloaisanpham'];
        $value = [$tenloaisanpham];
        return $this->insert($table, $column, $value);
    }
    //edit loai san pham by id loai san pham
    public function editLoaisanphamByIdloaisanpham($idloaisanpham, $tenloaisanpham)
    {
        $table = "$this->table";
        $column = ['tenloaisanpham'];
        $value = [$tenloaisanpham];
        $wherec = ['idloaisanpham'];
        $wherev = [$idloaisanpham];
        $object = [];
        return $this->update($table, $column, $value, $wherec, $wherev, $object);
    }
    //delete Loaisanpham by id loai san pham
    public function deleteLoaisanphamByIdloaisanpham($idloaisanpham)
    {
        $table = "$this->table";
        $column = ['xoa'];
        $value = [1];
        $wherec = ['idloaisanpham'];
        $wherev = [$idloaisanpham];
        $object = [];
        return $this->update($table, $column, $value, $wherec, $wherev, $object);
    }
}
