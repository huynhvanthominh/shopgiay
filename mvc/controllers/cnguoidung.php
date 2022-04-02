<?php
class cnguoidung extends controller
{
    private $nguoidung;
    private $diachinhanhang;
    public function __construct()
    {
        $this->nguoidung = $this->model('mnguoidung');
        $this->diachinhanhang = $this->model('mdiachinhanhang');
    }
    // get nguoi dung by so dien thoai and mat khau
    public function getNguoidungBySodienthoatAndMatkhau()
    {
        $sodienthoai = $this->getValue(1, "sodienthoai");
        $matkhau = $this->getValue(1, "matkhau");
        $nguoidung = $this->nguoidung->getNguoidungBySodienthoatAndMatkhau($sodienthoai, $matkhau);
        if (count($nguoidung) > 0) {
            if (strcmp($matkhau, $nguoidung[0]['matkhau']) == 0 && strcmp($sodienthoai, $nguoidung[0]['sodienthoai']) == 0) {
                $_SESSION['nguoidung'] = [
                    'idnguoidung' => $nguoidung[0]['idnguoidung'],
                    'sodienthoai' =>  $nguoidung[0]['sodienthoai'],
                    'tenhienthi' => $nguoidung[0]['tenhienthi'],
                    'email' => $nguoidung[0]['email'],
                    'diachi' => $nguoidung[0]['diachi'],
                    'hinhanh' => $nguoidung[0]['hinhanh'],
                    'loainguoidung' => $nguoidung[0]['loainguoidung'],
                    'time' => time()
                ];
            } else {
                $nguoidung = [];
            }
        }
        $data = [
            'data' => $nguoidung
        ];
        echo json_encode($data);
    }
    // get nguoi dung by so dien thoai
    public function getNguoidungBySodienthoai()
    {
        $sodienthoai = $this->getValue(1, "sodienthoai", "");
        $nguoidung = $this->nguoidung->getNguoidungBySodienthoai($sodienthoai);
        $data = [
            'data' => $nguoidung
        ];
        echo json_encode($data);
    }
    // add nguoi dung
    public function addNguoidung()
    {
        $sodienthoai = $this->getValue(1, "sodienthoai", "");
        $tenhienthi = $this->getValue(1, "tenhienthi", "");
        $matkhau = $this->getValue(1, "matkhau", "");
        $email = $this->getValue(1, "email");
        $diachi = $this->getValue(1, "diachi");
        $hinhanh = strlen($this->getValue(1, "hinhanh")) > 0 ? $this->getValue(1, "hinhanh") : 'nguoidung.png';
        $row = $this->nguoidung->addNguoidung($sodienthoai, $tenhienthi, $matkhau, $email, $diachi, $hinhanh);
        if ($row > 0) {
            $idnguoidung = $this->nguoidung->getNguoidungNew()[0]['idnguoidung'];
            $this->diachinhanhang->addDiachinhanhang($idnguoidung, $diachi);
            echo json_encode(
                [
                    'status' => true,
                    'message' => "Thành công!"
                ]
            );
        } else if ($row ==  0) {
            echo json_encode(
                [
                    'status' => false,
                    'message' => "Thất bại!"
                ]
            );
        } else {
            echo json_encode(
                [
                    'status' => false,
                    'message' => $row
                ]
            );
        }
    }
    // update nguoi dung by so dien thoai
    public function updateNguoidungBySodienthoai()
    {
        $sodienthoaihientai = $this->getValue(1, "sodienthoaihientai");
        $sodienthoai = $this->getValue(1, "sodienthoai", "");
        $tenhienthi = $this->getValue(1, "tenhienthi", "");
        $email = $this->getValue(1, "email");
        $diachi = $this->getValue(1, "diachi");
        $hinhanhhientai = $this->getValue(1, "hinhanhhientai");
        $hinhanh = $this->getValue(1, "hinhanh");
        $row = $this->nguoidung->updateNguoidungBySodienthoai($sodienthoaihientai, $sodienthoai, $tenhienthi, $email, $diachi, $hinhanh);
        if ($row > 0) {
            if (strcmp($sodienthoaihientai, $_SESSION['nguoidung']['sodienthoai']) == 0) {
                $_SESSION['nguoidung'] = [
                    'idnguoidung' => $_SESSION['nguoidung']['idnguoidung'],
                    'sodienthoai' =>  $sodienthoai,
                    'tenhienthi' => $tenhienthi,
                    'email' => $email,
                    'diachi' => $diachi,
                    'hinhanh' => $hinhanh,
                    'loainguoidung' => $_SESSION['nguoidung']['loainguoidung'],
                    'time' => time()
                ];
            }
            if (strcmp($hinhanhhientai, 'nguoidung.png') !== 0) {
                unlink(img . "nguoidung/" . $hinhanhhientai);
            }
            echo json_encode(
                [
                    'status' => true,
                    'message' => "Thành công!"
                ]
            );
        } else if ($row == 0) {
            echo json_encode(
                [
                    'status' => false,
                    'message' => "Không có dữ liệu thay đổi!"
                ]
            );
        } else {
            echo json_encode(
                [
                    'status' => false,
                    'message' => $row
                ]
            );
        }
    }
    //
    public function doimatkhau()
    {
        $status = "false";
        $message = "Đổi mật khẩu thất bại!";
        $sodienthoai = $_SESSION['nguoidung']['sodienthoai'];
        $matkhauhientai = $this->getValue(1, "matkhauhientai");
        $matkhaumoi = $this->getValue(1, "matkhaumoi");
        $nguoidung = $this->nguoidung->getNguoidungBySodienthoatAndMatkhau($sodienthoai, $matkhauhientai);
        if (count($nguoidung) > 0) {
            $row = $this->nguoidung->doimatkhauBySodienthoai($sodienthoai, $matkhaumoi);
            if ($row > 0) {
                $status = true;
                $message = "Đổi mật khẩu thành công!";
            }
        } else {
            $message = "Mật khẩu hiện tại không đúng!";
        }
        echo json_encode([
            'status' => $status,
            'message' => $message
        ]);
    }
}
