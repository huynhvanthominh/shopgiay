<?php
class cnhanvien extends controller
{
    private $nhanvien;
    public function __construct()
    {
        $this->nhanvien = $this->model("mnhanvien");
    }
    // view danh sach nhan vien
    public function list()
    {
        $this->view("nhanvien", "list");
    }
    // view change password
    public function changePassword()
    {
        $this->view("view", "changePassword");
    }
    //
    public function thongtincanhan()
    {
        $idnhanvien = $_GET['id'];
        $nhanvien = $this->nhanvien->getNhanvienByIdnhanvien($idnhanvien);
        $this->view("view", "thongtincanhan", $nhanvien);
    }
    // view edit nhan vien
    public function edit()
    {
        $this->view("nhanvien", "edit");
    }
    // view add nhan vien
    public function add()
    {
        $this->view("nhanvien", "add");
    }

    // view detail nhan vien
    public function detail()
    {
        $this->view("nhanvien", "detail");
    }
    public function getNhanvien()
    {
        $nhanvien = $this->nhanvien->getAllNhanvien();
        $data = [
            'data' => $nhanvien
        ];
        echo json_encode($data);
    }
    // get nhan vien by tai khoan and mat khau
    public function getNhanvienByTaikhoanAndMatkhau()
    {
        $taikhoan = $this->getValue(1, "taikhoan", "");
        $matkhau = $this->getValue(1, "matkhau", "");
        $nhanvien = $this->nhanvien->getNhanvienByTaikhoanAndMatkhau($taikhoan, $matkhau);
        if (count($nhanvien) > 0 && (!isset($_SESSION['idnhanvien']))) {
            session_create_id();
            $_SESSION['time'] = time();
            $_SESSION['taikhoan'] = $nhanvien[0]['taikhoan'];
            $_SESSION['tennhanvien'] = $nhanvien[0]['tennhanvien'];
            $_SESSION['idnhanvien'] = $nhanvien[0]['idnhanvien'];
            $_SESSION['chucvu'] = $nhanvien[0]['chucvu'];
            $_SESSION['hinhanh'] = $nhanvien[0]['hinhanh'];
        }
        echo json_encode($nhanvien);
    }
    // get nhan vien by id nhan vien
    public function getNhanvienByIdnhanvien()
    {
        $idnhanvien = $this->getValue(1, "idnhanvien", "");
        echo json_encode($this->nhanvien->getNhanvienByIdnhanvien($idnhanvien));
    }
    public function getNhanvienBySS()
    {
        echo json_encode($this->nhanvien->getNhanvienByIdnhanvien($_SESSION['idnhanvien']));
    }
    // get nhan vien by tai khoan
    public function getNhanvienByTaiKhoan()
    {
        $taikhoan = $this->getValue(1, "taikhoan", "");
        echo json_encode($this->nhanvien->getNhanvienByTaiKhoan($taikhoan));
    }
    //add nhan vien
    public function addNhanvien()
    {
        $taikhoan = $this->getValue(1, "taikhoan", "");
        $matkhau = $this->getValue(1, "matkhau", "");
        $tennhanvien = $this->getValue(1, "tennhanvien", "");
        $sodienthoai = $this->getValue(1, "sodienthoai", "");
        $email = $this->getValue(1, "email", "");
        $diachi = $this->getValue(1, "diachi", "");
        $ngayvao = $this->getValue(1, "ngayvao", "");
        $ngaynghi = $this->getValue(1, "ngaynghi", "");
        $chucvu = $this->getValue(1, "chucvu", "");
        $ghichu = $this->getValue(1, "ghichu", "");
        $hinhanh = strlen($this->getValue(1, "hinhanh", "")) ? $this->getValue(1, "hinhanh", "") : "nhanvien.png";
        echo json_encode($this->nhanvien->addNhanvien($taikhoan, $matkhau, $tennhanvien, $sodienthoai, $email, $diachi, $ngayvao, $ngaynghi, $chucvu, $ghichu, $hinhanh));
    }
    //update mat khau nhien vien by tai khoan
    public function updateMatkhauNhanvienByTaikhoan()
    {
        $taikhoan = $this->getValue(1, "taikhoan", "");
        $matkhau = $this->getValue(1, "matkhau", "");
        $row = $this->nhanvien->updateMatkhauNhanvienByTaikhoan($taikhoan, $matkhau);
        echo json_encode($row);
    }
    // update nhanvien by id nhan vien
    public function updateNhanvienByIdnhanvien()
    {
        $taikhoan = $this->getValue(1, "taikhoan", "");
        $idnhanvien = $this->getValue(1, "idnhanvien", "");
        $matkhau = $this->getValue(1, "matkhau", "");
        $tennhanvien = $this->getValue(1, "tennhanvien", "");
        $sodienthoai = $this->getValue(1, "sodienthoai", "");
        $email = $this->getValue(1, "email", "");
        $diachi = $this->getValue(1, "diachi", "");
        $ngayvao = $this->getValue(1, "ngayvao", "");
        $ngaynghi = $this->getValue(1, "ngaynghi", "");
        $chucvu = $this->getValue(1, "chucvu", "");
        $ghichu = $this->getValue(1, "ghichu", "");
        $hinhanh = $this->getValue(1, "hinhanh", "");
        $linkold = $this->getValue(1, "linkold", "");
        $row = $this->nhanvien->updateNhanvienByIdnhanvien($idnhanvien, $taikhoan, $matkhau, $tennhanvien, $sodienthoai, $email, $diachi, $ngayvao, $ngaynghi, $chucvu, $ghichu, $hinhanh);
        if ($row > 0 && strcmp($hinhanh, $linkold) != 0 && strlen($linkold) > 0) {
            if (strcmp($linkold, "nhanvien.png") !== 0) {
                unlink(__DIR__ . "/../../public/img/nhanvien/$linkold");
            }
        }
        echo json_encode($row);
    }
    // delete nhan vien by id nhan vien
    public function delelteNhanvienByIdnhanvien()
    {
        $idnhanvien = $this->getValue(1, "idnhanvien", "Lỗi");
        echo json_encode($this->nhanvien->deleteNhanvienByIdnhanvien($idnhanvien));
    }
}
