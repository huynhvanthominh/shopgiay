<?php

class cview extends controller
{
    private $nguoidung;
    public function __construct()
    {
        $this->nguoidung = $this->model('mnguoidung');
    }
    public function home()
    {
        $this->view("view", "home");
    }
    public function info()
    {
        $idsanpham = isset($_REQUEST['idsanpham']) ? htmlspecialchars($_REQUEST['idsanpham']) : -999;
        $this->view("view", "info", $idsanpham);
    }
    //
    public function doimatkhau()
    {
        $sodienthoai = base64_decode($_REQUEST['id']);
        $this->view('view', 'doimatkhau', $sodienthoai);
    }
    //
    public function thongtincanhan()
    {
        $sodienthoai = base64_decode($_REQUEST['id']);
        $this->view('view', 'thongtincanhan', $sodienthoai);
    }
    public function listSanpham()
    {
        $this->view('sanpham', 'list');
    }
    //
    public function addShop()
    {
        $this->view('shop', 'add');
    }
    //
    public function addSanpham()
    {
        $this->view('sanpham', 'add');
    }
    //
    public function editSanpham()
    {
        $idsanpham = $_REQUEST['idsanpham'];
        $this->view('sanpham', 'edit', $idsanpham);
    }
    //
    public function sanphamshop()
    {
        $idshop = isset($_REQUEST['idshop']) ? htmlspecialchars($_REQUEST['idshop']) : "ALL";
        $this->view('view', 'sanphamshop', $idshop);
    }
    //
    public function mausac()
    {
        $this->view('giaodien', 'mausac');
    }
    //
    public function listHoadonChuahoantat()
    {
        $this->view('hoadon', 'list');
    }
    //
    public function listHoadonHoantat()
    {
        $this->view('hoadon', 'list');
    }
    //
    public function listLoaisanpham()
    {
        $this->view('loaisanpham', 'list');
    }
    //
    public function lichsumuahang()
    {
        $this->view('hoadon', 'list');
    }
}
