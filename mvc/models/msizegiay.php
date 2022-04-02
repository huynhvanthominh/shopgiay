<?php
class msizegiay extends database
{
    private $table = "sizegiay";
    //
    public function getSizegiayByIdsanpham($idsanpham)
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
    //
    public function addSizegiay($idsanpham, $size)
    {
        $table = "$this->table";
        $column = ['idsanpham', 'size'];
        $value = [$idsanpham, $size];
        return $this->insert($table, $column, $value);
    }
    //
    public function deleteSizegiayByIdsanpham($idsanpham)
    {
        $table = "$this->table";
        $wherec = ['idsanpham'];
        $wherev = [$idsanpham];
        $object = [];
        return $this->delete($table, $wherec, $wherev, $object);
    }
}
