<!--start header -->
<?php include_once appRoot."/Views/Admin/header.php" ?>
<!-- end header -->
<!-- start navbar -->
<?php include_once appRoot."/Views/Admin/navbar.php" ?>
<!-- end navbar -->
<!-- start details -->
<div class="container bg-dark rounded-5 mt-5 col-6 py-2">
    <h1 class="text-center text-danger text-uppercase">index seo panel</h1>
</div>
<div class="container col-10 rounded-5 mx-auto px-2 py-2 bg-dark mt-5">
    <table class="table table-dark">
        <tr>
            <td class="text-white text-capitalize text-center">id</td>
            <td class="text-white text-capitalize text-center">title</td>
            <td class="text-white text-capitalize text-center">keywords</td>
            <td class="text-white text-capitalize text-center">description</td>
            <td class="text-white text-capitalize text-center">author</td>
            <td class="text-white text-capitalize text-center">createdAt</td>
            <td class="text-white text-capitalize text-center">delete</td>
        </tr>
        <?php foreach ($data['seo'] as $item): ?>
            <tr>
                <td style="line-height: 115px" class="text-capitalize text-center"><?php echo $item->id?></td>
                <td style="line-height: 115px" class="text-capitalize text-center"><?php echo $item->title?></td>
                <td style="line-height: 115px" class="text-capitalize text-center"><?php echo substr($item->keywords,0,25)?></td>
                <td style="line-height: 115px" class="text-capitalize text-center"><?php echo substr($item->description,0,25)?></td>
                <td style="line-height: 115px" class="text-capitalize text-center"><?php echo $item->author ?></td>
                <td style="line-height: 115px" class="text-capitalize text-center"><?php echo $item->createdAt?></td>
                <td style="line-height: 115px" class="text-center">
                    <form action="<?php echo finalRoot?>/Seos/delete" method="post">
                        <input type="hidden" name="id" value="<?php echo $item->id ?>">
                        <input type="submit" class="btn btn-danger text-white text-capitalize" value="delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="text-center my-4"><a class="btn btn-info text-capitalize text-white" href="<?php echo finalRoot?>/Seos/create">seo create</a>
    </div>
</div>
<?php if (isset($_SESSION['delete'])): ?>
    <div class="container bg-success rounded-5 mt-5 col-6 py-2">
        <h1 class="text-center text-white text-uppercase"><?php echo $_SESSION['delete'] ?></h1>
    </div>
<?php endif; ?>







<script src="<?php echo bootstrapJs?>"></script>
<?php
$_SESSION['delete']=null;
?>
</body>
</html>
