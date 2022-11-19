<div class="service">
    <h1><?php echo @$data['title']->title ?><?php echo @$data['titleService']->title ?></h1>
    <p><?php echo @$data['title']->description ?><?php echo @$data['titleService']->description ?></p>
    <div class="itemService">
        <?php foreach ($data['service'] as $item): ?>
        <div>
            <div class="icon">
                <i class="<?php echo $item->class?> <?php echo $item->color ?>"></i>
            </div>
            <div class="text">
                <h1><?php echo $item->title?></h1>
                <p><?php echo $item->description?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>