<?php
class chinhanhsanpham extends controller
{
    private $hinhanhsanpham;
    private $sanpham;
    public function __construct()
    {
        $this->hinhanhsanpham = $this->model("mhinhanhsanpham");
        $this->sanpham = $this->model("msanpham");
    }
    //get hinh anh san pham by id san pham
    public function getHinhanhsanphamByIdsanpham()
    {
        $idsanpham = $this->getValue(1, "idsanpham", []);
        echo json_encode(['data' => $this->hinhanhsanpham->getHinhanhsanphamByIdsanpham($idsanpham)]);
    }
    //add hinh anh san pham by san pham new
    public function addHinhanhsanpham()
    {
        $idsanpham = $this->sanpham->getSanphamNew()[0]['idsanpham'];
        $duongdan = isset($_POST['hinhanh']) ? $_POST['hinhanh'] : [];
        $num = 0;
        if (count($duongdan) > 0) {
            foreach ($duongdan as $item) {
                $num = $this->hinhanhsanpham->addHinhanhsanpham($idsanpham, $item);
            }
        }
        echo $num;
    }
    //add hinh anh san pham by id san pham
    public function addHinhanhsanphamByIdsanpham()
    {
        $idsanpham = $this->getValue(1, "idsanpham", "");
        $duongdan = isset($_POST['duongdan']) ? $_POST['duongdan'] : [];
        $num = -2;
        if (count($duongdan) > 0) {
            foreach ($duongdan as $dd) {
                $num = $this->hinhanhsanpham->addHinhanhsanpham($idsanpham, $dd);
            }
        }
        echo $num;
    }
    public function updateHinhanhsanphamByIdsanpham()
    {
        $idsanpham = $this->getValue(1, "idsanpham", "");
        $hinhanhsanphamhientai = isset($_POST['hinhanhsanphamhientai']) ? $_POST['hinhanhsanphamhientai'] : [];
        $hinhanh = isset($_POST['hinhanh']) ? $_POST['hinhanh'] : [];
        $row = 0;
        if (count($hinhanh) > 0) {
            if (count(array_diff($hinhanh, $hinhanhsanphamhientai)) > 0) {
                $row = $this->hinhanhsanpham->deleteHinhanhsanphamByIdsanpham($idsanpham);
                if ($row > 0) {
                    $row = 0;
                    foreach ($hinhanhsanphamhientai as $item) {
                        if (strcmp($item, "sanpham.png") != 0) {
                            unlink(img . "sanpham/$item");
                        }
                    }
                }
                foreach ($hinhanh as $item) {
                    $row += $this->hinhanhsanpham->addHinhanhsanpham($idsanpham, $item);
                }
            }
        }
        echo $row;
    }
}
