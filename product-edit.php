<?php require __DIR__ . '/parts/__connect_db.php' ?>
<?php
$title = '商品列表 - 修改頁面';

if (!isset($_GET['pro_id'])) {
    header("Location: product.php");
    exit;
}

$sid = intval($_GET['pro_id']);

$format= $pdo->query("SELECT `format_id` FROM `product_sake` WHERE `product_sake`.`pro_id` = $sid ")->fetch(); //此時的$format是陣列
$format= $format['format_id']; ////取陣列裡的值

$pformat = $pdo->query("SELECT * FROM `product_format` WHERE `format_id` = $format")->fetch();
$psake = $pdo->query("SELECT * FROM `product_sake` WHERE `pro_id` = $sid")->fetch();

if (empty($psake)) {
    header('Location: product.php');
    exit;
}



$pro_mark = "SELECT * FROM `product_gift` WHERE 1";
$pro_marks = $pdo->query($pro_mark)->fetchAll();

$pro_con = "SELECT * FROM `product_container` WHERE 1";
$pro_cons = $pdo->query($pro_con)->fetchAll();

?>
<?php include __DIR__ . '/parts/__head.php' ?>
<?php include __DIR__ . '/parts/__navbar.html' ?>
<?php include __DIR__ . '/parts/__sidebar.html' ?>
<?php include __DIR__ . '/parts/__main_start.html' ?>
<!-- 主要的內容放在 __main_start 與 __main_end 之間 -->
<!-- edit -->
<style>
    #edit-img {
        height: 200px;
        text-align: center;
        filter: drop-shadow(0px 5px 6px rgba(50, 50, 50, .5));
    }

    .img-div {
        text-align: center;
    }

    small {
        font-size: .5rem;
        color: #666;
    }
</style>
<div class="mt-5">
    <div class="row justify-content-center mb-5">
        <div class="col-8 ">
            <div class="card">
                <h5 class="card-header py-3" >商品資料修改</h5>
                <div class="card-body">
                    <form class="row">

                        <?php if($psake['pro_img']): ?>
                        <div class="img-div">
                            <img id="edit-img" src="/sake-bootstrap-product/img/<?= $psake['pro_img'] ?>" alt="">
                        </div>
                        <?php endif ?>

                        <div class="form-group mb-3">
                            <label for="pro_img" class="mb-2">商品圖片</label>
                            <input type="file" class="form-control" name="pro_img" id="pro_img" />

                        </div>
                        <div class="form-group mb-3 col-8">
                            <label for="pro_name" class="mb-2">名稱</label>
                            <input type="text" class="form-control" name="pro_name" id="pro_name" value="<?= $psake['pro_name'] ?>" />
                        </div>
                        <div class="form-group mb-3 col-2">
                            <label for="pro_stock" class="mb-2">庫存</label>
                            <input type="number" class="form-control" name="pro_stock" id="pro_stock" value="<?= $psake['pro_stock'] ?>" />
                        </div>
                        <div class="form-group mb-3 col-2">
                            <label for="pro_selling" class="mb-2">銷售量</label>
                            <input type="number" class="form-control" name="pro_selling" id="pro_selling" value="<?= $psake['pro_selling'] ?>" />
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2" for="pro_intro">介紹</label>
                            <textarea class="form-control" name="pro_intro" id="pro_intro" rows="7" ><?= $psake['pro_intro'] ?></textarea>
                        </div>
                        <div class="form-group mb-3 col-4">
                            <label class="mb-2" for="pro_condition">商品狀態</label>
                            <select class="form-control" id="pro_condition" name="pro_condition">
                                <option value="">選擇狀態</option>
                                <option value="已上架">已上架</option>
                                <option value="已上架">已下架</option>
                                <option value="補貨中">補貨中</option>
                            </select>
                        </div>
                        <div class="form-group mb-3 col-4">
                            <label for="pro_price" class="mb-2">價格<small> NT$1380 -> 1380</small></label>
                            <input type="number" class="form-control" name="pro_price" id="pro_price" value="<?= $pformat['pro_price'] ?>" />
                        </div>
                        <div class="form-group mb-3 col-4">
                            <label for="pro_capacity" class="mb-2">容量<small> 720ml -> 720</small></label>
                            <input type="number" class="form-control" name="pro_capacity" id="pro_capacity" value="<?= $pformat['pro_capacity'] ?>" />
                        </div>
                        <div class="form-group mb-3 col-4">
                            <label class="mb-2" for="pro_loca">產地</label>
                            <select class="form-control" name="pro_loca" id="pro_loca">
                                <option value="">選擇產地</option>
                                <option value="東京都">東京都</option>
                                <option value="北海道">北海道</option>
                                <option value="大阪府">大阪府</option>
                                <option value="京都府">京都府</option>
                                <option value="青森縣">青森縣</option>
                                <option value="秋田縣">秋田縣</option>
                                <option value="岩手縣">岩手縣</option>
                                <option value="宮城縣">宮城縣</option>
                                <option value="山形縣">山形縣</option>
                                <option value="福島縣">福島縣</option>
                                <option value="櫪木縣">櫪木縣</option>
                                <option value="茨城縣">茨城縣</option>
                                <option value="千葉縣">千葉縣</option>
                                <option value="埼玉縣">埼玉縣</option>
                                <option value="群馬縣">群馬縣</option>
                                <option value="新潟縣">新潟縣</option>
                                <option value="富山縣">富山縣</option>
                                <option value="石川縣">石川縣</option>
                                <option value="福井縣">福井縣</option>
                                <option value="岐阜縣">岐阜縣</option>
                                <option value="長野縣">長野縣</option>
                                <option value="山梨縣">山梨縣</option>
                                <option value="靜岡縣">靜岡縣</option>
                                <option value="愛知縣">愛知縣</option>
                                <option value="三重縣">三重縣</option>
                                <option value="滋賀縣">滋賀縣</option>
                                <option value="奈良縣">奈良縣</option>
                                <option value="兵庫縣">兵庫縣</option>
                                <option value="鳥取縣">鳥取縣</option>
                                <option value="島根縣">島根縣</option>
                                <option value="山口縣">山口縣</option>
                                <option value="廣島縣">廣島縣</option>
                                <option value="岡山縣">岡山縣</option>
                                <option value="香川縣">香川縣</option>
                                <option value="德島縣">德島縣</option>
                                <option value="高知縣">高知縣</option>
                                <option value="愛媛縣">愛媛縣</option>
                                <option value="大分縣">大分縣</option>
                                <option value="福岡縣">福岡縣</option>
                                <option value="佐賀縣">佐賀縣</option>
                                <option value="長崎縣">長崎縣</option>
                                <option value="熊本縣">熊本縣</option>
                                <option value="宮崎縣">宮崎縣</option>
                                <option value="沖繩縣">沖繩縣</option>
                                <option value="和歌山縣">和歌山縣</option>
                                <option value="鹿兒島縣">鹿兒島縣</option>
                                <option value="神奈川縣">神奈川縣</option>
                            </select>
                        </div>
                        <div class="form-group mb-3 col-4">
                            <label class="mb-2" for="pro_level">等級</label>
                            <select class="form-control" id="pro_level" name="pro_level">
                                <option value="">選擇等級</option>
                                <option value="純米大吟釀">純米大吟釀</option>
                                <option value="純米吟釀">純米吟釀</option>
                                <option value="大吟釀">大吟釀</option>
                                <option value="本釀造">本釀造</option>
                                <option value="純米酒">純米酒</option>
                                <option value="吟釀">吟釀</option>
                            </select>
                        </div>
                        <div class="form-group mb-3 col-4">
                            <label for="pro_brand" class="mb-2">品牌</label>
                            <input type="text" class="form-control" name="pro_brand" id="pro_brand" value="<?= $pformat['pro_brand'] ?>" />
                        </div>
                        <div class="form-group mb-3 col-6">
                            <label for="pro_essence" class="mb-2">精米步合<small> 50% -> 50</small></label>
                            <input type="number" class="form-control" name="pro_essence" id="pro_essence" value="<?= $pformat['pro_essence'] ?>" />
                        </div>
                        <div class="form-group mb-3 col-6">
                            <label for="pro_alco" class="mb-2">酒精度<small> 50% -> 50</small></label>
                            <input type="number" class="form-control" name="pro_alco" id="pro_alco" value="<?= $pformat['pro_alco'] ?>" />
                        </div>
                        <div class="form-group mb-3 col-6">
                            <label for="pro_marker" class="mb-2">酒造</label>
                            <input type="text" class="form-control" name="pro_marker" id="pro_marker" value="<?= $pformat['pro_marker'] ?>"/>
                        </div>

                        <div class="form-group mb-3 col-6">
                            <label for="rice" class="mb-2">使用米</label>
                            <input type="text" class="form-control" name="rice" id="rice" value="<?= $pformat['rice'] ?>"/>
                        </div>
                        <div class="form-group mb-3 col-6">
                            <label for="pro-taste" class="mb-2">口味描述<small> 偏酸 偏甜 辛口 甘口 輕盈 適中</small></label>
                            <input type="text" class="form-control" name="pro-taste" id="pro-taste" value="<?= $pformat['pro-taste'] ?>"/>
                        </div>
                        <div class="form-group mb-3 col-6">
                            <label for="pro-temp" class="mb-2">飲用溫度<small> 冷酒 常溫 燗酒</small></label>
                            <input type="text" class="form-control" name="pro-temp" id="pro-temp" value="<?= $pformat['pro-temp'] ?>"/>
                        </div>
                        <div class="form-group mb-3 col-4">
                            <label class="mb-2" for="pro_gift">禮盒</label>
                            <select class="form-control" id="pro_gift" name="pro_gift">
                                <option value="">選擇禮盒</option>
                                <?php foreach ($pro_marks as $pm) : ?>
                                    <option value="<?= $pm['pro_gift'] ?>"><?= $pm['gift_name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group mb-3 col-4">
                            <label class="mb-2" for="pro_mark">酒標客製化</label>
                            <select class="form-control" id="pro_mark" name="pro_mark">
                                <option value="">選擇是否客製化</option>
                                <option selected="selected" value="1">可以客製化</option>
                                <option value="0">不可客製化</option>
                            </select>
                        </div>

                        <div class="form-group mb-3 col-4">
                            <label class="mb-2" for="container_id">酒器</label>
                            <select class="form-control" id="container_id" name="container_id">
                                <option value="">選擇酒器</option>

                                <?php foreach ($pro_cons as $pc) : ?>
                                    <option value="<?= $pc['container_id'] ?>"><?= $pc['container_name'] ?></option>
                                <?php endforeach ?>

                            </select>
                        </div>


                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-secondary w-25">修改</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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