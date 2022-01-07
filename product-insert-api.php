<?php require __DIR__ . '/parts/__connect_db.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '',
];

$s_name = $_POST['pro_name'] ?? '';
$s_stock = $_POST['pro_stock'] ?? '';
$s_selling = $_POST['pro_selling'] ?? '';
$s_intro = $_POST['pro_intro'] ?? '';
$s_condition = $_POST['pro_condition'] ?? '';
$pro_img = 'M0099.png';


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
$f_container_id = $_POST['container_id'] ?? '5';


$sql1 = "INSERT INTO `product_format`(
                                        `pro_price`, 
                                        `pro_capacity`, 
                                        `pro_loca`, 
                                        `pro_level`, 
                                        `pro_brand`, 
                                        `pro_essence`,
                                        `pro_alco`,
                                        `pro_marker`,
                                        `rice`,
                                        `pro_taste`,
                                        `pro_temp`,
                                        `pro_gift`,
                                        `pro_mark`,
                                        `container_id`
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt1 = $pdo->prepare($sql1);

$stmt1->execute([
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
    $f_container_id
]);

$output['success'] = $stmt1->rowCount() == 1;
$output['rowCount'] = $stmt1->rowCount();

$format_id = $pdo->query("SELECT `format_id` FROM `product_format` ORDER BY `format_id` DESC LIMIT 0 , 1;")->fetch();
$format_id = $format_id['format_id'];
//$stmt1->bindParam('format_id', $format_id, PDO::PARAM_INT);
//$stmt1->bindColumn(1, $formar_id);


$date = date_create(); //現在時間

$s_u_time;
$s_c_time;

if ($s_condition == '補貨中') {
    $s_u_time = '0000-00-00 00:00:00';
    $s_c_time = '0000-00-00 00:00:00';
}

if ($s_condition == '已上架') {
    $s_u_time = date_format($date, 'Y-m-d H:i:s');
    $s_c_time = '0000-00-00 00:00:00';
}

if ($s_condition == '已下架') {
    $s_u_time = '0000-00-00 00:00:00';
    $s_c_time = date_format($date, 'Y-m-d H:i:s');
}

$sql2 = "INSERT INTO `product_sake`(
                                    `pro_name`, 
                                    `pro_stock`, 
                                    `pro_selling`, 
                                    `pro_intro`, 
                                    `pro_condition`, 
                                    `format_id`,
                                    `pro_img`,
                                    `pro_creat_time`,
                                    `pro_unsell_time`
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt2 = $pdo->prepare($sql2);

$stmt2->execute([
    $s_name,
    $s_stock,
    $s_selling,
    $s_intro,
    $s_condition,
    $format_id,
    $pro_img,
    $s_u_time,
    $s_c_time
]);

$output['success'] = $stmt2->rowCount() == 1;
$output['rowCount'] = $stmt2->rowCount();


echo json_encode($output, JSON_UNESCAPED_UNICODE);
