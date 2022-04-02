<?php
class cchitietsanpham extends controller
{
    private $chitietsanpham;
    private $sanpham;
    public function __construct()
    {
        $this->sanpham = $this->model("msanpham");
        $this->chitietsanpham = $this->model("mchitietsanpham");
    }
    //
    public function getChitietsanpham()
    {
        echo json_encode($this->chitietsanpham->getChitietsanpham());
    }
    //get chi tiet san pham by id san pham
    public function getChitietsanphamByIdsanpham()
    {
        $idsanpham = $this->getValue(1, "idsanpham", "");
        echo json_encode([
            'data' => $this->chitietsanpham->getChitietsanphamByIdsanpham($idsanpham)
        ]);
    }
    public function addChitietsanpham()
    {
        $idsanpham = $this->sanpham->getSanphamNew()[0]['idsanpham'];
        $xuatxu = $this->getValue(1, "xuatxu", "");
        $thuonghieu = $this->getValue(1, "thuonghieu", "");
        $ngaysanxuat = $this->getValue(1, "ngaysanxuat", "Chưa cập nhật");
        $thoigianbaohanh = $this->getValue(1, "thoigianbaohanh", "");
        $num = $this->chitietsanpham->addChitietsanpham($idsanpham, $xuatxu, $thuonghieu, $ngaysanxuat, $thoigianbaohanh);
        echo $num;
    }
    //edit chi tiet san pham by id san pham
    public function updateChitietsanphamByIdsanpham()
    {
        $idsanpham = $this->getValue(1, "idsanpham", "");
        $xuatxu = $this->getValue(1, "xuatxu");
        $thuonghieu = $this->getValue(1, "thuonghieu", "");
        $ngaysanxuat = $this->getValue(1, "ngaysanxuat", "Chưa cập nhật");
        $thoigianbaohanh = $this->getValue(1, "thoigianbaohanh", "");
        $chitietsanpham = $this->chitietsanpham->getChitietsanphamByIdsanpham($idsanpham);
        if (count($chitietsanpham) > 0) {
            $num = $this->chitietsanpham->updateChitietsanphamByIdsanpham($idsanpham, $xuatxu, $thuonghieu, $ngaysanxuat, $thoigianbaohanh);
            echo $num;
        } else {
            $num = $this->chitietsanpham->addChitietsanpham($idsanpham, $xuatxu, $thuonghieu, $ngaysanxuat, $thoigianbaohanh);
            echo $num;
        }
    }
}
