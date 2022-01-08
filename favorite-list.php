<?php require __DIR__ . '/parts/__connect_db.php' ?>
<?php include __DIR__ . '/parts/__head.php' ?>
<?php include __DIR__ . '/parts/__navbar.html' ?>
<?php include __DIR__ . '/parts/__sidebar.html' ?>

<?php include __DIR__ . '/parts/__main_start.html' ?>
<!-- 主要的內容放在 __main_start 與 __main_end 之間 -->


<style>
    img {
        height: 160px;
    }
</style>

<div class="container">
    <div class="row">

        <div class="card d-flex align-items-center" style="width: 18rem;">
            <img src="/sake-bootstrap-product/img/M0006.png" class="pt-3" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card d-flex align-items-center" style="width: 18rem;">
            <img src="/sake-bootstrap-product/img/M0006.png" class="pt-3" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card d-flex align-items-center" style="width: 18rem;">
            <img src="/sake-bootstrap-product/img/M0006.png" class="pt-3" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card d-flex align-items-center" style="width: 18rem;">
            <img src="/sake-bootstrap-product/img/M0006.png" class="pt-3" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card d-flex align-items-center" style="width: 18rem;">
            <img src="/sake-bootstrap-product/img/M0006.png" class="pt-3" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card d-flex align-items-center" style="width: 18rem;">
            <img src="/sake-bootstrap-product/img/M0006.png" class="pt-3" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
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