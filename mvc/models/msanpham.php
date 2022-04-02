<?php
class msanpham extends database
{
    private $table = "sanpham";
    // get top san pham new
    public function getTopSanphamNew($limit)
    {
        $table = [$this->table, "loaisanpham"];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = ['sanpham.idloaisanpham'];                // dieu kien jion
        $jionv = ['loaisanpham.idloaisanpham'];                // dieu kien jion
        $wherec = ['sanpham.xoa'];               // dieu kien where column
        $wherev = [0];               // dieu kien where value
        $object = [];               // dieu kien object 1 la OR || 0 la And
        $sortc = 'idsanpham';              // sap xem bo cot
        $sort = 0;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = $limit;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //
    public function getSanphamByIdloaisanpham($idloaisanpham)
    {
        $table = [$this->table, "loaisanpham"];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = ['sanpham.idloaisanpham'];                // dieu kien jion
        $jionv = ['loaisanpham.idloaisanpham'];                // dieu kien jion
        $wherec = ['sanpham.xoa', 'sanpham.idloaisanpham'];               // dieu kien where column
        $wherev = [0, $idloaisanpham];               // dieu kien where value
        $object = [0];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    // get all san pham
    public function getSanpham()
    {
        $table = [$this->table, "loaisanpham", 'shop'];    // ten table
        $column = [
            'sanpham.idsanpham',
            "sanpham.hinhanh",
            "sanpham.tensanpham",
            "sanpham.giasanpham",
            "sanpham.soluong",
            "loaisanpham.tenloaisanpham",
            "shop.tenshop"
        ];            // cot hien thi
        $jionc = ['sanpham.idloaisanpham', 'sanpham.shop'];                // dieu kien jion
        $jionv = ['loaisanpham.idloaisanpham', 'shop.idshop'];                // dieu kien jion
        $wherec = ['sanpham.xoa'];               // dieu kien where column
        $wherev = [0];               // dieu kien where value
        $object = [];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //get san pham new
    public function getSanphamNew()
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = ['sanpham.xoa'];               // dieu kien where column
        $wherev = [0];               // dieu kien where value
        $object = [];               // dieu kien object 1 la OR || 0 la And
        $sortc = "idsanpham";              // sap xem bo cot
        $sort = 0;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = 1;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //
    public function timkiemSanpham($query)
    {
        $conn = $this->connect();
        $stmt = mysqli_prepare($conn, $query);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = [];
        while ($row = $rs->fetch_array()) {
            $data[] = $row;
        }
        $stmt->close();
        $this->closeConnect($conn);
        return $data;
    }
    //
    public function getSanphamBanchay($limit)
    {
        $query = "SELECT* from sanpham, chitiethoadon WHERE sanpham.idsanpham = chitiethoadon.idsanpham GROUP BY sanpham.idsanpham ORDER BY chitiethoadon.idchitiethoadon DESC LIMIT $limit";
        $conn = $this->connect();
        $stmt = mysqli_prepare($conn, $query);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = [];
        while ($row = $rs->fetch_array()) {
            $data[] = $row;
        }
        $stmt->close();
        $this->closeConnect($conn);
        return $data;
    }
    //
    public function timkiemSanphamByTensanpham($tensanpham)
    {
        $query = "SELECT * from sanpham, loaisanpham where sanpham.idloaisanpham = loaisanpham.idloaisanpham and tensanpham like '%$tensanpham%' and sanpham.xoa = 0";
        $conn = $this->connect();
        $stmt = mysqli_prepare($conn, $query);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = [];
        while ($row = $rs->fetch_array()) {
            $data[] = $row;
        }
        $stmt->close();
        $this->closeConnect($conn);
        return $data;
    }
    //
    public function getSanphamByShop($shop)
    {
        $table = [$this->table, 'loaisanpham', 'shop'];    // ten table
        $column = [
            'sanpham.idsanpham',
            "sanpham.hinhanh",
            "sanpham.tensanpham",
            "sanpham.giasanpham",
            "sanpham.soluong",
            "loaisanpham.tenloaisanpham",
            "shop.tenshop"
        ];
        $jionc = ['sanpham.idloaisanpham', 'sanpham.shop'];                // dieu kien jion
        $jionv = ['loaisanpham.idloaisanpham', 'shop.idshop'];                // dieu kien jion
        $wherec = ["shop", 'sanpham.xoa'];               // dieu kien where column
        $wherev = [$shop, 0];               // dieu kien where value
        $object = [0];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    //
    public function getSanphamLimitByIdshop($idshop, $start, $line)
    {
        $query = "SELECT * from sanpham, loaisanpham where sanpham.shop = ? and sanpham.idloaisanpham = loaisanpham.idloaisanpham and  sanpham.xoa = 0 limit $start, $line";
        $conn = $this->connect();
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, $this->getType([$idshop]), $idshop);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = [];
        while ($row = $rs->fetch_array()) {
            $data[] = $row;
        }
        $stmt->close();
        $this->closeConnect($conn);
        return $data;
    }
    //
    //
    public function getSanphamLimit($start, $line)
    {
        $query = "SELECT * from sanpham, loaisanpham where sanpham.idloaisanpham = loaisanpham.idloaisanpham and  sanpham.xoa = 0 limit $start, $line";
        $conn = $this->connect();
        $stmt = mysqli_prepare($conn, $query);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = [];
        while ($row = $rs->fetch_array()) {
            $data[] = $row;
        }
        $stmt->close();
        $this->closeConnect($conn);
        return $data;
    }
    //
    public function getSanphamByTensanphamAndIdshop($idshop, $tensanpham)
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = ["shop", 'tensanpham', 'xoa'];               // dieu kien where column
        $wherev = [$idshop, $tensanpham, 0];               // dieu kien where value
        $object = [0, 0];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    // get san pham by id san pham
    public function getSanphamByIdsanpham($idsanpham)
    {
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = ["idsanpham", 'sanpham.xoa'];               // dieu kien where column
        $wherev = [$idsanpham, '0'];               // dieu kien where value
        $object = [0];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
    }
    // add San pham
    public function addSanpham($tensanpham, $idloaisanpham, $motasanpham, $soluong, $giasanpham, $hinhanh, $shop)
    {
        $table = "$this->table";
        $column = ['tensanpham', "idloaisanpham", "motasanpham", "soluong", 'giasanpham', 'hinhanh', 'shop'];
        $value = [$tensanpham, $idloaisanpham, $motasanpham, $soluong, $giasanpham, $hinhanh, $shop];
        return $this->insert($table, $column, $value);
    }
    // edit so luong by id san pham
    public function updateSoluongsanphamByIdsanpham($idsanpham, $soluong)
    {
        $table = "$this->table";
        $column = ['soluong'];
        $value = [$soluong];
        $wherec = ['idsanpham'];
        $wherev = [$idsanpham];
        $object = [];
        return $this->update($table, $column, $value, $wherec, $wherev, $object);
    }
    // edit san pham by id san pham
    public function updateSanphamByIdsanpham($idsanpham, $tensanpham, $loaisanpham, $motasanpham, $soluong, $giasanpham, $hinhanh)
    {
        $table = "$this->table";
        $column = ['tensanpham', 'idloaisanpham', 'motasanpham', 'soluong', 'giasanpham', 'hinhanh'];
        $value = [$tensanpham, $loaisanpham, $motasanpham, $soluong, $giasanpham, $hinhanh];
        $wherec = ['idsanpham'];
        $wherev = [$idsanpham];
        $object = [];
        return $this->update($table, $column, $value, $wherec, $wherev, $object);
    }
    // delete san pham by id san pham
    public function deleteSanphamByIdsanpham($idsanpham)
    {
        $table = "$this->table";
        $column = ['xoa'];
        $value = [1];
        $wherec = ['idsanpham'];
        $wherev = [$idsanpham];
        $object = [];
        return $this->update($table, $column, $value, $wherec, $wherev, $object);
    }
}
