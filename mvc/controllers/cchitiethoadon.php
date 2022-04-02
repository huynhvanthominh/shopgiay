<?php
class cchitiethoadon extends controller
{
    private $hoadon;
    private $chitiethoadon;
    public function __construct()
    {
        $this->hoadon = $this->model("mhoadon");
        $this->chitiethoadon = $this->model("mchitiethoadon");
    }
    //
    public function getChitiethoadonChuathanhtoanByIdkhachhang()
    {
        $idkhachhang = "0";
        $chitiethoadon = $this->chitiethoadon->getChitiethoadonChuathanhtoanByIdkhachhang($idkhachhang);
        $data = ['data' => $chitiethoadon];
        echo json_encode($data);
    }
    //
    public function getChitiethoadonByIdhoadon()
    {
        $idhoadon = $this->getValue(1, "idhoadon", "");
        $chitiethoadon = $this->chitiethoadon->getChitiethoadonByIdhoadon($idhoadon);
        $data = [
            'data' => $chitiethoadon
        ];
        // echo `<script>alert(` . $idhoadon . `)</script>`;
        echo json_encode($data);
    }
    //load table chi tiet hoa don chua thanh toan by id khach hang
    public function loadTableChitiethoadonChuathanhtoanByIdkhachhang()
    {
        $idkhachhang = "0";
        $tongtien = 0;
        $chitiethoadon = $this->chitiethoadon->getChitiethoadonChuathanhtoanByIdkhachhang($idkhachhang);
        $list = [];
        foreach ($chitiethoadon as $cthd) {
            $check = '<input type="checkbox" class="click-item" name="" id="">';
            $path = "/cuahangxehoi/public/img/sanpham/";
            $img = strlen($cthd['hinhanh']) > 0 ? $cthd['hinhanh'] : "xehoi.png";
            $img = '<button class="tb-img"><img src="' . $path . $img . '" alt=""></button>';
            $tensanpham = $cthd['tensanpham'];
            $giasanpham = $cthd['giasanpham'];
            $soluong = $cthd['soluong'];
            // $soluong = ' <button id="btn-giam">-</button>
            // <input type="text" name="num" id="num" value="1" min="1" onkeypress="checkVal(event)" oninput="checkMaximum()">
            // <button id="btn-tang">+</button>
            // <label for="" id="soluong"></label>';
            $thanhtien = $cthd['thanhtien'];
            $tongtien += (int)$thanhtien;
            $row = [$check, $img, $tensanpham, $giasanpham, $soluong,  $thanhtien];
            $list[] = $row;
        }
        $data = [
            'chitiethoadon' => $list,
            'tongtien' => $tongtien
        ];
        echo json_encode($data);
    }
    //add hoa don
    public function addHoadon($idkhachhang)
    {
        $idnhanvientaohoadon = $_SESSION['idnhanvien'];
        $ngaytaohoadon = date("Y-m-d");
        $ngaythanhtoanhoadon = null;
        $idnhanvienthanhtoanhoadon = "0";
        $tongtien = 0;
        $row = $this->hoadon->addHoadon($ngaytaohoadon, $ngaythanhtoanhoadon, $idnhanvientaohoadon, $idnhanvienthanhtoanhoadon, $idkhachhang, $tongtien);
        return $row;
    }
    //add chi tiet hoa don
    public function addChitiethoadon()
    {
        $row = 0;
        $idsanpham = $this->getValue(1, "idsanpham", "");
        $soluong = $this->getValue(1, "soluong", "");
        $giasanpham = $this->getValue(1, "giasanpham", "");
        $thanhtien = (int)$soluong * (int)$giasanpham;
        $idkhachhang = "0";
        // get hoa don chua thanh toan tu id khach hang
        $hoadon = $this->hoadon->getHoadonChuathanhtoanByIdKhachhang($idkhachhang);
        if (count($hoadon) > 0) { // co hoa don => get id hoa don da ton tai
            $idhoadon = $hoadon[0]['idhoadon'];
            // get chi tiet hoa don by id hoa don va id san pham
            $chitiethoadon = $this->chitiethoadon->getHoadonByIdhoadonAndIdsanpham($idhoadon, $idsanpham);
            if (count($chitiethoadon) > 0) { //co => edit chi tiet hoa don
                //cap nhat so luong && thanh tien cua chi tiet hoa don
                $soluong += $chitiethoadon[0]['soluong'];
                $thanhtien = (int)$soluong * (int)$giasanpham;
                $row = $this->chitiethoadon->editChitiethoadonByIdhoadonAndByIdsanpham($idhoadon, $idsanpham, $soluong, $thanhtien);
            } else { //khong co => them chi tiet hoa don
                $row = $this->chitiethoadon->addChitiethoadonByIdhoadon($idhoadon, $idsanpham, $soluong, $thanhtien);
            }
        } else { //khong co hoa don => tao hoa don moi
            $row = $this->addHoadon($idkhachhang);
            if ($row > 0) { //tao hoa don moi thanh cong
                //=> get id hoa don moi
                $idhoadon = $this->hoadon->getHoadonNew()[0]['idhoadon'];
                //=> them chi tiet hoa don vao hoa don moi duoc them vao
                $row = $this->chitiethoadon->addChitiethoadonByIdhoadon($idhoadon, $idsanpham, $soluong, $thanhtien);
            }
        }
        echo $row;
    }
    public function updateChitiethoadonByIdchitiethoadon()
    {
        $idchitiethoadon = $this->getValue(1, "idchitiethoadon", "");
        $soluong = $this->getValue(1, "soluong", "");
        $giasanpham = $this->getValue(1, "giasanpham", "");
        $thanhtien = $soluong * $giasanpham;
        $row = $this->chitiethoadon->updateChitiethoadonByIdchitiethoadon($idchitiethoadon, $soluong, $thanhtien);
        echo $row;
    }
}
