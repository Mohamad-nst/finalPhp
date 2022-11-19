<div class="product">
    <h1><?php echo @$data['title']->title ?><?php echo @$data['titleProduct']->title ?></h1>
    <p><?php echo @$data['title']->description ?><?php echo @$data['titleProduct']->description ?></p>
    <div class="itemProduct">
        <?php foreach ($data['product'] as $item): ?>
            <div>
                <img src="<?php echo showImage('Product',$item)?>" alt="<?php echo $item->alt ?>">
                <h1><?php echo $item->title?></h1>
                <p><?php echo $item->description?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
