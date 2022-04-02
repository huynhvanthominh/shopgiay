<?php
class csizegiay extends controller
{
    private $sizegiay;
    private $sanpham;
    public function __construct()
    {
        $this->sanpham = $this->model('msanpham');
        $this->sizegiay = $this->model('msizegiay');
    }
    //
    public function getSizegiayByIdsanpham()
    {
        $idsanpham = $this->getValue(1, "idsanpham", "");
        $data = [
            'data' => $this->sizegiay->getSizegiayByIdsanpham($idsanpham)
        ];
        echo json_encode($data);
    }
    //
    public function addSizegiay()
    {
        $idsanpham = $this->sanpham->getSanphamNew()[0]['idsanpham'];
        $size = isset($_POST['sizegiay']) ? $_POST['sizegiay'] : [];
        $row = 0;
        foreach ($size as $item) {
            $row += $this->sizegiay->addSizegiay($idsanpham, $item);
        }
        echo json_encode($row);
    }
    public function updateSizegiay()
    {
        $idsanpham = $this->getValue(1, "idsanpham");
        $sizegiayhientai = isset($_POST['sizegiayhientai']) ? $_POST['sizegiayhientai'] : [];
        $size = isset($_POST['sizegiay']) ? $_POST['sizegiay'] : [];
        $row = 0;
        if (count(array_diff($size, $sizegiayhientai)) > 0 || count($sizegiayhientai) !==  count($size)) {
            $this->sizegiay->deleteSizeGiayByIdsanpham($idsanpham);
            foreach ($size as $item) {
                $row += $this->sizegiay->addSizegiay($idsanpham, $item);
            }
        }
        echo json_encode($row);
    }
}
