<?php
class cgiaodien extends controller
{
    private $giaodien;
    public function __construct()
    {
        $this->giaodien = $this->model('mgiaodien');
    }
    //
    public function getGiaodienByIdshop()
    {
        $idshop = $this->getValue(1, "idshop");
        $giaodien = $this->giaodien->getGiaodienByIdshop($idshop);
        $data = ['data' => $giaodien];
        echo json_encode($data);
    }
    //
    public function updateGiaodien()
    {
        $status = false;
        $message = "Cập nhật thất bại!";
        $idshop = $_SESSION['shop']['idshop'];
        $backgroundheader = $this->getValue(1, "backgroundheader", "#f8f9fa");
        $textheader = $this->getValue(1, "textheader", "#f8f9fa");
        $backgroundbody = $this->getValue(1, "backgroundbody", "#f8f9fa");
        $textbody = $this->getValue(1, "textbody", "#f8f9fa");
        $backgroundnav = $this->getValue(1, "backgroundnav");
        $textnav = $this->getValue(1, "textnav");
        $giaodien = $this->giaodien->getGiaodienByIdshop($idshop);
        if (count($giaodien) > 0) {
            //update giao dien
            $row = $this->giaodien->updateGiaodien($idshop, $backgroundheader, $textheader, $backgroundbody, $textbody, $backgroundnav, $textnav);
            if ($row > 0) {
                $status = true;
                $message = "Cập nhật thành công!";
            }
        } else {
            //add giao dien
            $row = $this->giaodien->addGiaodien($idshop, $backgroundheader, $textheader, $backgroundbody, $textbody, $backgroundnav, $textnav);
            if ($row > 0) {
                $status = true;
                $message = "Cập nhật thành công!";
            }
        }
        echo json_encode(
            [
                'status' => $status,
                'message' => $message
            ]
        );
    }
}
