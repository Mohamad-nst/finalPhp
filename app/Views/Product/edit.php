<!--start header -->
<?php include_once appRoot."/Views/Admin/header.php" ?>
<!-- end header -->
<!-- start navbar -->
<?php include_once appRoot."/Views/Admin/navbar.php" ?>
<!-- end navbar -->
<!--- start edit -->
<div class="container bg-dark rounded-4 my-5 col-4 mx-auto">
    <h4 class="text-center text-danger text-uppercase py-2">product edit panel</h4>
</div>
<div class="col-8 container bg-dark rounded-5 py-5 px-5 mt-5">
    <img style="width: 150px;height:150px;object-fit: cover;border-radius: 50%;display: block;margin:0 auto" src="<?php echo finalRoot?>/public/images/Product/<?php echo $data['image'] ?>" >
    <form action="<?php echo finalRoot?>/products/update" method="post" enctype="multipart/form-data">
        <label class="text-white text-capitalize text-center mb-2" for="image">image</label>
        <input type="file" name="image" id="image" class="form-control mb-3 bg-black text-white <?php echo !empty($data['image_err'])?'is-invalid':''?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['image_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="title">title</label>
        <input type="text" name="title" id="title" class="form-control mb-3 bg-black text-white <?php echo !empty($data['title_err'])?'is-invalid':''?>" value="<?php echo $data['title'] ?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['title_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="alt">alt</label>
        <input type="text" name="alt" id="alt" class="form-control mb-3 bg-black text-white <?php echo !empty($data['alt_err'])?'is-invalid':''?>" value="<?php echo $data['alt'] ?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['alt_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="description">description</label>
        <textarea name="description" id="description" class="form-control mb-3 bg-black text-white <?php echo !empty($data['description_err'])?'is-invalid':''?>" placeholder="<?php echo $data['description']?>"></textarea>
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['description_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="category">category</label>
        <select name="category" id="category" class="form-control mb-3 bg-black text-white">
            <?php foreach ($data['category'] as $item): ?>
                <option value="<?php echo $item->id ?>"><?php echo $item->title ?></option>
            <?php endforeach; ?>
        </select>
        <input type="hidden" name="id" value="<?php echo $data['id']?>">
        <div class="text-center"><input type="submit" value="edit" class="btn btn-success text-capitalize mt-5"></div>
    </form>
    <div class="text-center my-4"><a style="background-color: #CC1616" class="btn text-capitalize text-white" href="<?php echo finalRoot?>/Products/details">product details</a>
    </div>
</div>
<!-- end edit -->
<!-- start footer -->
<?php include_once appRoot."/Views/Admin/footer.php" ?>
<!-- end footer -->