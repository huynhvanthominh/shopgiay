<?php

$idshop = [2, 4, 6, 3, 2, 4];
$tongtien = [2, 4, 6, 3, 2, 4];
$tamp = [];
$shop = [];
for ($i = 0; $i < count($idshop); $i++) {
    if (!in_array($idshop[$i], $shop)) {
        $shop[] = $idshop[$i];
    }
    $tamp[] = [
        'idshop' => $idshop[$i],
        'tongtien' => $tongtien[$i]
    ];
}
for ($i = 0; $i < count($tamp); $i++) {
    echo $tamp[$i]['idshop'];
}
echo $tamp;
