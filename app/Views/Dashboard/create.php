<!--start header -->
<?php include_once appRoot."/Views/Admin/header.php" ?>
<!-- end header -->
<!-- start navbar -->
<?php include_once appRoot."/Views/Admin/navbar.php" ?>
<!-- end navbar -->
<!-- start create -->
<div class="container bg-dark rounded-4 my-5 col-4 mx-auto">
    <h4 class="text-center text-danger text-uppercase py-2">dashboard create panel</h4>
</div>
<div class="col-8 container bg-dark rounded-5 p-5 my-5">
    <?php if (isset($_SESSION['upload'])): ?>
        <div class="container bg-success rounded-4 shadow my-5 col-8">
            <h5 class="text-center text-white text-uppercase py-2"><?php echo $_SESSION['upload'] ?></h5>
        </div>
    <?php endif; ?>
    <form action="<?php echo finalRoot?>/Dashboards/store" method="post" enctype="multipart/form-data">
        <label class="text-white text-capitalize text-center mb-2" for="image">image</label>
        <input type="file" name="image" id="image" class="form-control mb-3 bg-black text-white <?php echo !empty($data['image_err'])?'is-invalid':''?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['image_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="title">title</label>
        <input type="text" id="title" name="title" class="form-control mb-3 bg-black text-white <?php echo !empty($data['title_err'])?'is-invalid':''?>" value="<?php echo $data['title']?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['title_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="link">link</label>
        <select class="form-control mb-3 bg-black text-white" name="link" id="link">
            <option class="bg-black text-capitalize text-white" value="<?php echo finalRoot?>/Seos/create">seo</option>
            <option class="bg-black text-capitalize text-white" value="<?php echo finalRoot?>/Sliders/create">slider</option>
            <option class="bg-black text-capitalize text-white" value="<?php echo finalRoot?>/Categories/create">category</option>
            <option class="bg-black text-capitalize text-white" value="<?php echo finalRoot?>/Products/create">products</option>
            <option class="bg-black text-capitalize text-white" value="<?php echo finalRoot?>/Teams/create">team</option>
            <option class="bg-black text-capitalize text-white" value="<?php echo finalRoot?>/Services/create">service</option>
            <option class="bg-black text-capitalize text-white" value="<?php echo finalRoot?>/Questions/create">question</option>
            <option class="bg-black text-capitalize text-white" value="<?php echo finalRoot?>/Titles/create">title</option>
        </select>
        <div class="text-center"><input type="submit" class="btn btn-success text-capitalize mt-5" value="store"></div>
    </form>
    <div class="text-center mt-4"><a style="background-color: #CC1616" class="btn btn-info text-capitalize text-white" href="<?php echo finalRoot?>/Dashboards/details">dashboard details</a></div>
</div>
<?php
$_SESSION['upload']=null;
?>
<!-- end create -->
<!--start footer -->
<?php include_once appRoot."/Views/Admin/footer.php" ?>
<!-- end footer -->

