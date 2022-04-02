<?php
class mthongtinnhanhang extends database
{
    private $table = "thongtinnhanhang";
    public function addThongtinnhanhang($idhoadon, $idnguoidung, $diachi, $sodienthoai)
    {
        $table = "$this->table";    // ten table
        $column = ['idhoadon', 'idnguoidung', 'diachi', 'sodienthoai'];               // ten cot
        $value = [$idhoadon, $idnguoidung, $diachi, $sodienthoai];                // gia tri cua cot
        return $this->insert($table, $column, $value);
    }
}
