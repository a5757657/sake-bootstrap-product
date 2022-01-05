<?php

require __DIR__ . '/parts/__connect_db.php';

if (isset($_GET['sid'])) {
    $sid = $_GET['sid'];

    $row = $pdo->query("SELECT `format_id` FROM `product_sake` WHERE `product_sake`.`pro_id` IN ($sid) ")->fetchAll();
    $id = '';

    //用商品表id去找出對應的規格表id
    foreach ($row as $k => $v) {
        $row2 = $row[$k];
        foreach ($row2 as $j => $i) {
            $id .= ($row2[$j] . ',');
            $format_id = $id;
        }
    }

    $format_id = substr($id, 0, -1);;

    $pdo->query("DELETE FROM `product_sake` WHERE `pro_id` IN ($sid)");
    $pdo->query("DELETE FROM `product_format` WHERE `format_id` IN ($format_id)");
};

$come_from = $_SERVER['HTTP_REFERER'] ?? 'product.php';

header("Location: $come_from");
