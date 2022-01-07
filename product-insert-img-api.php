<?php

header('Content-type: application/json');

$upload_folder = __DIR__ .'/img';

$exts = [
    'image/jpeg' => '.jpg',
    'image/png' => '.png',
    'image/gif' => '.gif',
];

$output = [
    'success' => false,
    'error' => '',
];

if (!empty($_FILES['pro_img'])) {

    $ext = $exts[$_FILES['pro_img']['type']]; //拿到對應的副檔名

    if (!empty($ext)) {

        $filename = sha1($_FILES['pro_img']['name'] . rand()) . $ext;
        $output['ext'] = $ext;
        $target = $upload_folder . '/' . $filename;

        if (move_uploaded_file($_FILES['pro_img']['tmp_name'], $target)) {
            $output['success'] = true;
            $output['filename'] = $filename;
        } else {
            $output['error'] = '無法移動檔案';
        }
    } else {
        $output['error'] = '不合法的檔案類型';
    }
} else {
    $output['error'] = '沒有上傳檔案';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);