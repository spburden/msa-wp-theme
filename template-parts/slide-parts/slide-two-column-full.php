<?php
    //vars
    $background = get_sub_field('slide_background');
?>
<!-- Two Column Full Background Slide -->
<div class="section">
    <div class="container k-full-width k-full-height">
        <div class="row k-full-height">
            <div class="col-lg-12 section-dark covered-bg" style="background-image: url(<?php echo $background; ?>);">
                <div class="k-table k-full-height">
                    <div class="k-table-cell">
                        <div class="section-info-wrap restricted-width-lg">
                            <h1 class="section-header sh-smaller text-uppercase top-left-redline"><?php the_sub_field('slide_header'); ?></h1>
                            <div class="row">
                                <div class="col-md-6">
                                    <?php the_sub_field('left_content'); ?>
                                </div>
                                <div class="col-md-6">
                                    <?php the_sub_field('right_content'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vertical-middle-band left-band">
                    <div class="left-marker-line"></div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>
<!-- /Two Column Full Background Slide -->
