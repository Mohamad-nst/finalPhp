
<div class="faq py-5 px-xl-5 px-lg-5 px-md-4 ps-sm-3 px-2 container-fluid">
    <h1><?php echo @$data['title']->title ?><?php echo @$data['titleQuestion']->title ?></h1>
    <p><?php echo @$data['title']->description ?><?php echo @$data['titleQuestion']->description ?></p>
    <div class="faqItem accordion col-12 col-md-10 mx-auto mt-4" id="accordionExample">
        <?php foreach ($data['question'] as $item): ?>
            <div class="part accordion-item">
                <h2 class="accordion-header" id="heading<?php echo $item->part ?>">
                    <button class="accordion-button text-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $item->part ?>" aria-expanded="true" aria-controls="collapse<?php echo $item->part ?>">
                        <i class="bi bi-question-circle me-2"></i>
                        <?php echo $item->question ?>
                    </button>
                </h2>
                <div id="collapse<?php echo $item->part ?>" class="accordion-collapse collapse show" aria-labelledby="heading<?php echo $item->part ?>" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p><?php echo $item->answer ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


