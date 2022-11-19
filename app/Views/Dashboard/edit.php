<!--start header -->
<?php include_once appRoot."/Views/Admin/header.php" ?>
<!-- end header -->
<!-- start navbar -->
<?php include_once appRoot."/Views/Admin/navbar.php" ?>
<!-- end navbar -->
<!--- start edit -->
<div class="container bg-dark rounded-4 my-5 col-4 mx-auto">
    <h4 class="text-center text-danger text-uppercase py-2">dashboard edit panel</h4>
</div>
<div class="col-8 container bg-dark rounded-5 p-5 my-5">
    <img style="width: 150px;height:150px;object-fit: cover;border-radius: 50%;display: block;margin:0 auto" src="<?php echo finalRoot?>/public/images/Dashboard/<?php echo $data['image'] ?>" >
    <form action="<?php echo finalRoot?>/Dashboards/update" method="post" enctype="multipart/form-data">
        <label class="text-white text-capitalize text-center mb-2" for="image">image</label>
        <input type="file" name="image" id="image" class="form-control mb-3 bg-black text-white <?php echo !empty($data['image_err'])?'is-invalid':''?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['image_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="title">title</label>
        <input type="text" id="title" name="title" class="form-control mb-3 bg-black text-white <?php echo !empty($data['title_err'])?'is-invalid':''?>" value="<?php echo $data['title']?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['title_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="link">link</label>
        <select class="form-control mb-3 bg-black text-white" name="link" id="link">
            <option class="bg-black text-capitalize text-white" value="<?php echo finalRoot?>/Seos/create">seo</option>
            <option class="bg-black text-capitalize text-white" value="<?php echo finalRoot?>/Sliders/create ?>">slider</option>
            <option class="bg-black text-capitalize text-white" value="<?php echo finalRoot?>/Categories/create ?>">category</option>
            <option class="bg-black text-capitalize text-white" value="<?php echo finalRoot?>/Products/create ?>">products</option>
            <option class="bg-black text-capitalize text-white" value="<?php echo finalRoot?>/Teams/create">team</option>
            <option class="bg-black text-capitalize text-white" value="<?php echo finalRoot?>/Services/create">service</option>
            <option class="bg-black text-capitalize text-white" value="<?php echo finalRoot?>/Questions/create">question</option>
            <option class="bg-black text-capitalize text-white" value="<?php echo finalRoot?>/Titles/create">question</option>
        </select>
        <input type="hidden" name="id" value="<?php echo $data['id']?>">
        <div class="text-center"><input type="submit" class="btn btn-success text-capitalize mt-5" value="edit"></div>
    </form>
    <div class="text-center my-4"><a style="background-color: #CC1616" class="btn text-capitalize text-white" href="<?php echo finalRoot?>/Dashboards/details">dashboard details</a>
    </div>
</div>
<!-- end edit -->
<!-- start footer -->
<?php include_once appRoot."/Views/Admin/footer.php" ?>
<!-- end footer -->
