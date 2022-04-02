<?php
class mgiaodien extends database
{
    private $table = "giaodien";
    //
    public function getGiaodienByIdshop($idshop)
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
    public function addGiaodien($idshop, $backgroundheader, $textheader, $backgroundbody, $textbody, $backgroundnav, $textnav)
    {
        $table = "$this->table";    // ten table
        $column = ['idshop', 'backgroundheader', 'textheader', 'backgroundbody', 'textbody', 'backgroundnav', 'textnav'];               // ten cot
        $value = [$idshop, $backgroundheader, $textheader, $backgroundbody, $textbody, $backgroundnav, $textnav];                // gia tri cua cot
        return $this->insert($table, $column, $value);
    }
    //
    public function updateGiaodien($idshop, $backgroundheader, $textheader, $backgroundbody, $textbody, $backgroundnav, $textnav)
    {
        $table = "$this->table";    //ten table
        $column = ['backgroundheader', 'textheader', 'backgroundbody', 'textbody', 'backgroundnav', 'textnav'];               // ten cot
        $value = [$backgroundheader, $textheader, $backgroundbody, $textbody, $backgroundnav, $textnav];                // gia tri cua cot
        $wherec = ['idshop'];               // ten cot dieu kien
        $wherev = [$idshop];               // gia tri cua cot dieu kien
        $object = [];               // 0: end || 1: or
        return $this->update($table, $column, $value, $wherec, $wherev, $object);
    }
}
