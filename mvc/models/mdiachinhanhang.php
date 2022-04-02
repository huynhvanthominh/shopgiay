<?php
class mdiachinhanhang extends database
{
    private $table = "diachinhanhang";
    public function getDiachinhanhangByIdnguoidung($idnguoidung)
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = ['idnguoidung'];               // dieu kien where column
        $wherev = [$idnguoidung];               // dieu kien where value
        $object = [];               // dieu kien object 1 la OR || 0 la And
        $sortc = 'iddiachinhanhang';              // sap xem bo cot
        $sort = '0';               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //
    public function addDiachinhanhang($idnguoidung, $diachi)
    {
        $table = "$this->table";    // ten table
        $column = ['idnguoidung', 'diachi'];               // ten cot
        $value = [$idnguoidung, $diachi];                // gia tri cua cot
        return $this->insert($table, $column, $value);
    }
}
