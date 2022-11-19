<!--start header -->
<?php include_once appRoot."/Views/layouts/header.php" ?>
<!-- end header -->
<!-- start checkLogout -->
<?php
checkLogout();
?>
<!-- end checkLogout -->
<!-- start navbar -->
<?php include_once appRoot."/Views/layouts/navbar.php" ?>
<!-- end navbar -->
<!-- start register -->
<div class="container bg-dark rounded-4 my-5 col-4  mx-auto">
    <h4 class="text-center text-danger text-uppercase py-2">register panel</h4>
</div>
<div class="col-8 container bg-dark rounded-5 p-5 my-5">
    <form action="<?php echo finalRoot?>/Auths/register" method="post" enctype="multipart/form-data">
        <label class="text-white text-capitalize text-center mb-2" for="fullName">fullName</label>
        <input type="text" name="fullName" id="fullName" class="form-control mb-3 bg-black text-white <?php echo !empty($data['fullName_err'])?'is-invalid':''?>" value="<?php echo $data['fullName'] ?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['fullName_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="email">email</label>
        <input type="email" name="email" id="email" class="form-control mb-3 bg-black text-white <?php echo !empty($data['email_err'])?'is-invalid':''?>" value="<?php echo $data['email'] ?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['email_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="password">password</label>
        <input type="password" name="password" id="password" class="form-control mb-3 bg-black text-white <?php echo !empty($data['password_err'])?'is-invalid':''?>" value="<?php echo $data['password']?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['password_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="confirm_password">confirm_password</label>
        <input type="password" name="confirm_password" id="confirm_password" class="form-control mb-3 bg-black text-white <?php echo !empty($data['confirm_password_err'])?'is-invalid':''?>" value="<?php echo $data['confirm_password']?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['confirm_password_err']?></h6></div>
        <div class="text-center"><input type="submit" class="btn btn-success text-capitalize mt-5" value="register"></div>
    </form>
    <div class="col-12 text-center"><a class="btn mt-3 text-white" style="background-color: #CC1616" href="<?php echo finalRoot?>/Auths/login">Member?</a></div>
</div>
<!-- end register -->
<!-- start footer -->
<?php include_once appRoot."/Views/layouts/footer.php" ?>
<!-- end footer -->