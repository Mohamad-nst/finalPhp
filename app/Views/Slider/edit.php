<!--start header -->
<?php include_once appRoot."/Views/Admin/header.php" ?>
<!-- end header -->
<!-- start navbar -->
<?php include_once appRoot."/Views/Admin/navbar.php" ?>
<!-- end navbar -->
<!--- start edit -->
<div class="container bg-dark rounded-4 my-5 col-4 mx-auto">
    <h4 class="text-center text-danger text-uppercase py-2">edit slider panel</h4>
</div>
<div class="col-8 container bg-dark rounded-5 p-5 my-5">
    <img style="width: 150px;height:150px;object-fit: cover;border-radius: 50%;display: block;margin:0 auto" src="<?php echo finalRoot?>/public/images/slider/<?php echo $data['image'] ?>" >
    <form action="<?php echo finalRoot?>/Sliders/update" method="post" enctype="multipart/form-data">
        <label class="text-white text-capitalize text-center mb-2" for="image">image</label>
        <input type="file" name="image" id="image" class="form-control mb-3 bg-black text-white <?php echo !empty($data['image_err'])?'is-invalid':''?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['image_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="alt">alt</label>
        <input type="text" name="alt" id="alt" class="form-control mb-3 bg-black text-white <?php echo !empty($data['alt_err'])?'is-invalid':''?>" value="<?php echo $data['alt'] ?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['alt_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="publish">publish</label>
        <select name="publish" id="publish" class="form-control mb-3 bg-black text-white">
            <option value="1">Active</option>
            <option value="0">DeActive</option>
        </select>
        <input name="id" type="hidden" value="<?php echo $data['id'] ?>">
        <div class="text-center"><input type="submit" value="edit" class="btn btn-success text-capitalize mt-5">
        </div>
    </form>
    <div class="text-center my-4"><a style="background-color: #CC1616" class="btn text-capitalize text-white" href="<?php echo finalRoot?>/Sliders/details">Slider details</a>
    </div>
</div>
<!-- end edit -->
<!-- start footer -->
<?php include_once appRoot."/Views/Admin/footer.php" ?>
<!-- end footer -->

