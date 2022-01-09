<?php require __DIR__ . '/parts/__connect_db.php' ?>
<?php

$title = '收藏列表';

if (!isset($_GET['member_id']) || !isset($_GET['member_name'])) {
    header('Location: favorite-member.php?');
    exit;
}

$member_id = $_GET['member_id'];
$member_name = $_GET['member_name'];

$sql = "SELECT f.* , ps.* , pf.* FROM `favorite` f JOIN `product_sake` ps ON f.`pro_id` = ps.`pro_id` JOIN `product_format` pf ON ps.`format_id` = pf.`format_id` WHERE f.`member_id` = $member_id ;";
$rows = $pdo->query($sql)->fetchAll();



?>
<?php include __DIR__ . '/parts/__head.php' ?>
<?php include __DIR__ . '/parts/__navbar.html' ?>
<?php include __DIR__ . '/parts/__sidebar.html' ?>

<?php include __DIR__ . '/parts/__main_start.html' ?>
<!-- 主要的內容放在 __main_start 與 __main_end 之間 -->


<style>
    img {
        height: 160px;
    }

    .fa-plus-square {
        font-size: 2rem;
        color: rgba(0, 0, 0, .2);
    }

    .add {
        height: 362px;
    }

    .pro_img {
        height: 160px;
        max-width: 160px;
        padding: 10px;
        filter: drop-shadow(0px 5px 6px rgba(50, 50, 50, .5));
        /* 帶透明圖層用的陰影 */
    }
</style>

<div class="container">
    <div class="row pt-4">
        <div class="d-flex mb-3 justify-content-between border-bottom">
            <div>
                <h4>會員編號：<?= $member_id ?>&emsp;&emsp;會員名稱：<?= $member_name ?></h4>
            </div>
            <a href="favorite-member.php"><button type="button" class="btn btn-secondary btn-sm">返回</button></a>
        </div>

        <div class="row justify-content-start">


            <?php foreach ($rows as $r) : ?>
                <div class="card d-flex align-items-center m-1 card_count" style="width: 18rem;">
                    <img src="/sake-bootstrap-product/img/<?= $r['pro_img'] ?>" class="pt-2 pro_img">
                    <div class="card-body">
                        <h5 class="card-title"><?= $r['pro_name'] ?></h5>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="mx-2">產地:<?= $r['pro_loca'] ?></div>
                        <div class="mx-2">品牌:<?= $r['pro_brand'] ?></div>
                    </div>
                    <div class='d-flex'>
                        <div class="mx-2">等級:<?= $r['pro_level'] ?></div>
                        <div class="mx-2">價格:NT$<?= $r['pro_price'] ?></div>
                    </div>
                    <input type="hidden" value="<?= $r['pro_id'] ?>">
                    <a href="javascript: modal.show()" class="btn btn-secondary justify-content-end col-12 my-3">移除收藏</a>
                    <input type="hidden" value="<?= $r['pro_name'] ?>">
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">刪除收藏商品</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">...</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">確認</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>


            <div class="card d-flex align-items-center justify-content-center m-1 add" style="width: 18rem;">
                <a href="#" class="text-decoration-none d-flex justify-content-center align-items-center" style="width: 100%; height: 100%;">
                    <i class="far fa-plus-square "></i>
                </a>
            </div>
        </div>


    </div>
</div>

<?php include __DIR__ . '/parts/__main_end.html' ?>
<?php include __DIR__ . '/parts/__script.html' ?>
<!-- 如果要 modal 的話留下面的 script -->
<script>
    const modal = new bootstrap.Modal(document.querySelector('#exampleModal'));
    //  modal.show() 讓 modal 跳出
    let card_count = document.querySelectorAll('.card_count');
    let add = document.querySelector('.add');

    if (card_count.length >= 20) {
        add.style = "display:none !important";
    }

    /*  href="favorite-del-api.php?member_id=<?= $member_id ?>&pro_id=<?= $r['pro_id'] ?> */
</script>
<?php include __DIR__ . '/parts/__foot.html' ?>