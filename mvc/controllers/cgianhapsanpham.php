<?php
class cgianhapsanpham extends controller
{
    private $sanpham;
    private $gianhapsanpham;
    public function __construct()
    {
        $this->sanpham = $this->model("msanpham");
        $this->gianhapsanpham = $this->model("mgianhapsanpham");
    }
    //get gia nhap san pham by id san pham
    public function getGianhapsanphamByIdsanpham()
    {
        $idsanpham = $this->getValue(1, "idsanpham", "");
        echo json_encode($this->gianhapsanpham->getGianhapsanphamByIdsanpham($idsanpham));
    }
    //add gia nhap san pham new
    public function addGianhapsanphamBySanphamNew()
    {
        $idsanpham = $this->sanpham->getSanphamNew()[0]['idsanpham'];
        $gianhapsanpham = $this->getValue(1, "gianhapsanpham", "");
        $ngaynhapsanpham = date("Y-m-d");
        $nhanviennhapsanpham = $_SESSION['idnhanvien'];
        $num = $this->gianhapsanpham->addGianhapsanpham($idsanpham, $gianhapsanpham, $ngaynhapsanpham, $nhanviennhapsanpham);
        echo $num;
    }
    //add gia nhap san pham by id san pham
    public function addGianhapsanphamByIdsanpham()
    {
        $idsanpham = $this->getValue(1, "idsanpham", "");
        $gianhapsanpham = $this->getValue(1, "gianhapsanpham", "");
        $ngaynhapsanpham = date("Y-m-d");
        $nhanviennhapsanpham = $_SESSION['idnhanvien'];
        $num = $this->gianhapsanpham->addGianhapsanpham($idsanpham, $gianhapsanpham, $ngaynhapsanpham, $nhanviennhapsanpham);
        echo $num;
    }
}
