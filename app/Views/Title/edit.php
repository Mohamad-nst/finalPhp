<!--start header -->
<?php include_once appRoot."/Views/Admin/header.php" ?>
<!-- end header -->
<!-- start navbar -->
<?php include_once appRoot."/Views/Admin/navbar.php" ?>
<!-- end navbar -->
<!-- start create -->
<div class="container bg-dark rounded-4 my-5 col-4 mx-auto">
    <h4 class="text-center text-danger text-uppercase py-2">edit title panel</h4>
</div>
<div class="col-8 container bg-dark rounded-5 p-5 my-5">
    <form action="<?php echo finalRoot?>/Titles/update" method="post" enctype="multipart/form-data">
        <label class="text-white text-capitalize text-center mb-2" for="title">title</label>
        <select name="title" id="title" class="form-control bg-black text-white mb-3 text-capitalize <?php echo !empty($data['title_err'])?'is-invalid':''?>">
            <option value="team">team</option>
            <option value="services">services</option>
            <option value="contact">contact</option>
            <option value="categories">categories</option>
            <option value="f.a.q">f.a.q</option>
            <option value="products">products</option>
        </select>
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['title_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="description">description</label>
        <textarea name="description" id="description" class="form-control mb-3 bg-black text-white <?php echo !empty($data['description_err'])?'is-invalid':''?>" placeholder="<?php echo $data['description'] ?>"></textarea>
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['description_err']?></h6></div>
        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
        <div class="text-center"><input type="submit" class="btn btn-success text-capitalize mt-5" value="edit"></div>
    </form>
    <div class="text-center mt-4"><a style="background-color: #CC1616" class="btn text-capitalize text-white" href="<?php echo finalRoot?>/Titles/details">Title details</a>
    </div>
</div>
<?php if (isset($_SESSION['upload'])): ?>
    <div class="container bg-success rounded-5 mt-5 col-6 py-2">
        <h1 class="text-center text-white text-uppercase"><?php echo $_SESSION['upload'] ?></h1>
    </div>
<?php endif; ?>
<?php
$_SESSION['upload']=null;
?>
<!-- end create -->
<!--start footer -->
<?php include_once appRoot."/Views/Admin/footer.php" ?>
<!-- end footer -->
