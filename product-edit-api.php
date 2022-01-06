<?php require __DIR__ . '/parts/__connect_db.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '',
];

$s_id = isset($_POST['pro_id']) ? intval($_POST['pro_id']) : 0;
$f_id = isset($_POST['format_id']) ? intval($_POST['format_id']) : 0;

if (empty($s_id)) {
    $output['code'] = 400;
    $output['error'] = '沒有pro_id';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
if (empty($f_id)) {
    $output['code'] = 400;
    $output['error'] = '沒有f_id';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$s_name = $_POST['pro_name'] ?? '';
$s_stock = $_POST['pro_stock'] ?? '';
$s_selling = $_POST['pro_selling'] ?? '';
$s_intro = $_POST['pro_intro'] ?? '';
$s_condition = $_POST['pro_condition'] ?? '';


$f_price = $_POST['pro_price'] ?? '';
$f_capacity = $_POST['pro_capacity'] ?? '';
$f_loca = $_POST['pro_loca'] ?? '';
$f_level = $_POST['pro_level'] ?? '';
$f_brand = $_POST['pro_brand'] ?? '';
$f_essence = $_POST['pro_essence'] ?? '';
$f_alco = $_POST['pro_alco'] ?? '';
$f_marker = $_POST['pro_marker'] ?? '';
$f_rice = $_POST['rice'] ?? '';
$f_taste = $_POST['pro_taste'] ?? '';
$f_temp = $_POST['pro_temp'] ?? '';
$f_gift = $_POST['pro_gift'] ?? '';
$f_mark = $_POST['pro_mark'] ?? '';
$f_container_id = $_POST['container_id'] ?? '';


//$s_c_time = $_POST['pro_creat_time'] ?? '';
//$s_u_time = $_POST['pro_unsell_time'] ?? '';

$s_u_time;
$s_c_time;

$date = date_create(); //現在時間


if ($s_condition == '已上架' && strtotime($_POST['pro_unsell_time']) > strtotime($_POST['pro_creat_time'])) {

    $s_c_time = date_format($date, 'Y-m-d H:i:s');
    $s_u_time = $_POST['pro_unsell_time'];
} elseif ($s_condition == '已下架' && strtotime($_POST['pro_unsell_time']) < strtotime($_POST['pro_creat_time'])) {

    $s_c_time = $_POST['pro_creat_time'];
    $s_u_time = date_format($date, 'Y-m-d H:i:s');
} else {

    $s_u_time = $_POST['pro_unsell_time'];
    $s_c_time = $_POST['pro_creat_time'];
}

/* else if ($s_condition == '已下架') {

    if ($_POST['pro_unsell_time']) {
        $s_c_time = $_POST['pro_creat_time'];
        $s_u_time = $_POST['pro_unsell_time'];
    } else {
        $s_c_time = $_POST['pro_creat_time'];
        $s_u_time = date_format($date, 'Y-m-d H:i:s');
    }

    $s_u_time = date_format($date, 'Y-m-d H:i:s');
    $s_c_time = $_POST['pro_creat_time'];
} else {
    $s_u_time = $_POST['pro_unsell_time'];
    $s_c_time = $_POST['pro_creat_time'];
} */




$sql_1 = "UPDATE `product_sake` SET 
                          `pro_name`=?,
                          `pro_stock`=?,
                          `pro_selling`=?,
                          `pro_intro`=?,
                          `pro_condition`=?,
                          `pro_creat_time`=?,
                          `pro_unsell_time`=?
WHERE `pro_id`=?";


$stmt_1 = $pdo->prepare($sql_1);

$stmt_1->execute([
    $s_name,
    $s_stock,
    $s_selling,
    $s_intro,
    $s_condition,
    $s_c_time,
    $s_u_time,
    $s_id
]);

if ($stmt_1->rowCount() == 0) {
    $output['error'] = '資料沒有修改';
} else {
    $output['success'] = true;
}


$sql_2 = "UPDATE `product_format` SET 
                          `pro_price`=?,
                          `pro_capacity`=?,
                          `pro_loca`=?,
                          `pro_level`=?,
                          `pro_brand`=?,
                          `pro_essence`=?,
                          `pro_alco`=?,
                          `pro_marker`=?,
                          `rice`=?,
                          `pro_taste`=?,
                          `pro_temp`=?,
                          `pro_gift`=?,
                          `pro_mark`=?,
                          `container_id`=?
WHERE `format_id`=?";


$stmt_2 = $pdo->prepare($sql_2);

$stmt_2->execute([
    $f_price,
    $f_capacity,
    $f_loca,
    $f_level,
    $f_brand,
    $f_essence,
    $f_alco,
    $f_marker,
    $f_rice,
    $f_taste,
    $f_temp,
    $f_gift,
    $f_mark,
    $f_container_id,
    $f_id
]);

if ($stmt_2->rowCount() == 0) {
    $output['error'] = '資料沒有修改';
} else {
    $output['success'] = true;
}



echo json_encode($output, JSON_UNESCAPED_UNICODE);
