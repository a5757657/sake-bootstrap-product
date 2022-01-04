<?php require __DIR__ . '/parts/__connect_db.php' ?>
<?php

$title = '商品管理';
$perPage = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

//總比數
$t_sql = "SELECT COUNT(1) FROM `product_sake`";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$totalPages = ceil($totalRows / $perPage);

if ($page > $totalPages) {
    header('Location: product.php?page='.$totalPages);
    exit;
}

if ($page < 1) {
    header('Location: product.php?page='.'1');
    exit;
}

$sql = sprintf("SELECT * , pf.* FROM `product_sake` ps JOIN `product_format` pf on ps.format_id = pf.format_id LIMIT %s, %s", ($page - 1) * $perPage, $perPage) ;

$rows = $pdo->query($sql)->fetchAll();

?>



<?php include __DIR__ . '/parts/__head.php' ?>

<?php include __DIR__ . '/parts/__navbar.html' ?>
<?php include __DIR__ . '/parts/__sidebar.html' ?>

<?php include __DIR__ . '/parts/__main_start.html' ?>

<style>
    .pro_img {
        height: 160px;
        padding: 10px;
    }
</style>

<div class="d-flex justify-content-between mt-5">
    <button type="button" class="btn btn-secondary btn-sm">刪除選擇項目</button>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link <?= 1 == $page ? 'disabled' : '' ?> " href="?page=<?= 1 ?>">
                    <i class="fas fa-angle-double-left"></i></a>
            </li>
            <li class="page-item <?= 1 == $page ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $page - 1 ?>"><i class="fas fa-angle-left"></i></a>
            </li>
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <?php if($i>($page-3) && $i < ($page+3)) :?>

                <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
                <?php endif ?>
            <?php endfor ?>

            <li class="page-item <?= $totalPages == $page ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $page - 1 ?>"><i class="fas fa-angle-right"></i></a>
            </li>
            <li class="page-item <?= $totalPages == $page ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $totalPages ?>"><i class="fas fa-angle-double-right"></i></a>
            </li>
        </ul>
    </nav>
</div>
<div class="table-responsive" style="overflow-x: scroll; height: 80vh;">
    <table class="table table-striped table-sm">
        <thead>
            <tr class="d-flex">
                <th>
                    <input class="form-check-input" type="checkbox" value="" />
                </th>
                <th>
                    <a href="#"><i class="fas fa-trash"></i></a>
                </th>
                <th class="col-1">商品id</th>
                <th class="col-2">圖片</th>
                <th class="col-2">名稱</th>
                <th class="col-1">庫存</th>
                <th class="col-1">銷售量</th>
                <th class="col-4">介紹</th>
                <th class="col-1">狀態</th>
                <th class="col-1">規格id</th>
                <th class="col-2">上架時間</th>
                <th class="col-2">下架時間</th>
                <th class="col-1">價格</th>
                <th class="col-1">容量</th>
                <th class="col-1">產地</th>
                <th class="col-1">等級</th>
                <th class="col-1">品牌</th>
                <th class="col-1">精米步合</th>
                <th class="col-1">酒精度</th>
                <th class="col-1">酒造</th>
                <th class="col-2">使用米</th>
                <th class="col-2">飲用溫度</th>
                <th class="col-2">口味描述</th>
                <th class="col-1">禮盒</th>
                <th class="col-1">客製化</th>
                <th class="col-1">酒器</th>
                <th class="col-1">
                    <a href="#"><i class="fas fa-pen"></i></a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r) : ?>
                <tr class="d-flex">
                    <td>
                        <input class="form-check-input" type="checkbox" value="" />
                    </td>
                    <td>
                        <a href="#"><i class="fas fa-trash"></i></a>
                    </td>
                    <td class="col-1" id="sid"> <?= $r['pro_id'] ?> </td>
                    <td class="col-2"><img class="pro_img" src="/sake-bootstrap/img/<?= $r['pro_img'] ?>" alt=""></td>
                    <td class="col-2"><?= $r['pro_name'] ?></td>
                    <td class="col-1"><?= $r['pro_stock'] ?></td>
                    <td class="col-1"><?= $r['pro_selling'] ?></td>
                    <td class="col-4"><?= $r['pro_intro'] ?></td>
                    <td class="col-1"><?= $r['pro_condition'] ?></td>
                    <td class="col-1"><?= $r['format_id'] ?></td>
                    <td class="col-2"><?= $r['pro_creat_time'] ?></td>
                    <td class="col-2"><?= $r['pro_unsell_time'] ?></td>
                    <td class="col-1"><?= $r['pro_price'] ?></td>
                    <td class="col-1"><?= $r['pro_capacity'] ?></td>
                    <td class="col-1"><?= $r['pro_loca'] ?></td>
                    <td class="col-1"><?= $r['pro_level'] ?></td>
                    <td class="col-1"><?= $r['pro_brand'] ?></td>
                    <td class="col-1"><?= $r['pro_essence'] ?></td>
                    <td class="col-1"><?= $r['pro_alco'] ?></td>
                    <td class="col-1"><?= $r['pro_marker'] ?></td>
                    <td class="col-2"><?= $r['rice'] ?></td>
                    <td class="col-2"><?= $r['pro-taste'] ?></td>
                    <td class="col-2"><?= $r['pro-temp'] ?></td>
                    <td class="col-1"><?= $r['pro_gift'] ?></td>
                    <td class="col-1"><?= $r['pro_mark'] ?></td>
                    <td class="col-1"><?= $r['container_id'] ?></td>
                    <td class="col-1">
                        <a href="#"><i class="fas fa-pen"></i></a>
                    </td>
                </tr>
            <?php endforeach;  ?>

        </tbody>
    </table>
</div>

<!-- add -->
<?php include __DIR__ . '/parts/__add.html' ?>
<!-- edit -->
<?php include __DIR__ . '/parts/__edit.html' ?>
<?php include __DIR__ . '/parts/__main_end.html' ?>
<!-- 如果要 modal 的話留下面的結構 -->
<?php include __DIR__ . '/parts/__modal.html' ?>

<?php include __DIR__ . '/parts/__script.html' ?>
<!-- 如果要 modal 的話留下面的 script -->
<script>
    const modal = new bootstrap.Modal(document.querySelector('#exampleModal'));
    //  modal.show() 讓 modal 跳出
</script>
<?php include __DIR__ . '/parts/__foot.html' ?>