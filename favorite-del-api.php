<?php require __DIR__ . '/parts/__connect_db.php' ;

$member_id = $_GET['member_id'];
$pro_id = $_GET['pro_id'];

if (isset($member_id) && isset($pro_id)) {

    $pdo->query("DELETE FROM `favorite` WHERE `favorite`.`member_id` = $member_id AND `favorite`.pro_id = $pro_id;");
};

$come_from = $_SERVER['HTTP_REFERER'] ?? 'favorite-member.php';

header("Location: $come_from");