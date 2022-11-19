<div class="catProduct">
    <h1><?php echo @$data['title']->title ?><?php echo @$data['titleCatProduct']->title ?></h1>
    <p><?php echo @$data['title']->description ?><?php echo @$data['titleCatProduct']->description ?></p>
    <div>
        <?php foreach ($data['catProducts'] as $item): ?>
            <div class="item">
                <img src="<?php echo showImage('product',$item) ?>" alt="<?php echo $item->alt?>">
                <h1><?php echo $item->title?></h1>
                <p><?php echo $item->description?></p>
                <div>
                    <a class="btn btn-success text-white text-capitalize" href="#">install</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
