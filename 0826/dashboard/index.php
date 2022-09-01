<?php 
include './websettings/routing.php';
include './websettings/config.php';
include './websettings/userClass.php';
include './masterPage/header.php';
?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <?php 
        echo $reqURL." page name: ".$page;
        include $pageCompo;
        ?>
    </main>
<?php include './masterPage/footer.php';?>