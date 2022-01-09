<?php require __DIR__ . '/parts/__connect_db.php' ;

$member_id = $_GET['member_id'];
$pro_id = $_GET['pro_id'];

echo $member_id;
echo $pro_id;

if (isset($member_id) && isset($pro_id)) {

    $pdo->query("DELETE FROM `favorite` WHERE `member_id` = $member_id  AND `pro_id` IN ($pro_id);");
};

$come_from = $_SERVER['HTTP_REFERER'] ?? 'favorite-list.php';

header("Location: $come_from");