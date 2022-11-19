<!--start header -->
<?php include_once appRoot."/Views/Admin/header.php" ?>
<!-- end header -->
<!-- start navbar -->
<?php include_once appRoot."/Views/Admin/navbar.php" ?>
<!-- end navbar -->
<!-- start create -->
<div class="container bg-dark rounded-4 my-5 col-4 mx-auto">
    <h4 class="text-center text-danger text-uppercase py-2">seo create panel</h4>
</div>
<div class="col-8 container bg-dark rounded-5 p-5 mt-5">
    <?php if (isset($_SESSION['upload'])): ?>
        <div class="container bg-success rounded-4 shadow my-5 col-8">
            <h5 class="text-center text-white text-uppercase py-2"><?php echo $_SESSION['upload'] ?></h5>
        </div>
    <?php endif; ?>
    <form action="<?php echo finalRoot?>/Seos/store" method="post" enctype="multipart/form-data">
        <label class="text-white text-capitalize text-center mb-2" for="title">title</label>
        <input type="text" name="title" id="title" class="form-control mb-3 bg-black text-white <?php echo !empty($data['title_err'])?'is-invalid':''?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['title_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="keywords">keywords</label>
        <input type="text" id="keywords" name="keywords" class="form-control mb-3 bg-black text-white <?php echo !empty($data['keywords_err'])?'is-invalid':''?>" value="<?php echo $data['keywords']?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['keywords_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="description">description</label>
        <textarea name="description" id="description" class="form-control mb-3 bg-black text-white <?php echo !empty($data['keywords_err'])?'is-invalid':''?>" placeholder="<?php echo $data['description']?>"></textarea>
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['description_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="author">author</label>
        <input type="text" id="author" name="author" class="form-control mb-3 bg-black text-white <?php echo !empty($data['author_err'])?'is-invalid':''?>" value="<?php echo $data['author']?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['author_err']?></h6></div>
        <div class="text-center"><input type="submit" class="btn btn-success text-capitalize mt-5" value="store"></div>
    </form>
    <div class="text-center mt-4"><a style="background-color: #CC1616" class="btn text-capitalize text-white" href="<?php echo finalRoot?>/Seos/index">seo index</a></div>
</div>
<script src="<?php echo bootstrapJs ?>"></script>
<?php
$_SESSION['upload']=null;
?>
</body>
</html>
