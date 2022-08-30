<?php 
include './websettings/routing.php';
include './websettings/config.php';
include './masterPage/header.php';
?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <?php include $pageCompo;?>
        <!-- <form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <input type="text" name="dName">
            <button type="submit">DD</button>
        </form> -->
    </main>
<?php include './masterPage/footer.php';?>