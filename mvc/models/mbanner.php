<?php
class mbanner extends database
{
    private $table = "banner";
    //
    public function getBannerByIdshop($idshop)
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = ['idshop'];               // dieu kien where column
        $wherev = [$idshop];               // dieu kien where value
        $object = [];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //
    public function addBanner($idshop, $hinhanh)
    {
        $table = "$this->table";    // ten table
        $column = ['idshop', 'hinhanh'];               // ten cot
        $value = [$idshop, $hinhanh];                // gia tri cua cot
        return $this->insert($table, $column, $value);
    }
    //
    public function deleteBannerByHinhanh($hinhanh)
    {
        $table = "$this->table";
        $wherec = ['hinhanh'];
        $wherev = [$hinhanh];
        $object = [];
        return $this->delete($table, $wherec, $wherev, $object);
    }
}
