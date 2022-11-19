
<div class="category">
    <h1><?php echo @$data['title']->title ?><?php echo @$data['titleCategory']->title ?></h1>
    <p><?php echo @$data['title']->description ?><?php echo @$data['titleCategory']->description ?></p>
    <div>
        <?php foreach ($data['category'] as $item): ?>
            <div class="item">
                <img src="<?php echo showImage('Category',$item) ?>" alt="<?php echo $item->alt?>">
                <h1 class=""><?php echo $item->title?></h1>
                <p class=""><?php echo $item->description?></p>
                <div>
                    <a class="" href="<?php echo finalRoot?>/Home/category/<?php echo  $item->title?>">products</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
