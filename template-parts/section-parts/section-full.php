<?php
    //vars
    $background_image = get_sub_field('background_image');
    $content_width = get_sub_field('content_width');
?>
<!-- Full Section -->
<div class="section">
    <div class="container k-full-width k-full-height">
        <div class="row k-full-height">
            <div class="col-sm-6 k-sm-no-padding seperated-col">
                <div class="k-half-block covered-bg" style="background-image: url(<?php echo $left_image; ?>);"></div>
                <div class="k-half-block half-cell-wrap top-left-redline k-verticle">
                    <?php the_sub_field('left_content'); ?>
                </div>
            </div>
            <div class="col-sm-6 k-sm-no-padding seperated-col">
                <div class="k-half-block covered-bg" style="background-image: url(<?php echo $right_image; ?>);"></div>
                <div class="k-half-block half-cell-wrap top-left-redline k-verticle">
                    <?php the_sub_field('right_content'); ?>
                </div>
            </div>
        </div> <!-- /.row -->
    </div>
</div>
<!-- /Full Section -->
