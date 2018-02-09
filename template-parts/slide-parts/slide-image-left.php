<?php
    //vars
    $background = get_sub_field('slide_background');
?>
<!-- Image on Left Slide -->
<div class="section">
    <div class="container k-full-width k-full-height">
        <div class="row k-full-height">
            <div class="col-sm-6 hidden-xs covered-bg" style="background-image: url(<?php echo $background; ?>);"></div>
            <div class="col-sm-6 text-center covered-bg">
                <div class="k-table k-full-height">
                    <div class="k-table-cell">
                        <div class="section-info-wrap top-center-redline">
                        <?php the_sub_field('slide_content'); ?>
                    </div>
                    </div>
                </div>
                <div class="vertical-middle-band left-band">
                    <div class="left-marker-line"></div>
                </div>
            </div>
        </div><!-- /.row -->
    </div>
</div>
<!-- /Image on Left Slide -->
