<!--start header -->
<?php include_once appRoot."/Views/Admin/header.php" ?>
<!-- end header -->
<!-- start navbar -->
<?php include_once appRoot."/Views/Admin/navbar.php" ?>
<!-- end navbar -->
<!-- start create -->
<div class="container bg-dark rounded-4 my-5 col-4  mx-auto">
    <h4 class="text-center text-danger text-uppercase py-2">category create panel</h4>
</div>
<div class="col-8 container bg-dark rounded-5 p-5 my-5">
    <?php if (isset($_SESSION['upload'])): ?>
        <div class="container bg-success rounded-4 shadow my-5 col-8">
            <h5 class="text-center text-white text-uppercase py-2"><?php echo $_SESSION['upload'] ?></h5>
        </div>
    <?php endif; ?>
    <form action="<?php echo finalRoot?>/Categories/store" method="post" enctype="multipart/form-data">
        <label class="text-white text-capitalize text-center mb-2" for="image">image</label>
        <input type="file" name="image" id="image" class="form-control mb-3 bg-black text-white <?php echo !empty($data['image_err'])?'is-invalid':''?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['image_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="title">title</label>
        <input type="text" id="title" name="title" class="form-control mb-3 bg-black text-white <?php echo !empty($data['title_err'])?'is-invalid':''?>" value="<?php echo $data['title']?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['title_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="alt">alt</label>
        <input type="text" name="alt" id="alt" class="form-control mb-3 bg-black text-white <?php echo !empty($data['alt_err'])?'is-invalid':''?>" value="<?php echo $data['alt']?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['alt_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="description">description</label>
        <textarea style="resize: none;height: 100px" class="form-control mb-3 bg-black text-white <?php echo !empty($data['description_err'])?'is-invalid':''?>" name="description" id="description" placeholder="<?php echo $data['description']?>"></textarea>
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['description_err']?></h6></div>
        <div class="text-center"><input type="submit" class="btn btn-success text-capitalize mt-5" value="store"></div>
    </form>
    <div class="text-center mt-4"><a style="background-color: #CC1616" class="btn text-capitalize text-white" href="<?php echo finalRoot?>/Categories/details">Category details</a></div>
</div>
<?php
$_SESSION['upload']=null;
?>
<!-- end create -->
<!--start footer -->
<?php include_once appRoot."/Views/Admin/footer.php" ?>
<!-- end footer -->
