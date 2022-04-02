<?php
require __DIR__ . "/../config/database.php";
class database
{
    public function connect()
    {
        $conn = mysqli_connect(host, user, pass, dbname);
        return $conn;
    }
    public function closeConnect($conn)
    {
        mysqli_close($conn);
    }
    public function sample()
    {
        // select
        $table = [$this->table];    // ten table
        $column = ["*"];            // cot hien thi
        $jionc = [];                // dieu kien jion
        $jionv = [];                // dieu kien jion
        $wherec = [];               // dieu kien where column
        $wherev = [];               // dieu kien where value
        $object = [];               // dieu kien object 1 la OR || 0 la And
        $sortc = null;              // sap xem bo cot
        $sort = null;               // sap xep tang hay giam dan ( 0 giam dan || 1 tang dan )
        $limit = null;              // so dong lay ra
        return $this->select($table, $column, $jionc,  $jionv,  $wherec,  $wherev,  $object,  $sortc,  $sort,  $limit);
        //update
        $table = "$this->table";    //ten table
        $column = [];               // ten cot can thay doi
        $value = [];                // gia tri cua cot thay doi
        $wherec = [];               // ten cot dieu kien
        $wherev = [];               // gia tri cua cot dieu kien
        $object = [];               // 0: end || 1: or
        return $this->update($table, $column, $value, $wherec, $wherev, $object);
        //insert
        $table = "$this->table";    // ten table
        $column = [];               // ten cot
        $value = [];                // gia tri cua cot
        return $this->insert($table, $column, $value);
        //delete
        $table = "$this->table";
        $wherec = [];
        $wherev = [];
        $object = [];
        return $this->delete($table, $wherec, $wherev, $object);
    }
    public function select(array $table, array $column = [], array $jionc = null, array $jionv = null, array $wherec = null, array $wherev = null, array $object = null, string $sortc = null, int $sort = null, int $limit = null)
    {
        // $table = [];
        // $column = [];
        // $jionc = [];
        // $jionv = [];
        // $wherec = [];
        // $wherev = [];
        // $object = [];
        // $sortc = null;
        // $sort = null;
        // $limit = null;
        $query = "SELECT";
        for ($i = 0; $i < count($column); $i++) {
            if ($i == 0) {
                $query .= " $column[$i]";
            } else {
                $query .= ", $column[$i]";
            }
        }
        $query .= " FROM";
        if (count($table) > 0) {
            for ($i = 0; $i < count($table); $i++) {
                if ($i == 0) {
                    $query .= " $table[$i]";
                } else {
                    $query .= ", $table[$i]";
                }
            }
            if (count($jionv) > 0 || count($wherec) > 0 || count($jionc) > 0 || count($wherev) > 0) {
                $jion = false;
                if (count($table) > 1) {
                    $query .= " WHERE";
                    $jion = true;
                    if (count($jionc) == count($jionv)) {

                        for ($i = 0; $i < count($jionv); $i++) {
                            if ($i == 0) {
                                $query .= " $jionc[$i] = $jionv[$i]";
                            } else {
                                $query .= " AND $jionc[$i] = $jionv[$i]";
                            }
                        }
                    } else {
                        return -2;
                    }
                }
                if (count($wherec) == count($wherev)) {
                    if ($jion == false && count($wherec) > 0) {
                        $query .= " WHERE";
                    } else {
                        if (count($wherec) > 0) {
                            $query .= " AND";
                        }
                    }
                    for ($i = 0; $i < count($wherev); $i++) {
                        if ($i == 0) {
                            $query .= " $wherec[$i] = ?";
                        } else {
                            if ($object[$i - 1] == 1) {
                                $query .= " OR $wherec[$i] = ?";
                            } else {
                                $query .= " AND $wherec[$i] = ?";
                            }
                        }
                    }
                } else {
                    return -3;
                }
            }
            if (strlen($sortc) > 0) {
                $query .= " ORDER BY $sortc";
                if ($sort == 0) {
                    $query .= " DESC";
                } else {
                    $query .= " ASC";
                }
            }
            if ($limit != null) {
                $query .= " LIMIT $limit";
            }
        } else {
            return -1;
        }
        // echo $query;
        $conn = $this->connect();
        $stmt = $conn->prepare($query);
        if (count($wherev) > 0) {
            $type = $this->getType($wherev);
            mysqli_stmt_bind_param($stmt, $type, ...$wherev);
        }
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = [];
        if ($rs == true) {
            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_array()) {
                    $data[] = $row;
                }
            }
        }
        $this->closeConnect($conn);
        return $data;
    }
    public function update($table, $column = [], $value = [], $wherec = [], $wherev = [], $object = [])
    {
        $query = "UPDATE $table";
        if (count($column) > 0 && count($column) == count($value)) {
            $query .= " SET ";
            for ($i = 0; $i < count($column); $i++) {
                if ($i == 0) {
                    $query .= " $column[$i] = ?";
                } else {
                    $query .= " , $column[$i] = ?";
                }
            }
            if (count($wherev) > 0 && count($wherev) == count($wherec)) {
                $query .= " WHERE";
                for ($i = 0; $i < count($wherec); $i++) {
                    if ($i == 0) {
                        $query .= " $wherec[$i] = ?";
                    } else {
                        if ($object[$i - 1] == 1) {
                            $query .= " OR $wherec[$i] = ?";
                        } else {
                            $query .= " AND $wherec[$i] = ?";
                        }
                    }
                }
            } else {
                return -2;
            }
        } else {
            return -1;
        }
        // var_dump($query);
        $conn = $this->connect();
        $stmt = $conn->prepare($query);
        $type = $this->getType($value);
        $type .= $this->getType($wherev);
        mysqli_stmt_bind_param($stmt, $type, ...$value, ...$wherev);
        $stmt->execute();
        $num = $stmt->affected_rows;
        $stmt->close();
        $this->closeConnect($conn);
        return $num;
    }
    public function insert($table, $column = [], $value = [])
    {
        $query = "INSERT INTO $table";
        if (count($column) > 0 && count($column) == count($value)) {
            $query .= " (";
            $isFrist = true;
            foreach ($column as $c) {
                if ($isFrist == true) {
                    $query .= " $c";
                    $isFrist = false;
                } else {
                    $query .= " , $c";
                }
            }
            $query .= " ) VALUES(";
            $isFrist = true;
            foreach ($value as $v) {
                if ($isFrist == true) {
                    $query .= " ?";
                    $isFrist = false;
                } else {
                    $query .= " , ?";
                }
            }
            $query .= " )";
        } else {
            return -1;
        }
        $conn = $this->connect();
        $stmt = $conn->prepare($query);
        $type = $this->getType($value);
        mysqli_stmt_bind_param($stmt, $type, ...$value);
        $stmt->execute();
        $num = $stmt->affected_rows;
        $stmt->close();
        $this->closeConnect($conn);
        return $num;
    }
    public function delete($table, $wherec = null, $wherev = null, $object = null)
    {
        $query = "DELETE FROM $table";
        if (count($wherev) == count($wherec)) {
            if (count($wherec) > 0) {
                $query .= " WHERE";
                for ($i = 0; $i < count($wherec); $i++) {
                    if ($i == 0) {
                        $query .= " $wherec[$i] = '$wherev[$i]'";
                    } else {
                        if ($object[$i - 1] == 1) {
                            $query .= " OR $wherec[$i] = '$wherev[$i]'";
                        } else {
                            $query .= " AND $wherec[$i] = '$wherev[$i]'";
                        }
                    }
                }
            }
        } else {
            return -1;
        }
        $conn = $this->connect();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $num = $stmt->affected_rows;
        $stmt->close();
        $this->closeConnect($conn);
        return $num;
    }
    public function getType($value)
    {
        $type = '';
        foreach ($value as $v) {
            if ('integer' === gettype($v)) {
                $type .= 'i';
            } elseif ('string' === gettype($v)) {
                $type .= 's';
            } elseif ('double' === gettype($v)) {
                $type .= 'd';
            } else {
                $type .= 'b';
            }
        }
        return $type;
    }
}
