<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <?php foreach ($data['slider'] as $item): ?>
        <?php if (intval($item->publish)===1): ?>
                <div class="swiper-slide"><img src="<?php echo showImage('slider',$item)?>" alt="<?php echo $item->alt?>"></div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
