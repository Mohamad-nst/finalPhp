<!--start header -->
<?php include_once appRoot."/Views/Admin/header.php" ?>
<!-- end header -->
<!-- start navbar -->
<?php include_once appRoot."/Views/Admin/navbar.php" ?>
<!-- end navbar -->
<!-- start details -->
<div class="dashboard">
    <div class="top">
        <a class="text-uppercase btn btn-success left text-white" href="<?php echo finalRoot?>/Dashboards/create">create dashboard</a>
        <a class="text-uppercase btn btn-info text-white right" href="<?php echo finalRoot?>/Dashboards/details">details dashboard</a>
    </div>
    <h1>welcome to your dashboard profile <span class="text-danger"><?php echo $_SESSION['fullName']?></span></h1>
    <?php foreach ($data['dashboard'] as $item): ?>
        <div class="item">
            <img src="<?php echo showImage('Dashboard',$item) ?>" alt="">
            <h1 class="text-white"><?php echo $item->title?></h1>
            <a class="btn btn-success text-capitalize" href="<?php echo $item->link ?>"><?php echo $item->title?></a>
        </div>
    <?php endforeach; ?>
</div>
<!-- end details -->
<!-- start footer -->
<?php include_once appRoot."/Views/Admin/footer.php" ?>
<!-- end footer -->
