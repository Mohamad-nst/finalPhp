<!--start header -->
<?php include_once appRoot."/Views/Admin/header.php" ?>
<!-- end header -->
<!-- start navbar -->
<?php include_once appRoot."/Views/Admin/navbar.php" ?>
<!-- end navbar -->
<!-- start details -->
<div class="container bg-dark rounded-4 my-5 col-4  mx-auto">
    <h4 class="text-center text-danger text-uppercase py-2">category details panel</h4>
</div>
<div class="container col-10 rounded-5 mx-auto px-2 py-2 bg-dark my-5">
    <?php if (isset($_SESSION['delete'])): ?>
        <div class="container bg-success rounded-4 shadow my-5 col-8">
            <h5 class="text-center text-white text-uppercase py-2"><?php echo $_SESSION['delete'] ?></h5>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['update'])): ?>
        <div class="container bg-success rounded-4 shadow my-5 col-8">
            <h5 class="text-center text-white text-uppercase py-2"><?php echo $_SESSION['update'] ?></h5>
        </div>
    <?php endif; ?>
    <table class="table table-dark">
        <tr>
            <td class="text-white text-capitalize text-center">id</td>
            <td class="text-white text-capitalize text-center">image</td>
            <td class="text-white text-capitalize text-center">alt</td>
            <td class="text-white text-capitalize text-center">title</td>
            <td class="text-white text-capitalize text-center">description</td>
            <td class="text-white text-capitalize text-center">delete</td>
            <td class="text-white text-capitalize text-center">update</td>
        </tr>
        <?php foreach ($data['category'] as $item): ?>
            <tr>
                <td style="line-height: 115px" class="text-capitalize text-center"><?php echo $item->id?></td>
                <td style="line-height: 115px" class="text-capitalize text-center"><img style="width: 100px;height: 100px;object-fit: cover;border-radius: 50%" src="<?php echo showImage('Category',$item)?>"></td>
                <td style="line-height: 115px" class="text-capitalize text-center"><?php echo $item->title?></td>
                <td style="line-height: 115px" class="text-capitalize text-center"><?php echo $item->alt?></td>
                <td style="line-height: 115px" class="text-capitalize text-center"><?php echo substr($item->description,0,25)?></td>
                <td style="line-height: 115px" class="text-capitalize text-center"><?php echo $item->createdAt?></td>
                <td style="line-height: 115px" class="text-center">
                    <form action="<?php echo finalRoot?>/Categories/delete" method="post">
                        <input type="hidden" name="id" value="<?php echo $item->id ?>">
                        <input type="submit" class="btn btn-danger text-white text-capitalize" value="delete">
                    </form>
                </td>
                <td style="line-height: 115px" class="text-center">
                    <form action="<?php echo finalRoot?>/Categories/edit" method="post">
                        <input type="hidden" name="id" value="<?php echo $item->id ?>">
                        <input type="submit" class="btn btn-warning text-white text-capitalize" value="update">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="text-center my-4"><a class="btn btn-info text-capitalize text-white" href="<?php echo finalRoot?>/Categories/create">category create</a>
    </div>
</div>
<?php
$_SESSION['delete']=null;
$_SESSION['update']=null;
?>
<!-- end details -->
<!-- start footer -->
<?php include_once appRoot."/Views/Admin/footer.php" ?>
<!-- end footer -->
