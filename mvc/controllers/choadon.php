<?php
class choadon extends controller
{
    private $hoadon;
    private $chitiethoadon;
    private $sanpham;
    private $giohang;
    private $thongtinnhanhang;
    public function __construct()
    {
        $this->giohang = $this->model('mgiohang');
        $this->sanpham = $this->model('msanpham');
        $this->hoadon = $this->model("mhoadon");
        $this->chitiethoadon = $this->model('mchitiethoadon');
        $this->thongtinnhanhang = $this->model('mthongtinnhanhang');
    }
    // view danh sach hoa don
    public function list()
    {
        $this->view("hoadon", "list");
    }
    // view detail hoa don
    public function detail()
    {
        $this->view("thongke/hoadon", "detail");
    }
    //get hoa don
    public function getHoadon()
    {
        $hoadon = $this->hoadon->getHoadon();
        $data = ['data' => $hoadon];
        echo json_encode($data);
    }
    //get hoa don by id hoa don
    public function getHoadonByIdhoadon()
    {
        $idhoadon = $this->getValue(1, "idhoadon", "");
        $hoadon = $this->hoadon->getHoadonByIdhoadon($idhoadon);
        echo json_encode(['data' => $hoadon]);
    }
    //
    public function getHoadonByIdnguoidung()
    {
        $idnguoidung = $_SESSION['nguoidung']['idnguoidung'];
        $hoadon = $this->hoadon->getHoadonByIdnguoidung($idnguoidung);
        echo json_encode(['data' => $hoadon]);
    }
    //
    public function getHoadonHoantatByIdshop()
    {
        $idshop = $_SESSION['shop']['idshop'];
        $hoadon = $this->hoadon->getHoadonHoantatByIdshop($idshop);
        $data = ['data' => $hoadon];
        echo json_encode($data);
    }
    //
    public function getHoadonChuahoantatByIdshop()
    {
        $idshop = $_SESSION['shop']['idshop'];
        $hoadon = $this->hoadon->getHoadonChuahoantatByIdshop($idshop);
        $data = ['data' => $hoadon];
        echo json_encode($data);
    }
    //
    //
    public function addHoadon()
    {
        $status = true;
        $message = "Thanh toán thành công!";
        $idsanpham = $_POST['idsanpham'];
        $giasanpham = $_POST['giasanpham'];
        $soluong = $_POST['soluong'];
        $thanhtien = $_POST['thanhtien'];
        $tonkho = $_POST['tonkho'];
        $idshop = $_POST['idshop'];
        $idsizegiay = $_POST['idsizegiay'];
        $diachi = trim($this->getValue(1, "diachinhanhang"));
        $sodienthoai = $this->getValue(1, "sodienthoainguoinhan");
        $ngaytaohoadon = date("Y-m-d");
        $idnguoidung = $_SESSION['nguoidung']['idnguoidung'];
        $trangthai = "0";
        $phuongthucthanhtoan = $this->getValue(1, "phuongthucthanhtoan");
        $shop = [];
        $sanpham = [];
        $tongtien = [];
        for ($i = 0; $i < count($idshop); $i++) {
            if (!in_array($idshop[$i], $shop)) {
                $shop[] = $idshop[$i];
            }
            $tongtien[] = [
                'idshop' => $idshop[$i],
                'tongtien' => $thanhtien[$i]
            ];
            $sanpham[] = [
                'idshop' => $idshop[$i],
                'sanpham' => $idsanpham[$i]
            ];
        }
        for ($i = 0; $i < count($shop); $i++) {
            $tamp_tongtien = 0;
            for ($j = 0; $j < count($thanhtien); $j++) {
                if ($tongtien[$j]['idshop'] == $shop[$i]) {
                    $tamp_tongtien += (int) $tongtien[$j]['tongtien'];
                }
            }
            $row = $this->hoadon->addHoadon($ngaytaohoadon, $idnguoidung, $tamp_tongtien, $phuongthucthanhtoan, $trangthai, $shop[$i]);
            if ($row > 0) {
                $row = 0;
                $idhoadon = $this->hoadon->getHoadonNew()[0]['idhoadon'];
                $this->thongtinnhanhang->addThongtinnhanhang($idhoadon, $idnguoidung, $diachi, $sodienthoai);
                for ($j = 0; $j < count($sanpham); $j++) {
                    if (strcmp($sanpham[$j]['idshop'], $shop[$i]) == 0) {
                        $row += $this->chitiethoadon->addChitiethoadon($idsanpham[$j], $idhoadon, $giasanpham[$j], $soluong[$j], $thanhtien[$j], $idsizegiay[$j]);
                        $this->sanpham->updateSoluongsanphamByIdsanpham($idsanpham[$j], $tonkho[$j] - $soluong[$j]);
                        $this->giohang->deleteGiohangByIdsizegiay($idsizegiay[$j]);
                    }
                }
            }
        }
        if ($row > 0) {
            $status = true;
            $message = "Thanh toán thành công!";
        } else if ($row <= 0) {
            $status = false;
            $message = "Thanh toán thất bại!";
        } else {
            $status = false;
            $message = $row;
        }
        echo json_encode(['status' => $status, 'message' => $message]);
    }
    //
    public function updateHoadonByIdhoadon()
    {
        $idhoadon = $this->getValue(1, "idhoadon", "");
        $idnhanvienthanhtoanhoadon = $_SESSION['idnhanvien'];
        $ngaythanhtoanhoadon = date('Y-m-d');
        $tongtien = $this->getValue(1, "tongtien", "");
        $phuongthucthanhtoan = "Tiền mặt";
        $sodienthoai = $this->getValue(1, "sodienthoai", "");
        $idkhachhang = $_SESSION['idnhanvien'];
        $chitiethoadon = $this->chitiethoadon->getChitiethoadonChuathanhtoanByIdkhachhang($idkhachhang);
        foreach ($chitiethoadon as $cthd) {
            $idsanpham = $cthd['idsanpham'];
            $soluong = $cthd['soluong'];
            $sanpham = $this->sanpham->getSanphamByIdsanpham($idsanpham);
            $soluong = $sanpham[0]['soluong'] - $soluong;
            $row = $this->sanpham->updateSoluongsanphamByIdsanpham($idsanpham, $soluong);
        }
        if ($sodienthoai != -1) {
            $khachhang = $this->khachhang->getKhachhangBySodienthoai($sodienthoai);
            if (count($khachhang) > 0) {
                $idkhachhang = $khachhang[0]['idkhachhang'];
            } else {
                $this->khachhang->addKhachhang("", $sodienthoai, "", "");
                $idkhachhang = $this->khachhang->getKhachhangNew()[0]['idkhachhang'];
            }
        }
        $row = $this->hoadon->updateHoadonByIdhoadon($idhoadon, $idnhanvienthanhtoanhoadon, $ngaythanhtoanhoadon, $tongtien, $phuongthucthanhtoan, $idkhachhang);
        $data = [
            'row' => $row,
            'idkhachhang' => $idkhachhang
        ];
        echo json_encode($data);
    }
    // update trang thai hoa don
    public function updateTrangthaiHoadon()
    {
        $idhoadon = $this->getValue(1, "idhoadon");
        $trangthai = $this->getValue(1, "trangthai");
        $ngaythanhtoanhoadon = NULL;
        if (strcmp($trangthai, 2) == 0) {
            $ngaythanhtoanhoadon = date("Y-m-d");
        }
        $row  = $this->hoadon->updateTrangthaiHoadon($idhoadon, $trangthai, $ngaythanhtoanhoadon);
        $status = false;
        $message = "Cập nhật thất bại";
        if ($row > 0) {
            $status = true;
            $message = "Cập nhật thành công!";
        }
        echo json_encode(['status' => $status, 'message' => $message]);
    }
}
