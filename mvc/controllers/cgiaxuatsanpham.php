<?php
class cgiaxuatsanpham extends controller
{
    private $giaxuatsanpham;
    private $sanpham;
    public function __construct()
    {
        $this->giaxuatsanpham = $this->model("mgiaxuatsanpham");
        $this->sanpham = $this->model('msanpham');
    }
    //get gia xuat san pham by id san pham
    public function getGiaxuatsanphamByIdsanpham()
    {
        $idsanpham = $this->getValue(1, "idsanpham", "");
        echo json_encode($this->giaxuatsanpham->getGiaxuatsanphamByIdsanpham($idsanpham));
    }
    //add gia xuat san pham by san pham new
    public function addGiaxuatsanphamBySanphamNew()
    {
        $idsanpham = $this->sanpham->getSanphamNew()[0]['idsanpham'];
        $giaxuatsanpham = $this->getValue(1, "giaxuatsanpham", "");
        $ngaynhapsanpham = date("Y-m-d");
        $nhanviennhapsanpham = $_SESSION['idnhanvien'];
        $num = $this->giaxuatsanpham->addGiaxuatsanpham($idsanpham, $giaxuatsanpham, $ngaynhapsanpham, $nhanviennhapsanpham);
        echo $num;
    }
    //add gia xuat san pham by id san pham
    public function addGiaxuatsanphamByIdsanpham()
    {
        $idsanpham = $this->getValue(1, "idsanpham", "");
        $giaxuatsanpham = $this->getValue(1, "giaxuatsanpham", "");
        $ngaynhapsanpham = date("Y-m-d");
        $nhanviennhapsanpham = $_SESSION['idnhanvien'];
        $num = $this->giaxuatsanpham->addGiaxuatsanpham($idsanpham, $giaxuatsanpham, $ngaynhapsanpham, $nhanviennhapsanpham);
        echo $num;
    }
}
