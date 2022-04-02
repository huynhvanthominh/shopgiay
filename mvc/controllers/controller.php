<?php
require __DIR__ . "/../config/path.php";
class controller
{
    public function view($folder, $view, $data = null)
    {
        $path =  __DIR__ . "/../views/$folder/$view.php";
        if (file_exists($path)) {
            require_once $path;
        }
    }
    public function model($model)
    {
        require_once __DIR__ . "/../models/database.php";
        $path =  __DIR__ . "/../models/$model.php";
        if (file_exists($path)) {
            require_once $path;
            return new $model();
        }
    }
    public function getValue($method, $key, $error = null)
    {
        if (strcmp($method, 1) == 0) {
            return isset($_POST["$key"]) ? htmlspecialchars($_POST["$key"]) : $error;
        } else {
            return isset($_GET["$key"]) ? htmlspecialchars($_GET["$key"]) : $error;
        }
    }
    public function uploadFile()
    {
        $uploadType = ['image/png', 'image/jpg', 'image/jpeg'];
        $uploadSize = 10000000;
        $file = isset($_FILES['file']) ? $_FILES['file'] : [];
        $name = isset($_POST['name']) ? $_POST['name'] : date("h_m_s_d_m_Y");
        $folder = isset($_POST['folder']) ? $_POST['folder'] : "";
        if (count($file) > 0) {
            $check = true;
            if ($file['size'] > $uploadSize) {
                $check = false;
                echo "Vượt quá kích thước cho phép";
            }
            if ($check == true && in_array($file['type'], $uploadType)) {
                $path =  img . "$folder/$name";
                move_uploaded_file($file['tmp_name'], $path);
            } else {
                echo "Không đúng định dạng";
            }
        }
    }
    //
    public function copyFile()
    {
        $tenfile = isset($_POST['tenfile']) ? $_POST['tenfile'] : null;
        $folderold = isset($_POST['folderold']) ? img . $_POST['folderold'] . "/$tenfile" : '';
        $foldernew = isset($_POST['foldernew']) ? img . $_POST['foldernew'] . "/$tenfile" : '';
        copy($folderold, $foldernew);
    }
}
