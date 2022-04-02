<?php
class mnhanvien extends database
{
    private $table = "nhanvien";
    //function get all nhan vien from database nhan vien
    public function getAllNhanvien()
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = ['xoa'];               // dieu kien where column
        $wherev = [0];               // dieu kien where value
        $object = [];               // dieu kien object
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //function get nhan vien by tai khoan and mat khau
    public function getNhanvienByTaikhoanAndMatkhau($taikhoan, $matkhau)
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = ['taikhoan', "matkhau", 'xoa'];               // dieu kien where column
        $wherev = [$taikhoan, $matkhau, 0];               // dieu kien where value
        $object = [0, 0];               // dieu kien object
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //function get nhan vien by id nhan vien
    public function getNhanvienByIdnhanvien($idnhanvien)
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = ['idnhanvien'];               // dieu kien where column
        $wherev = [$idnhanvien];               // dieu kien where value
        $object = [];               // dieu kien object
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //function get nhan vien by tai khoan nhan vien
    public function getNhanvienByTaiKhoan($taikhoan)
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = ['taikhoan'];               // dieu kien where column
        $wherev = [$taikhoan];               // dieu kien where value
        $object = [];               // dieu kien object
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //function add Nhan vien
    public function addNhanvien($taikhoan, $matkhau, $tennhanvien, $sodienthoai, $email, $diachi, $ngayvao, $ngaynghi, $chucvu, $ghichu, $hinhanh)
    {
        $table = "$this->table";
        $column = ['taikhoan', "matkhau", "tennhanvien", "sodienthoai", "email", "diachi", "ngayvao", "ngaynghi", "chucvu", "ghichu", "hinhanh"];
        $value = [$taikhoan, $matkhau, $tennhanvien, $sodienthoai, $email, $diachi, $ngayvao, $ngaynghi, $chucvu, $ghichu, $hinhanh];
        return $this->insert($table, $column, $value);
    }
    // update pass word by taikhoan
    public function updateMatkhauNhanvienByTaikhoan($taikhoan, $matkhau)
    {
        $table = "$this->table";
        $column = ['matkhau'];
        $value = [$matkhau];
        $wherec = ['taikhoan'];
        $wherev = [$taikhoan];
        $object = [];
        return $this->update($table, $column, $value, $wherec, $wherev, $object);
    }
    //function update nhanvien by id nhan vien
    public function updateNhanvienByIdnhanvien($idnhanvien, $taikhoan, $matkhau, $tennhanvien, $sodienthoai, $email, $diachi, $ngayvao, $ngaynghi, $chucvu, $ghichu, $hinhanh)
    {
        $table = "$this->table";
        $column = ['taikhoan', "matkhau", "tennhanvien", "sodienthoai", "email", "diachi", "ngayvao", "ngaynghi", "chucvu", "ghichu", "hinhanh"];
        $value = [$taikhoan, $matkhau, $tennhanvien, $sodienthoai, $email, $diachi, $ngayvao, $ngaynghi, $chucvu, $ghichu, $hinhanh];
        $wherec = ['idnhanvien'];
        $wherev = [$idnhanvien];
        $object = [];
        return $this->update($table, $column, $value, $wherec, $wherev, $object);
    }
    //function delete nhan vien by id nhan vien
    public function deleteNhanvienByIdnhanvien($idnhanvien)
    {
        $table = "$this->table";
        $column = ['xoa'];
        $value = [1];
        $wherec = ['idnhanvien'];
        $wherev = [$idnhanvien];
        $object = [];
        return $this->update($table, $column, $value, $wherec, $wherev, $object);
    }
}
