<?php require __DIR__ . '/parts/__connect_db.php' ;

$output = [
    'success' => false,
    'code' => 0,
    'error' => '',
];

$pro_id = $_POST['pro_id'];

var_dump($pro_id);

if(empty($pro_id)) {
    $output['code'] = 400;
    $output['error'] = '沒有pro_id';
    echo json_encode($output, JSON_UNESCAPED_UNICODE); exit;
}
