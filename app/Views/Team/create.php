<!--start header -->
<?php include_once appRoot."/Views/Admin/header.php" ?>
<!-- end header -->
<!-- start navbar -->
<?php include_once appRoot."/Views/Admin/navbar.php" ?>
<!-- end navbar -->
<!-- start create -->
<div class="container bg-dark rounded-4 my-5 col-4 mx-auto">
    <h4 class="text-center text-danger text-uppercase py-2">team create panel</h4>
</div>
<div class="col-8 container bg-dark rounded-5 py-5 px-5 my-5">
    <?php if (isset($_SESSION['upload'])): ?>
        <div class="container bg-success rounded-4 shadow my-5 col-8">
            <h5 class="text-center text-white text-uppercase py-2"><?php echo $_SESSION['upload'] ?></h5>
        </div>
    <?php endif; ?>
    <form action="<?php echo finalRoot?>/Teams/store" method="post" enctype="multipart/form-data">
        <label class="text-white text-capitalize text-center mb-2" for="image">image</label>
        <input type="file" name="image" id="image" class="form-control mb-3 bg-black text-white <?php echo !empty($data['image_err'])?'is-invalid':''?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['image_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="alt">alt</label>
        <input type="text" name="alt" id="alt" class="form-control mb-3 bg-black text-white <?php echo !empty($data['alt_err'])?'is-invalid':''?>" value="<?php echo $data['alt'] ?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['alt_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="fullName">fullName</label>
        <input type="text" name="fullName" id="fullName" class="form-control mb-3 bg-black text-white <?php echo !empty($data['fullName_err'])?'is-invalid':''?>" value="<?php echo $data['fullName'] ?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['fullName_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="job">job</label>
        <input type="text" name="job" id="job" class="form-control mb-3 bg-black text-white <?php echo !empty($data['job_err'])?'is-invalid':''?>" value="<?php echo $data['job'] ?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['job_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="description">description</label>
        <textarea name="description" id="description" class="form-control mb-3 bg-black text-white <?php echo !empty($data['description_err'])?'is-invalid':''?>" placeholder="<?php echo $data['description']?>"></textarea>
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['description_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="class">class</label>
        <select name="class" id="class" class="form-control bg-black text-white mb-3 text-capitalize">
            <option value="fa fa-telegram">telegram</option>
            <option value="fa fa-facebook-square">facebook</option>
            <option value="fa fa-whatsapp">whatsapp</option>
            <option value="fa fa-instagram">instagram</option>
            <option value="fa fa-linkedin-square">linkedin</option>
        </select>
        <div class="text-center"><input type="submit" class="btn btn-success text-capitalize mt-5" value="store"></div>
    </form>
    <div class="text-center mt-4"><a style="background-color: #CC1616" class="btn text-capitalize text-white" href="<?php echo finalRoot?>/Teams/details">Team details</a></div>
</div>
<?php
$_SESSION['upload']=null;
?>
<!-- end create -->
<!--start footer -->
<?php include_once appRoot."/Views/Admin/footer.php" ?>
<!-- end footer -->
<i class=""></i>