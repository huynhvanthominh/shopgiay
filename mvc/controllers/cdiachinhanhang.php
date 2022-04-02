<?php

class cdiachinhanhang extends controller
{
    private $diachinhanhang;
    public function __construct()
    {
        $this->diachinhanhang = $this->model("mdiachinhanhang");
    }
    public function getDiachinhanhangByIdnguoidung()
    {
        $idnguoidung = $_SESSION['nguoidung']['idnguoidung'];
        $diachinhanhang = $this->diachinhanhang->getDiachinhanhangByIdnguoidung($idnguoidung);
        $data = [
            'data' => $diachinhanhang
        ];
        echo json_encode($data);
    }
    //

    public function addDiachinhanhang()
    {
        $diachi = $this->getValue(1, "diachi");
        $idnguoidung = $_SESSION['nguoidung']['idnguoidung'];
        $row = $this->diachinhanhang->addDiachinhanhang($idnguoidung, $diachi);
        $message = "Thêm thất bại!";
        $status = false;
        if ($row > 0) {
            $status = true;
            $message = "Thêm thành công!";
        }
        echo json_encode([
            'status' => $status,
            'message' => $message
        ]);
    }
}
