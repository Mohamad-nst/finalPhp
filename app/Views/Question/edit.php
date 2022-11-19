<!--start header -->
<?php include_once appRoot."/Views/Admin/header.php" ?>
<!-- end header -->
<!-- start navbar -->
<?php include_once appRoot."/Views/Admin/navbar.php" ?>
<!-- end navbar -->
<!-- start create -->
<div class="container bg-dark rounded-4 my-5 col-4 mx-auto">
    <h4 class="text-center text-danger text-uppercase py-2">question edit panel</h4>
</div>
<div class="col-8 container bg-dark rounded-5 p-5 my-5">
    <form action="<?php echo finalRoot?>/Questions/update" method="post" enctype="multipart/form-data">
        <label class="text-white text-capitalize text-center mb-2" for="part">part</label>
        <select name="part" id="part" class="form-control bg-black text-white mb-3 text-capitalize <?php echo !empty($data['part_err'])?'is-invalid':''?>">
            <option value="One">1</option>
            <option value="Two">2</option>
            <option value="Three">3</option>
            <option value="Four">4</option>
            <option value="Five">5</option>
            <option value="Six">6</option>
            <option value="Seven">7</option>
            <option value="Eight">8</option>
            <option value="Nine">9</option>
            <option value="Ten">10</option>
        </select>
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['part_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="question">question</label>
        <input type="text" name="question" id="question" class="form-control mb-3 bg-black text-white <?php echo !empty($data['question_err'])?'is-invalid':''?>" value="<?php echo $data['question'] ?>">
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['question_err']?></h6></div>
        <label class="text-white text-capitalize text-center mb-2" for="answer">answer</label>
        <textarea name="answer" id="answer" class="form-control mb-3 bg-black text-white" placeholder="<?php
        echo $data['answer'] ?>"></textarea>
        <div class="invalid-feedback mb-4 text-capitalize"><h6><?php echo $data['answer_err']?></h6></div>
        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
        <div class="text-center"><input type="submit" class="btn btn-success text-capitalize mt-5" value="edit"></div>
    </form>
    <div class="text-center mt-4"><a style="background-color: #CC1616" class="btn text-capitalize text-white" href="<?php echo finalRoot?>/Questions/details">f.a.q details</a>
    </div>
</div>
<!-- end create -->
<!--start footer -->
<?php include_once appRoot."/Views/Admin/footer.php" ?>
<!-- end footer -->