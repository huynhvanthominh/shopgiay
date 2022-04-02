<?php
class cbanner extends controller
{
    private $banner;
    public function __construct()
    {
        $this->banner = $this->model('mbanner');
    }
    //
    public function getBannerByIdshop()
    {
        $idshop = $_SESSION['shop']['idshop'];
        $banner = $this->banner->getBannerByIdshop($idshop);
        $data = ['data' => $banner];
        echo json_encode($data);
    }
    //
    public function addBanner()
    {
        $idshop = $_SESSION['shop']['idshop'];
        $hinhanh = $this->getValue(1, "hinhanh");
        $row = $this->banner->addBanner($idshop, $hinhanh);
        echo $row;
    }
    //
    public function deleteBannerByHinhanh()
    {
        $hinhanh = $this->getValue(1, "hinhanh");
        $row = $this->banner->deleteBannerByHinhanh($hinhanh);
        $status = false;
        $message = "Xóa thất bại!";
        if ($row > 0) {
            $status = true;
            $message = "Xóa thành công!";
            unlink(img . "banner/$hinhanh");
        }
        echo json_encode([
            'status' => $status,
            'message' => $message
        ]);
    }
}
