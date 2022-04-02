<?php
class cloaisanpham extends controller
{
    private $loaisanpham;
    public function __construct()
    {
        $this->loaisanpham = $this->model("mloaisanpham");
    }
    //view display list loai san pham
    public function list()
    {
        $this->view("loaisanpham", "list");
    }
    //view display detail  loai san pham
    public function detail()
    {
        $this->view("loaisanpham", "detail");
    }
    //view display add loai san pham
    public function add()
    {
        $this->view("loaisanpham", "add");
    }
    //view display edit loai san pham
    public function edit()
    {
        $this->view("loaisanpham", "edit");
    }
    //get all loai san pham
    public function getLoaisanpham()
    {
        $loaisanpham = $this->loaisanpham->getLoaisanpham();
        $data = ['data' => $loaisanpham];
        echo json_encode($data);
    }
    //load table loai san pham
    public function loadTableLoaisanpham()
    {
        $loaisanpham = $this->loaisanpham->getLoaisanpham();
        $data = [];
        $stt = 0;
        foreach ($loaisanpham as $lsp) {
            $stt++;
            $idloaisanpham = $lsp['idloaisanpham'];
            $tenloaisanpham = $lsp['tenloaisanpham'];
            $edit = '<a href="#" onclick="editLoaisanpham(' . $idloaisanpham . ')" class="a-edit">Sửa</a>';
            $delete = '<a href="#" class="a-delete" onclick="deleteLoaisanpham(' . $idloaisanpham . ')">Xóa</a>';
            $row = [$stt, $tenloaisanpham, $edit, $delete];
            $data[] = $row;
        }
        echo json_encode($data);
    }
    //add loai san pham
    public function addLoaisanpham()
    {
        $tenloaisanpham = $this->getValue(1, "tenloaisanpham", "");
        echo json_encode($this->loaisanpham->addLoaisanpham($tenloaisanpham));
    }
    //edit loai san pham
    public function editLoaisanphamByIdloaisanpham()
    {
        $idloaisanpham = $this->getValue(1, "idloaisanpham", "");
        $tenloaisanpham = $this->getValue(1, "tenloaisanpham", "");
        echo json_encode($this->loaisanpham->editLoaisanphamByIdloaisanpham($idloaisanpham, $tenloaisanpham));
    }
    //delete loai san pham by id loai san pham
    public function deleteLoaisanphamByIdloaisanpham()
    {
        $idloaisanpham = $this->getValue(1, "idloaisanpham", "");
        echo json_encode($this->loaisanpham->deleteLoaisanphamByIdloaisanpham($idloaisanpham));
    }
}
