<?php
class cgiohang extends controller
{
    private $giohang;
    public function __construct()
    {
        $this->giohang = $this->model('mgiohang');
    }
    //
    public function getGiohangByIdnguoidung()
    {
        $giohang = [];
        $nguoidung = isset($_SESSION['nguoidung']['idnguoidung']) ? $_SESSION['nguoidung']['idnguoidung'] : -999;
        if (strcmp($nguoidung, -999) !== 0) {
            $giohang = $this->giohang->getGiohangByIdnguoidung($nguoidung);
        }
        $data = [
            'data' => $giohang
        ];
        echo json_encode($data);
    }
    //
    public function addGiohang()
    {
        $row = 0;
        $nguoidung = $_SESSION['nguoidung']['idnguoidung'];
        $soluongtonkho = $this->getValue(1, "soluongtonkho");
        $idsanpham = $this->getValue(1, "idsanpham");
        $soluong = $this->getValue(1, 'soluong');
        $giasanpham = $this->getValue(1, "giasanpham");
        $idsizegiay = $this->getValue(1, "idsizegiay");
        $thanhtien = (int)$soluong * (int)$giasanpham;
        $giohang = $this->giohang->getGiohangByIdsizegiay($idsizegiay);
        if (count($giohang) > 0) {
            $idgiohang = $giohang[0]['idgiohang'];
            $soluonghientai = $giohang[0]['soluong'];
            $soluong += $soluonghientai;
            if ($soluong > $soluongtonkho) {
                $row = -999;
            } else {
                $thanhtien = (int)$soluong * (int)$giasanpham;
                $row = $this->giohang->updateGiohangByIdgiohang($idgiohang, $soluong, $thanhtien);
            }
        } else {
            $row = $this->giohang->addGiohang($nguoidung, $idsanpham, $soluong, $thanhtien, $idsizegiay);
        }
        if ($row > 0) {
            echo json_encode([
                'status' => true,
                'message' => "Thêm thành công"
            ]);
        } else if ($row == 0) {
            echo json_encode([
                'status' => false,
                'message' => "Thêm thất bại"
            ]);
        } else if ($row == -999) {
            echo json_encode([
                'status' => false,
                'message' => "Vượt quá số lượng sản phẩm còn lại trong kho"
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'message' => $row
            ]);
        }
    }
    //
    public function updateGiohangByIdgiohang()
    {
        $idgiohang = $this->getValue(1, "idgiohang");
        $soluong = $this->getValue(1, "soluong", "");
        $giasanpham = $this->getValue(1, "giasanpham");
        $thanhtien = (int)$soluong * (int)$giasanpham;
        $row = $this->giohang->updateGiohangByIdgiohang($idgiohang, $soluong, $thanhtien);
        if ($row > 0) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false, 'message' => "Thất bại"]);
        }
    }
    public function deleteGiohangByIdgiohang()
    {
        $idgiohang =  $this->getValue(1, "idgiohang");
        $row = $this->giohang->deleteGiohangByIdgiohang($idgiohang);
        $status = false;
        $message = "Xóa thất bại!";
        if ($row  > 0) {
            $status = true;
            $message = "Xóa thành công!";
        } else if ($row == 0) {
        } else {
            $message = $row;
        }
        echo json_encode(['status' => $status, 'message' => $message]);
    }
}
