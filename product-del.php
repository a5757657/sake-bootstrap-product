<?php 

require __DIR__ . '/parts/__connect_db.php';

if(isset($_GET['sid'])){
    $sid = $_GET['sid'];
    echo $sid;
    $pdo->query("DELETE FROM `product_sake` WHERE `pro_id` IN ($sid)");
};

$come_from = $_SERVER['HTTP_REFERER'] ?? 'product.php';

header("Location: $come_from");