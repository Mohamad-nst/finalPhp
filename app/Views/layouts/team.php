
<div class="team">
    <h1><?php echo @$data['title']->title ?><?php echo @$data['titleTeam']->title ?></h1>
    <p><?php echo @$data['title']->description ?><?php echo @$data['titleTeam']->description ?></p>
    <div class="itemTeam">
        <?php foreach ($data['team'] as $item): ?>
            <div>
                <img src="<?php echo showImage('Team',$item)?>" alt="<?php echo $item->alt ?>">
                <h4><?php echo $item->fullName ?></h4>
                <h5><?php echo $item->job ?></h5>
                <p><?php echo $item->description ?></p>
                <div class="social">
                    <a href="#"><i class="<?php echo $item->class ?>"></i></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
