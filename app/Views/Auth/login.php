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
<!-- start login -->
<div class="container bg-dark rounded-4 my-5 col-4  mx-auto">
    <h4 class="text-center text-danger text-uppercase py-2 ">login panel</h4>
</div>
<div class="col-8 container bg-dark rounded-5 p-5 my-5" >
    <?php if (isset($_SESSION['upload'])): ?>
        <div class="container bg-success rounded-4 shadow my-5 col-8">
            <h5 class="text-center text-white text-uppercase py-2"><?php echo $_SESSION['register'] ?></h5>
        </div>
    <?php endif; ?>
    <form action="<?php echo finalRoot?>/Auths/login" method="post" enctype="multipart/form-data">
        <label class="text-white text-capitalize text-center mb-2" for="email">email</label>
        <input type="email" name="email" id="email" class="form-control mb-3 bg-black text-white <?php echo !empty($data['email_err'])?'is-invalid':''?>" value="<?php echo $data['email'] ?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['email_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="password">password</label>
        <input type="password" name="password" id="password" class="form-control mb-3 bg-black text-white <?php echo !empty($data['password_err'])?'is-invalid':''?>" value="<?php echo $data['password']?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['password_err']?></h6></div>
        <div class="text-center"><input type="submit" class="btn btn-success text-capitalize mt-5" value="login"></div>
    </form>
    <div class="col-12 text-center"><a class="btn mt-3 text-white" style="background-color: #CC1616" href="<?php echo finalRoot?>/Auths/register">Not Member?</a></div>
</div>
<!-- end login -->
<!-- start footer -->
<?php include_once appRoot."/Views/layouts/footer.php" ?>
<!-- end footer -->
