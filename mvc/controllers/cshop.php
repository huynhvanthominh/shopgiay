<?php
class cshop extends controller
{
    private $shop;
    public function __construct()
    {
        $this->shop = $this->model('mshop');
    }
    //
    public function list()
    {
        $this->view('shop', 'list');
    }
    //
    public function detail()
    {
        $idshop = base64_decode(base64_encode($this->getValue(0, "idshop", "")));
        $this->view('shop', 'detail', $idshop);
    }
    //
    public function getShop()
    {
        $shop = $this->shop->getShop();
        $data = ['data' => $shop];
        echo json_encode($data);
    }
    //
    public function getShopByIdshop()
    {
        $idshop = $this->getValue(1, "idshop");
        $shop = $this->shop->getShopByIdshop($idshop);
        $data = ['data' => $shop];
        echo json_encode($data);
    }
    //
    public function getShopByTenshop()
    {
        $tenshop = $this->getValue(1, "tenshop");
        $shop = $this->shop->getShopByTenshop($tenshop);
        $data = ['data' => $shop];
        echo json_encode($data);
    }
    //
    public function getShopByNguoidung()
    {
        $nguoidung = $_SESSION['nguoidung']['idnguoidung'];
        $shop = $this->shop->getShopByNguoidung($nguoidung);
        if (count($shop) > 0) {
            $s = $shop[0];
            $_SESSION['shop'] = [
                'idshop' => $s['idshop'],
                'tenshop' => $s['tenshop'],
                'hinhanh' => $s['hinhanh'],
                'diachi' => $s['diachi'],
                'sodienthoai' => $s['sodienthoai'],
                'email' => $s['email']
            ];
        }
        $data = [
            'data' => $shop
        ];
        echo json_encode($data);
    }
    //
    public function addShop()
    {
        $nguoidung = $_SESSION['nguoidung']['idnguoidung'];
        $tenshop = $this->getValue(1, "tenshop");
        $sodienthoai = $this->getValue(1, "sodienthoai");
        $email = $this->getValue(1, "email");
        $diachi = $this->getValue(1, "diachi");
        $hinhanh = $this->getValue(1, "hinhanh");
        $row = $this->shop->addShop($nguoidung, $tenshop, $sodienthoai, $email, $diachi, $hinhanh);
        if ($row > 0) {
            $shop = $this->shop->getShopByNguoidung($nguoidung);
            if (count($shop) > 0) {
                $s = $shop[0];
                $_SESSION['shop'] = [
                    'idshop' => $s['idshop'],
                    'tenshop' => $s['tenshop'],
                    'hinhanh' => $s['hinhanh'],
                    'diachi' => $s['diachi'],
                    'sodienthoai' => $s['sodienthoai'],
                    'email' => $s['email']
                ];
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
    //
    public function updateShopByIdshop()
    {
        $status = false;
        $message = "Cập nhật thất bại!";
        $idshop = $_SESSION['shop']['idshop'];
        $tenshop = $this->getValue(1, "tenshop");
        $sodienthoai = $this->getValue(1, "sodienthoai");
        $email = $this->getValue(1, "email");
        $diachi = $this->getValue(1, "diachi");
        $hinhanh = strlen($this->getValue(1, "hinhanh")) > 0 ? $this->getValue(1, "hinhanh") : $_SESSION['shop']['hinhanh'];
        $row = $this->shop->updateShopByIdshop($idshop, $tenshop, $sodienthoai, $email, $diachi, $hinhanh);
        if ($row > 0) {
            if (strcmp($hinhanh, $_SESSION['shop']['hinhanh']) !== 0) {
                unlink(img . "shop/" . $_SESSION['shop']['hinhanh']);
            }
            $_SESSION['shop'] = [
                'idshop' => $_SESSION['shop']['idshop'],
                'tenshop' => $tenshop,
                'sodienthoai' => $sodienthoai,
                'email' => $email,
                'diachi' => $diachi,
                'hinhanh' => $hinhanh
            ];
            $status = true;
            $message = "Cập nhật thành công!";
        }
        echo json_encode([
            'status' => $status,
            'message' => $message
        ]);
    }
    //
    public function deleteShopByIdshop()
    {
        $idshop = $this->getValue(1, "idshop");
        $row = $this->shop->deleteShopByIdshop($idshop);
        if ($row > 0) {
            echo json_encode([
                'status' => true,
                'message' => "Xóa thành công!"
            ]);
        } else if ($row <= 0) {
            echo json_encode([
                'status' => false,
                'message' => "Thất bại"
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'message' => $row
            ]);
        }
    }
}
