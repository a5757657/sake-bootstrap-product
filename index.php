<?php require __DIR__. '/parts/__connect_db.php'?>
<?php include __DIR__ . '/parts/__head.php'?>
<?php include __DIR__ . '/parts/__navbar.html'?>
<?php include __DIR__ . '/parts/__sidebar.html'?>

<?php include __DIR__ . '/parts/__main_start.html'?>
<!-- 主要的內容放在 __main_start 與 __main_end 之間 -->
<!-- table -->
<?php include __DIR__ . '/parts/__table.html'?>
<!-- add -->
<?php include __DIR__ . '/parts/__add.html'?>
<!-- edit -->
<?php include __DIR__ . '/parts/__edit.html'?>
<?php include __DIR__ . '/parts/__main_end.html'?>

<!-- 如果要 modal 的話留下面的結構 -->
<?php include __DIR__ . '/parts/__modal.html'?>

<?php include __DIR__ . '/parts/__script.html'?>
<!-- 如果要 modal 的話留下面的 script -->
<script>
     const modal = new bootstrap.Modal(document.querySelector('#exampleModal'));
    //  modal.show() 讓 modal 跳出
</script>
<?php include __DIR__ . '/parts/__foot.html'?>