<!--start header -->
<?php include_once appRoot."/Views/Admin/header.php" ?>
<!-- end header -->
<!-- start navbar -->
<?php include_once appRoot."/Views/Admin/navbar.php" ?>
<!-- end navbar -->
<!-- start create -->
<div class="container bg-dark rounded-4 my-5 col-4 mx-auto">
    <h4 class="text-center text-danger text-uppercase py-2">service crate panel</h4>
</div>
<div class="col-8 container bg-dark rounded-5 p-5 my-5">
    <?php if (isset($_SESSION['upload'])): ?>
        <div class="container bg-success rounded-4 shadow my-5 col-8">
            <h5 class="text-center text-white text-uppercase py-2"><?php echo $_SESSION['upload'] ?></h5>
        </div>
    <?php endif; ?>
    <form action="<?php echo finalRoot?>/Services/store" method="post" enctype="multipart/form-data">
        <label class="text-white text-capitalize text-center mb-2" for="class">class</label>
        <select name="class" id="class" class="form-control bg-black text-white mb-3 text-capitalize <?php echo !empty($data['class_err'])?'is-invalid':''?>">
            <option value="fa fa-home">home</option>
            <option value="fa fa-address-card">book</option>
            <option value="fa fa-gear">setting</option>
            <option value="fa fa-fire">fire</option>
            <option value="fa fa-search">search</option>
            <option value="fa fa-gamepad">game</option>
            <option value="fa fa-tv">tv</option>
            <option value="fa fa-credit-card">card</option>
            <option value="fa fa-warning">danger</option>
        </select>
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['class_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="color">color</label>
        <select name="color" class="form-control bg-black text-white mb-3 text-capitalize" id="color">
            <option value="text-warning">warning</option>
            <option value="text-primary">primary</option>
            <option value="text-success">success</option>
            <option value="text-info">info</option>
            <option value="text-dark">dark</option>
            <option value="text-danger">danger</option>
        </select>
        <label class="text-white text-capitalize text-center mb-2" for="title">title</label>
        <input type="text" name="title" id="title" class="form-control mb-3 bg-black text-white <?php echo !empty($data['title_err'])?'is-invalid':''?>" value="<?php echo $data['title'] ?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['title_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="description">description</label>
        <textarea name="description" id="description" class="form-control mb-3 bg-black text-white" placeholder="<?php
        echo $data['description'] ?>"></textarea>
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['description_err']?></h6></div>
        <div class="text-center"><input type="submit" class="btn btn-success text-capitalize mt-5" value="store"></div>
    </form>
    <div class="text-center mt-4"><a style="background-color: #CC1616" class="btn btn-info text-capitalize text-white" href="<?php echo finalRoot?>/Services/details">service details</a>
    </div>
</div>
<?php
$_SESSION['upload']=null;
?>
<!-- end create -->
<!--start footer -->
<?php include_once appRoot."/Views/Admin/footer.php" ?>
<!-- end footer -->
