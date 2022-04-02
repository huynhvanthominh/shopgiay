<?php
class csanpham extends controller
{
    private $sanpham;
    private $shop;
    public function __construct()
    {
        $this->shop = $this->model('mshop');
        $this->sanpham = $this->model("msanpham");
    }
    // view display list san pham
    public function list()
    {
        $this->view("sanpham", "list");
    }
    //view display detail san pham
    public function detail()
    {
        $this->view("sanpham", "detail");
    }
    //view display edit san pham
    public function editSanpham()
    {
        $idsanpham = $this->getValue(0, "idsanpham", "");
        $this->view("sanpham", "edit", $idsanpham);
    }
    //view display add san pham
    public function add()
    {
        $this->view("sanpham", "add");
    }
    //get top san pham new
    public function getTopSanphamNew()
    {
        $limit = 12;
        $sanpham = $this->sanpham->getTopSanphamNew($limit);
        $data = ['data' => $sanpham];
        echo json_encode($data);
    }
    //get all san pham
    public function getSanpham()
    {
        $sanpham = $this->sanpham->getSanpham();
        $data = ['data' => $sanpham];
        echo json_encode($data);
    }
    //
    public function getSanphamByIdloaisanpham()
    {
        $idloaisanpham = $this->getValue(1, "idloaisanpham", "");
        $sanpham = $this->sanpham->getSanphamByIdloaisanpham($idloaisanpham);
        $data = ['data' => $sanpham];
        echo json_encode($data);
    }
    // load table san pham
    public function tableSanpham()
    {
        $sanpham = $this->sanpham->getSanpham();
        $data = [];
        foreach ($sanpham as $sp) {
            $path = "/cuahangxehoi/public/img/sanpham/";
            $img = strlen($sp['hinhanh']) > 0 ? $sp['hinhanh'] : "xehoi.png";
            $img = '<button class="tb-img"><img src="' . $path . $img . '" alt=""></button>';
            $idsanpham = $sp['idsanpham'];
            $tensanpham = $sp['tensanpham'];
            $loaisanpham = $sp['tenloaisanpham'];
            $soluong = $sp['soluong'];
            $view = '<a class="a-view" href="?controller=csanpham&action=detail&idsanpham=' . $idsanpham . '">Xem</a>';
            $edit = '<a class="a-edit" href="?controller=csanpham&action=edit&idsanpham=' . $idsanpham . '">Sửa</a>';
            $delete = '<a class="a-delete" onclick=deleteSanpham(' . $idsanpham . ')>Xóa</a>';
            $row = [$img, $tensanpham, $loaisanpham, $soluong, $view, $edit, $delete];
            $data[] = $row;
        }
        echo json_encode($data);
    }
    //
    public function timkiemSanpham()
    {
        $query = $this->getValue(1, "query");
        $sanpham = $this->sanpham->timkiemSanpham($query);
        $data = ['data' => $sanpham];
        echo json_encode($data);
    }
    //
    public function timkiemSanphamByTensanpham()
    {
        $tensanpham = $this->getValue(1, "tensanpham", "");
        $sanpham = $this->sanpham->timkiemSanphamByTensanpham($tensanpham);
        $data = ['data' => $sanpham];
        echo json_encode($data);
    }
    //
    public function getSanphamLimitByIdshop()
    {
        $idshop = $this->getValue(1, "idshop");
        $start = $this->getValue(1, "start");
        $line = $this->getValue(1, "line");
        $sanpham = $this->sanpham->getSanphamLimitByIdshop($idshop, $start, $line);
        $data = ['data' => $sanpham];
        echo json_encode($data);
    }
    //
    public function getSanphamLimit()
    {
        $start = $this->getValue(1, "start");
        $line = $this->getValue(1, "line");
        $sanpham = $this->sanpham->getSanphamLimit($start, $line);
        $data = ['data' => $sanpham];
        echo json_encode($data);
    }
    //
    public function getSanphamByTensanphamAndIdshop()
    {
        $idshop = $_SESSION['shop']['idshop'];
        $tensanpham = $this->getValue(1, "tensanpham");
        $sanpham = $this->sanpham->getSanphamByTensanphamAndIdshop($idshop, $tensanpham);
        $data = ['data' => $sanpham];
        echo json_encode($data);
    }
    //
    public function getSanphamBanchay()
    {
        $limit = 12;
        $sanpham = $this->sanpham->getSanphamBanchay($limit);
        $data = ['data' => $sanpham];
        echo json_encode($data);
    }
    //
    public function getSanphamByShop()
    {
        $idshop = $this->getValue(1, "idshop", -999);
        $shop = $idshop === -999 ? $_SESSION['shop']['idshop'] : $idshop;
        $sanpham = $this->sanpham->getSanphamByShop($shop);
        $data = ['data' => $sanpham];
        echo json_encode($data);
    }
    //get san pham by id san pham
    public function getSanphamByIdsanpham()
    {
        $idsanpham = $this->getValue(1, "idsanpham", "");
        echo json_encode(['data' => $this->sanpham->getSanphamByIdsanpham($idsanpham)]);
    }
    //add san pham
    public function addSanpham()
    {
        $tensanpham = $this->getValue(1, "tensanpham", "");
        $loaisanpham = $this->getValue(1, "loaisanpham", "");
        $motasanpham = $this->getValue(1, "motasanpham", "");
        $soluong = $this->getValue(1, "soluong", "");
        $giasanpham = $this->getValue(1, "giasanpham", "");
        $shop = $_SESSION['shop']['idshop'];
        $hinhanh = strlen($this->getValue(1, "hinhanh", "") > 0) ? $this->getValue(1, "hinhanh", "") : "sanpham.png";
        $row = $this->sanpham->addSanpham($tensanpham, $loaisanpham, $motasanpham, $soluong, $giasanpham, $hinhanh, $shop);
        if ($row > 0) {
            $sanpham = $this->sanpham->getSanphamByShop($shop);
            $this->shop->updateSoluongsanphamShopByIdshop($shop, count($sanpham));
        }
        echo json_encode($row);
    }
    //edit san pham by idsanpham
    public function updateSanphamByIdsanpham()
    {
        $idsanpham = $this->getValue(1, "idsanpham", "");
        $tensanpham = $this->getValue(1, "tensanpham", "");
        $loaisanpham = $this->getValue(1, "loaisanpham", "");
        $motasanpham = $this->getValue(1, "motasanpham");
        $soluong = $this->getValue(1, "soluong", "");
        $hinhanhhientai = $this->getValue(1, "hinhanhhientai", "");
        $hinhanh = $this->getValue(1, "hinhanh", "");
        $giasanpham = $this->getValue(1, "giasanpham", "");
        $num = $this->sanpham->updateSanphamByIdsanpham($idsanpham, $tensanpham, $loaisanpham, $motasanpham, $soluong, $giasanpham, $hinhanh);
        if ($num > 0) {
            if (strcmp($hinhanhhientai, $hinhanh) !== 0) {
                if (strcmp($hinhanhhientai, "sanpham.png") !== 0) {
                    unlink(img . "sanpham/$hinhanhhientai");
                }
            }
        }
        echo json_encode($num);
    }
    //delete san pham by id san pham
    public function deleteSanphamByIdsanpham()
    {
        $idsanpham = $this->getValue(1, "idsanpham", "");
        echo json_encode($this->sanpham->deleteSanphamByIdsanpham($idsanpham));
    }
}
